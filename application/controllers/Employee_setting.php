<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_setting extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->helper('content-type');
    }

  
    public function employee_cat(){
        $data['categories'] = $this->Employee_model->get_employee_categories();
        //print_r($data['categories']); die();
        $json['employee_html'] = $this->load->view('employee/employee_categories', $data, true);
        $json['employee_html'] = $this->load->view('employee/employee_categories', '', true);
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function employee_department(){
        $data['departments'] = $this->Employee_model->get_employee_departments();
        $json['employee_html'] = $this->load->view('employee/employee_departments', $data, true);
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function emp_positions(){
        $data['positions'] = $this->Employee_model->get_employee_positions();
        //print_r($data['categories']); die();
        $json['employee_html'] = $this->load->view('employee/employee_positions', $data, true);
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_employee_category(){
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('category', 'category name', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $category = $this->input->post();
            $result = $this->Employee_model->add_employee_category($category);
            if ($result) {
                $data['categories'] = $this->Employee_model->get_employee_categories();
                $json['employee_html'] = $this->load->view('employee/employee_categories', $data, true);
                $json['success'] = true;
                $json['message'] = "Student successfully added.";
            } else {
                $data['categories'] = $this->Employee_model->get_employee_categories();
                $json['employee_html'] = $this->load->view('employee/employee_categories', $data, true);
                $json['error'] = true;
                $json['message'] = "Seems to an error in image uploading.";
            }
        }
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function update_employee_category() {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('category', 'category name', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $category = $this->input->post();
            //print_r($category); die();
            $result = $this->Employee_model->update_category($category['category'],$category['category_id']);
            if ($result) {
                $data['categories'] = $this->Employee_model->get_employee_categories();
                $json['employee_html'] = $this->load->view('employee/employee_categories', $data, true);
                $json['success'] = true;
                $json['message'] = "Category successfully updated.";
            } else {
                $data['categories'] = $this->Employee_model->get_employee_categories();
                $json['employee_html'] = $this->load->view('employee/employee_categories', $data, true);
                $json['error'] = true;
                $json['message'] = "Seems to an error in image uploading.";
            }
        }
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_category($id) {
        $result = $this->Employee_model->delete_employee_category($id);
        if ($result) {
            $data['categories'] = $this->Employee_model->get_employee_categories();
            $json['employee_html'] = $this->load->view('employee/employee_categories', $data, true);
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

    public function add_employee_department(){
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'department name', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $department = $this->input->post();
            $result = $this->Employee_model->add_employee_department($department);
            if ($result) {
                $data['departments'] = $this->Employee_model->get_employee_departments();
                //print_r($data['categories']); die();
                $json['employee_html'] = $this->load->view('employee/employee_departments', $data, true);
                $json['success'] = true;
                $json['message'] = "Department successfully added.";
            } else {
                $data['departments'] = $this->Employee_model->get_employee_departments();
                //print_r($data['categories']); die();
                $json['employee_html'] = $this->load->view('employee/employee_departments', $data, true);
                $json['error'] = true;
                $json['message'] = "Seems to an error in image uploading.";
            }
        }
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function update_employee_department() {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'department name', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $department = $this->input->post();
            $data = array('name'=>$department['name'],'abbrevation'=>$department['abbrevation']);
            //print_r($department); die();
            $result = $this->Employee_model->update_department($data,$department['department_id']);
            if ($result) {
                $data['departments'] = $this->Employee_model->get_employee_departments();
                //print_r($data['categories']); die();
                $json['employee_html'] = $this->load->view('employee/employee_departments', $data, true);
                $json['success'] = true;
                $json['message'] = "Department successfully updated.";
            } else {
                $data['departments'] = $this->Employee_model->get_employee_departments();
                //print_r($data['categories']); die();
                $json['employee_html'] = $this->load->view('employee/employee_departments', $data, true);
                $json['error'] = true;
                $json['message'] = "Seems to an error in image uploading.";
            }
        }
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }


    public function delete_department($id) {
        $result = $this->Employee_model->delete_employee_department($id);
        if ($result) {
            $data['departments'] = $this->Employee_model->get_employee_departments();
            //print_r($data['categories']); die();
            $json['employee_html'] = $this->load->view('employee/employee_departments', $data, true);
            $json['success'] = true;
            $json['message'] = "Department successfully deleted.";
        } else {
            $json['success'] = true;
            $json['message'] = "Seems to an error in delete student record.";
        }
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_employee_position(){
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'position name', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $department = $this->input->post();
            $result = $this->Employee_model->add_employee_position($department);
            if ($result) {
                $data['positions'] = $this->Employee_model->get_employee_positions();
                //print_r($data['categories']); die();
                $json['employee_html'] = $this->load->view('employee/employee_positions', $data, true);
                $json['success'] = true;
                $json['message'] = "Position successfully added.";
            } else {
                $data['positions'] = $this->Employee_model->get_employee_positions();
                //print_r($data['categories']); die();
                $json['employee_html'] = $this->load->view('employee/employee_positions', $data, true);
                $json['error'] = true;
                $json['message'] = "Seems to an error in image uploading.";
            }
        }
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }


    public function update_employee_position() {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'department name', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $department = $this->input->post();
            $data = array('name'=>$department['name'],'abbrevation'=>$department['abbrevation']);
            //print_r($department); die();
            $result = $this->Employee_model->update_position($data,$department['position_id']);
            if ($result) {
                $data['positions'] = $this->Employee_model->get_employee_positions();
                //print_r($data['categories']); die();
                $json['employee_html'] = $this->load->view('employee/employee_positions', $data, true);
                $json['success'] = true;
                $json['message'] = "Position successfully updated.";
            } else {
                $data['positions'] = $this->Employee_model->get_employee_positions();
                //print_r($data['categories']); die();
                $json['employee_html'] = $this->load->view('employee/employee_positions', $data, true);
                $json['error'] = true;
                $json['message'] = "Seems to an error in image uploading.";
            }
        }
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete_position($id) {
        $result = $this->Employee_model->delete_employee_position($id);
        if ($result) {
            $data['positions'] = $this->Employee_model->get_employee_positions();
            //print_r($data['categories']); die();
            $json['employee_html'] = $this->load->view('employee/employee_positions', $data, true);
            $json['success'] = true;
            $json['message'] = "Position successfully deleted.";
        } else {
            $json['success'] = true;
            $json['message'] = "Seems to an error in delete student record.";
        }
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_employee_fields() {
        $employee_fields = array();
        $json = array();
        $employee_fields_list = $this->input->post('employee_form_fields');
        $fields = $this->Employee_model->get_form_fields(3);
        if ($employee_fields_list) {
            foreach ($employee_fields_list as $key => $employee_field) {
                $employee_fields[$employee_field] = 1;
            }
            $result_employee = $this->Employee_model->update_employee_form_fields($employee_fields, 'employee');

            if (!$result_employee) {
                $json['message'] = 'Fields successfully added/updated.';
                $json['success'] = true;
            }

        }
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function employee_profile_fields() {
        $data['employee_form_fields'] = $this->Employee_model->get_form_fields('employee');
        $fields = $this->Employee_model->get_form_fields(3);
        $employee_fields = array();
        foreach ($fields as $field){
            $employee_fields[$field['field_name']]=$field['add_view'];
        }
        $data['employee_fields'] = $employee_fields;

        $json['employee_html'] = $this->load->view('employee/employee_fields', $data, true);
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
         
    }


}

?>