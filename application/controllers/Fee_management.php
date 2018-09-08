<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Fee_management extends MY_Controller
	{
		
		function __construct()
		{
			parent::__construct();
            $this->load->model('Student_model');
            $this->load->model('Batches_model');
            $this->load->model('Fee_model');
            $this->load->helper('content-type');
		}

		public function index(){
            $data['batch_id'] = '';
            $data['batches'] = $this->Batches_model->get_all_batches();
            $data['active_tab'] = 'payment';
            $data['payments'] = $this->Fee_model->get_payments();
            $this->load->view('fee/index', $data);
        }
        public function fee_management(){
            $data['batch_id'] = '';
            $data['batches'] = $this->Batches_model->get_all_batches();
            $data['payments'] = $this->Fee_model->get_payments();
            $json['classes_html'] = $this->load->view('fee/payments', $data, true);
            if($this->input->is_ajax_request()) {
              set_content_type($json);
            }
        }

        public function edit_payment_view(){
            $post_data = $this->input->post();
            //print_r($post_data);
            $data['batch_id'] = $post_data['batch_no'];
            $data['title'] = $post_data['title'];
            $data['description'] = $post_data['description'];
            $data['amount'] = $post_data['amount'];
            $data['amount_paid'] = $post_data['amount_paid'];
            $data['status'] = $post_data['status'];
            $data['payment_id'] = $post_data['payment_id'];
            $data['student_id'] = $post_data['student_id'];
            $data['student_name'] = $post_data['student_name'];
            $data['fee_date'] = $post_data['fee_date'];
            $data['method'] = $post_data['method'];
            $data['batches'] = $this->Batches_model->get_all_batches();
            $data['students'] = $this->Student_model->get_all_students();
            $json['payment_html'] = $this->load->view('fee/add_payment', $data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function get_batch_students(){
            $data = $this->input->post();
            $batch_id = $data['batch_id'];
            $students  = $this->Fee_model->get_batch_students($batch_id);
            $options = '';
            foreach ($students as $student){
                $first_name = $student['first_name'];
                $last_name = $student['last_name'];
                $id = $student['student_id'];
                $options.="<option value='$id'>$first_name $last_name</option>";
            }
            echo $options;
        }

        public function add_payment(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('batch_id', 'Batch', 'required|xss_clean');
            $this->form_validation->set_rules('student_id', 'Student', 'required|xss_clean');
            $this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
            $this->form_validation->set_rules('date', 'Date', 'required|xss_clean');
            $this->form_validation->set_rules('description', 'fee_date', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $data = $this->input->post();
                $created_by = $this->session->userdata('userdata');
                $data['created_by'] = $created_by['login_id'];
                $result = $this->Fee_model->add_payment($data);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = "Payment created successfully!";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while creating patment";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function update_payment(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('batch_id', 'Batch', 'required|xss_clean');
            $this->form_validation->set_rules('student_id', 'Student', 'required|xss_clean');
            $this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
            $this->form_validation->set_rules('date', 'Date', 'required|xss_clean');
            $this->form_validation->set_rules('description', 'fee_date', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $data = $this->input->post();
                $created_by = $this->session->userdata('userdata');
                $data['created_by'] = $created_by['login_id'];
                $result = $this->Fee_model->add_payment($data);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = "Payment created successfully!";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while creating patment";
                }

                redirect('/fee_management');
            }
        }

        public function update_class() {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'class name', 'required|xss_clean');
            $data = $this->input->post();
            //print_r($data); die();

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $enable = isset($data['enable'])?$data['enable']:0;
                $update_fields = array('name'=>$data['name'],'code'=>$data['code'],'enable'=>$enable);
                $result = $this->General_model->update_class($update_fields,$data['class_id']);
                if ($result) {
                    $data['classes'] = $this->General_model->get_classes();
                    $json['classes_html'] = $this->load->view('settings/classes', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Class successfully added.";
                } else {
                    $data['classes'] = $this->General_model->get_classes();
                    $json['classes_html'] = $this->load->view('settings/classes', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error in image uploading.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function delete_class($student_id) {
            $result = $this->General_model->delete_class($student_id);
            if ($result) {
                $data['classes'] = $this->General_model->get_classes();
                $json['classes_html'] = $this->load->view('settings/classes', $data, true);
                $json['success'] = true;
                $json['message'] = "Class successfully deleted.";
            } else {
                $json['success'] = true;
                $json['message'] = "Seems to an error in delete student record.";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function institution_details(){
            $data['countries'] = $this->Employee_model->get_all_countries();
            $json['settings_html'] = $this->load->view('settings/institution_details', $data, true);
            if($this->input->is_ajax_request()) {
              set_content_type($json);
            }
        }

        public function subject_name(){
            $data['subjects'] = $this->General_model->get_all_subjects();
            $json['setting_html'] = $this->load->view('settings/subject_names', $data, true);
            if($this->input->is_ajax_request()) {
              set_content_type($json);
            }
        }

        public function add_subject(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'subject name', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $subject = $this->input->post();

                $result = $this->General_model->add_new_subject($subject);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = "Subject successfully added.";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while adding class.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function update_subject() {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'class name', 'required|xss_clean');
            $data = $this->input->post();
            //print_r($data); die();

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $update_fields = array('name'=>$data['name'],'code'=>$data['code']);
                $result = $this->General_model->update_subject($update_fields,$data['subject_id']);
                if ($result) {
                    $data['subjects'] = $this->General_model->get_all_subjects();
                    $json['setting_html'] = $this->load->view('settings/subject_names', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Subject successfully added.";
                } else {
                    $data['subjects'] = $this->General_model->get_all_subjects();
                    $json['setting_html'] = $this->load->view('settings/subject_names', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error in image uploading.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function delete_subject($id) {
            $result = $this->General_model->delete_subject($id);
            if ($result) {
                $data['subjects'] = $this->General_model->get_all_subjects();
                $json['setting_html'] = $this->load->view('settings/subject_names', $data, true);
                $json['success'] = true;
                $json['message'] = "Subject successfully deleted.";
            } else {
                $data['subjects'] = $this->General_model->get_all_subjects();
                $json['setting_html'] = $this->load->view('settings/subject_names', $data, true);
                $json['success'] = true;
                $json['message'] = "Seems to an error in delete student record.";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }




        public function add_institution(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'institution name', 'required|xss_clean');
            $this->form_validation->set_rules('code', 'institution code', 'required|xss_clean');
            $this->form_validation->set_rules('subdomain', 'Subdomain name', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $institution = $this->input->post();


                if (!empty($_FILES['logo']['name'])) {
                    $upload_path = 'assets/uploads/institution';
                    $config = array(
                        'upload_path' => $upload_path,
                        'allowed_types' => "gif|jpg|png|jpeg",
                        'overwrite' => TRUE,
                        'file_name' => strtolower(str_replace(' ', '-', $this->input->post('code') . '-'.uniqid()))
                        );

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('logo')) {
                        $json['error'] = true;
                        $json['message'] = $this->upload->display_errors();
                    } else {
                        $imageDetailArray = $this->upload->data();
                        $photo = $imageDetailArray['file_name'];
                    }
                    if ($photo) {
                        $institution['logo'] = $imageDetailArray['file_name'];
                    } else {
                        $json['error'] = true;
                        $json['message'] = "Seems to an error in image uploading.";
                    }

                }
                $result = $this->General_model->save_institution($institution);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = "Institution save successfully!";
                    redirect('/general_setting/institutions');
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while saving institution.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function institutions(){
		    $data['institution_detail'] = $this->General_model->get_institution_detail();
            $data['countries'] = $this->Employee_model->get_all_countries();
            $this->load->view('parts/header');
            $this->load->view('parts/topbar');
            $this->load->view('parts/sidebar');
            $this->load->view('settings/institution_details',$data);
            $this->load->view('parts/footer');

        }

        public function academic_sessions(){
            $data['sessions'] = $this->General_model->get_all_sessions();
            $json['setting_html'] = $this->load->view('settings/academic_sessions', $data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function add_session(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('first_term_start', 'First Term', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $session = $this->input->post();
                $result = $this->General_model->add_new_session($session);
                if ($result) {
                    $data['sessions'] = $this->General_model->get_all_sessions();
                    $json['session_html'] = $this->load->view('settings/academic_sessions', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Subject successfully added.";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while adding class.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function update_session() {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('first_term_start', 'First Term', 'required|xss_clean');
            $data = $this->input->post();

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $update_fields = array(
                    'first_term_start'=>$data['first_term_start'],
                    'first_term_end'=>$data['first_term_end'],
                    'second_term_start'=>$data['second_term_start'],
                    'second_term_end'=>$data['second_term_end'],
                    'third_term_start'=>$data['third_term_start'],
                    'third_term_end'=>$data['third_term_end'],
                );
                $result = $this->General_model->update_session($update_fields,$data['session_id']);
                if ($result) {
                    $data['sessions'] = $this->General_model->get_all_sessions();
                    $json['session_html'] = $this->load->view('settings/academic_sessions', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Session successfully updated.";
                } else {
                    $data['sessions'] = $this->General_model->get_all_sessions();
                    $json['session_html'] = $this->load->view('settings/academic_sessions', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error in image uploading.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function delete_session($id) {
            $result = $this->General_model->delete_session($id);
            if ($result) {
                $data['sessions'] = $this->General_model->get_all_sessions();
                $json['session_html'] = $this->load->view('settings/academic_sessions', $data, true);
                $json['success'] = true;
                $json['message'] = "Session successfully deleted.";
            } else {
                $data['sessions'] = $this->General_model->get_all_sessions();
                $json['session_html'] = $this->load->view('settings/academic_sessions', $data, true);
                $json['success'] = true;
                $json['message'] = "Seems to an error in delete student record.";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

}

?>