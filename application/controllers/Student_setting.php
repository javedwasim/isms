<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Student_setting extends MY_Controller
	{
		
		function __construct()
		{
			parent::__construct();
            $this->load->model('Student_model');
            $this->load->helper('content-type');
		}

        public function student_cat(){
            $data['categories'] = $this->Student_model->get_all_student_categories();
            $json['student_html'] = $this->load->view('student/student_categories', $data, true);
            if($this->input->is_ajax_request()) {
              set_content_type($json);
            }
        }

        public function add_student_category(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('category', 'category name', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $category = $this->input->post();
                $result = $this->Student_model->add_student_category($category);
                if ($result) {
                    $json['success'] = true;
                    $json['message'] = "Category successfully added.";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to an error in image uploading.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function update_student_category() {

            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('category', 'category name', 'required|xss_clean');
            $data = $this->input->post();
            //print_r($data); die();

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $result = $this->Student_model->update_category($data['category'],$data['category_id']);
                if ($result) {
                    $data['categories'] = $this->Student_model->get_all_student_categories();
                    $json['student_html'] = $this->load->view('student/student_categories', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Category successfully added.";
                } else {
                    $json['error'] = true;
                    $json['message'] = "Seems to an error in image uploading.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function delete_category($student_id) {
            $result = $this->Student_model->delete_student_category($student_id);
            if ($result) {
                $data['categories'] = $this->Student_model->get_all_student_categories();
                $json['student_html'] = $this->load->view('student/student_categories', $data, true);
                $json['success'] = true;
                $json['message'] = "Category successfully deleted.";
            } else {
                $json['success'] = true;
                $json['message'] = "Seems to an error in delete student record.";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

}

?>