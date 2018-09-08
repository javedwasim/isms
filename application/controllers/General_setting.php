<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class General_setting extends MY_Controller
	{
		
		function __construct()
		{
			parent::__construct();
            $this->load->model('General_model');
            $this->load->model('Employee_model');
            $this->load->helper('content-type');
		}

        public function classes(){
            $data['classes'] = $this->General_model->get_classes();
            $json['classes_html'] = $this->load->view('settings/classes', $data, true);
            if($this->input->is_ajax_request()) {
              set_content_type($json);
            }
        }

        public function add_class(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'class name', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $class = $this->input->post();

                $result = $this->General_model->add_new_class($class);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = "Class successfully added.";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while adding class.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
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