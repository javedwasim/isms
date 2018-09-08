<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Assessment extends MY_Controller
	{
		
		function __construct()
		{
			parent::__construct();
            $this->load->model('Assessment_model');
            $this->load->helper('content-type');
		}

        public function assessments(){
            $data['assessments'] = $this->Assessment_model->get_assessments();
            $json['assessment_html'] = $this->load->view('grades/categories', $data, true);
            if($this->input->is_ajax_request()) {
              set_content_type($json);
            }
        }

        public function add_assessment_category(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'class name', 'required|xss_clean');
            $this->form_validation->set_rules('abbreviation', 'abbreviation name', 'required|xss_clean');
            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $categories = $this->input->post();
                $result = $this->Assessment_model->save_assessment_category($categories);
                if ($result) {
                    $data['assessments'] = $this->Assessment_model->get_assessments();
                    $json['assessment_html'] = $this->load->view('grades/categories', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Assessment Category successfully added.";
                } else {
                    $data['assessments'] = $this->Assessment_model->get_assessments();
                    $json['assessment_html'] = $this->load->view('grades/categories', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while adding class.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function update_assessment_category() {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'class name', 'required|xss_clean');
            $data = $this->input->post();
            //print_r($data); die();

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $update_fields = array('name'=>$data['name'],'abbreviation'=>$data['abbreviation']);
                $result = $this->Assessment_model->update_assessment_category($update_fields,$data['assessment_category_id']);
                if ($result) {
                    $data['assessments'] = $this->Assessment_model->get_assessments();
                    $json['assessment_html'] = $this->load->view('grades/categories', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Assessment Category successfully updated.";
                } else {
                    $data['assessments'] = $this->Assessment_model->get_assessments();
                    $json['assessment_html'] = $this->load->view('grades/categories', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error in image uploading.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function delete_assessment_category($id) {
            $result = $this->Assessment_model->delete_assessment_category($id);
            if ($result) {
                $data['assessments'] = $this->Assessment_model->get_assessments();
                $json['assessment_html'] = $this->load->view('grades/categories', $data, true);
                $json['success'] = true;
                $json['message'] = "Assessment category successfully deleted.";
            } else {
                $data['assessments'] = $this->Assessment_model->get_assessments();
                $json['assessment_html'] = $this->load->view('grades/categories', $data, true);
                $json['success'] = true;
                $json['message'] = "Seems to an error in delete category record.";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }


}

?>