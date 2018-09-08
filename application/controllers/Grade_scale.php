<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Grade_scale extends MY_Controller
	{
		
		function __construct()
		{
			parent::__construct();
            $this->load->model('Grade_model');
            $this->load->helper('content-type');
		}

        public function grade_scales(){
            $data['scales'] = $this->Grade_model->get_scales();
            $json['scale_html'] = $this->load->view('grades/scales', $data, true);
            if($this->input->is_ajax_request()) {
              set_content_type($json);
            }
        }

        public function grades(){
            $data['scales'] = $this->Grade_model->get_scales();
            $this->load->view('parts/header');
            $this->load->view('parts/topbar');
            $this->load->view('parts/sidebar');
            $json['scale_html'] = $this->load->view('grades/scales', $data);
            $this->load->view('parts/footer');

        }

        public function grade_scales_level($scale_id){
            $data['scales'] = $this->Grade_model->get_scale_level($scale_id);
            $data['scale_id'] = $scale_id;
            if($data['scales']){
                $this->load->view('parts/header');
                $this->load->view('parts/topbar');
                $this->load->view('parts/sidebar');
                $json['scale_html'] = $this->load->view('grades/scale_levels', $data);
                $this->load->view('parts/footer');
                $json['success'] = true;
                $json['message'] = "Scale successfully added.";
            }else{
                $this->load->view('parts/header');
                $this->load->view('parts/topbar');
                $this->load->view('parts/sidebar');
                $json['scale_html'] = $this->load->view('grades/scale_levels', $data);
                $this->load->view('parts/footer');
                $json['error'] = true;
                $json['message'] = "Seems to an error while adding class.";
            }

            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function add_scale(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'grade name', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $scale = $this->input->post();
                $scale['status']= 'active'; //by default status
                $result = $this->Grade_model->save_grade_scale($scale);
                if ($result) {
                    $data['scales'] = $this->Grade_model->get_scales();
                    $json['scale_html'] = $this->load->view('grades/scales', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Scale successfully added.";
                } else {
                    $data['scales'] = $this->Grade_model->get_scales();
                    $json['scale_html'] = $this->load->view('grades/scales', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while adding class.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function add_scale_level($scale_id){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'grade name', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $scale_level = $this->input->post();
                $result = $this->Grade_model->save_grade_scale_level($scale_level);
                if ($result) {
                    $data['scales'] = $this->Grade_model->get_scale_level($scale_id);
                    $data['scale_id'] = $scale_id;
                    $json['scale_html'] = $this->load->view('grades/scale_levels', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Scale level successfully added.";
                } else {
                    $data['scales'] = $this->Grade_model->get_scale_level($scale_id);
                    $data['scale_id'] = $scale_id;
                    $json['scale_html'] = $this->load->view('grades/scale_levels', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while adding class.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function edit_scale($id){
            $data['scale'] = $this->Grade_model->get_scale_by_id($id);
            $json['scale_html'] = $this->load->view('grades/edit_scale', $data,true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function edit_scale_level($id){
            $result = $this->Grade_model->get_scale_level_by_id($id);
            $data['scale'] = $result;
            $data['grade_scale_id']=$result['grade_scale_id'];
            $json['scale_html'] = $this->load->view('grades/edit_scale_level', $data,true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function update_scale() {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'scale name', 'required|xss_clean');
            $data = $this->input->post();
            //print_r($data); die();

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $update_fields = array('name'=>$data['name'],'description'=>$data['description'],'type'=>$data['type']);
                $result = $this->Grade_model->update_scale($update_fields,$data['scale_id']);
                if ($result) {
                    $data['scales'] = $this->Grade_model->get_scales();
                    $json['scale_html'] = $this->load->view('grades/scales', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Scale successfully updated.";
                } else {
                    $data['scales'] = $this->Grade_model->get_scales();
                    $json['scale_html'] = $this->load->view('grades/scales', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error in image uploading.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function update_scale_levels() {

            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('level_name', 'scale level', 'required|xss_clean');
            $data = $this->input->post();
            //print_r($data); die();

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $update_fields = array('name'=>$data['level_name'],'min_percentage'=>$data['min_percentage'],'remarks'=>$data['remarks']);
                $result = $this->Grade_model->update_scale_level($update_fields,$data['id']);

                if ($result) {
                    $records['scales'] = $this->Grade_model->get_scale_level($data['scale_id']);
                    $json['scale_html'] = $this->load->view('grades/scale_levels', $records, true);
                    $json['success'] = true;
                    $json['message'] = "Scale Level successfully updated.";
                } else {
                    $records['scales'] = $this->Grade_model->get_scale_level($data['scale_id']);
                    $json['scale_html'] = $this->load->view('grades/scale_levels', $records, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error in image uploading.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function delete_scale($id) {
            $result = $this->Grade_model->delete_grade_scale($id);
            if ($result) {
                $data['scales'] = $this->Grade_model->get_scales();
                $json['scale_html'] = $this->load->view('grades/scales', $data, true);
                $json['success'] = true;
                $json['message'] = "Scale successfully deleted.";
            } else {
                $data['scales'] = $this->Grade_model->get_scales();
                $json['scale_html'] = $this->load->view('grades/scales', $data, true);
                $json['success'] = true;
                $json['message'] = "Seems to an error in delete student record.";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function retire_scale($id) {
            $result = $this->Grade_model->retire_grade_scale($id);
            if ($result) {
                $data['scales'] = $this->Grade_model->get_scales();
                $json['scale_html'] = $this->load->view('grades/scales', $data, true);
                $json['success'] = true;
                $json['message'] = "Scale successfully archive.";
            } else {
                $data['scales'] = $this->Grade_model->get_scales();
                $json['scale_html'] = $this->load->view('grades/scales', $data, true);
                $json['success'] = true;
                $json['message'] = "Seems to an error in delete student record.";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function delete_scale_level($id) {
		    $data = $this->Grade_model->get_scale_level_by_id($id);
            $result = $this->Grade_model->delete_grade_scale_level($id);
            if ($result) {
                $records['scales'] = $this->Grade_model->get_scale_level($data['grade_scale_id']);
                $json['scale_html'] = $this->load->view('grades/scale_levels', $records, true);
                $json['success'] = true;
                $json['message'] = "Scale level successfully deleted.";
            } else {
                $records['scales'] = $this->Grade_model->get_scale_level($data['grade_scale_id']);
                $json['scale_html'] = $this->load->view('grades/scale_levels', $records, true);
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