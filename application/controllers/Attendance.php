<?php

defined('BASEPATH') OR exit('No direct script access allowed');

	class Attendance extends MY_Controller
	{
		
		function __construct()
		{
            parent::__construct();
		    $this->load->model('Student_model');
            $this->load->model('Batches_model');
            $this->load->model('Attendance_model');

		}

		public function register(){
            $data['batches'] = $this->Batches_model->get_all_batches();
            $data['batch_id'] = '';
            $data['students'] = array();
	    	$json['register_html'] = $this->load->view('attendance/register', $data, true);
	    	if($this->input->is_ajax_request()) {
		      set_content_type($json);
		    }
    	}

    	public function view_register(){
		    $form_data = $this->input->post();
            $data['batches'] = $this->Batches_model->get_all_batches();
		    $data['students']  = $this->Attendance_model->get_batch_student($form_data['batch'],$form_data['attendance_date']);
            $data['batch_id'] = $form_data['batch'];
            $data['attendance_date'] = $form_data['attendance_date'];
            $data['active_tab'] = 'student_attendance';
            $this->Attendance_model->save_student_batch_attehdance($data);
            $json['register_html'] = $this->load->view('attendance/student_attendance', $data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
		}

        public function view_register_employee(){
            $form_data = $this->input->post();
            $data['batches'] = $this->Batches_model->get_all_batches();
            $data['employees']  = $this->Attendance_model->get_batch_employee($form_data['batch'],$form_data['attendance_date']);
            $data['batch_id'] = $form_data['batch'];
            $data['attendance_date'] = $form_data['attendance_date'];
            $data['active_tab'] = 'employee_attendance';
            $this->Attendance_model->save_employee_batch_attehdance($data);
            //print_r($data['employees']); die();
            $json['register_html'] = $this->load->view('attendance/teacher_attendance', $data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

		public function save_student_attendance(){
    	    $data = $this->input->post();
    	    $data['attendance_group'] = 'student';
            $result = $this->Attendance_model->save_student_attendance($data);
            if($result){
                $json['success'] = true;
                $json['message'] = "Attendance mark successfully!";
            }else{
                $json['error'] = false;
                $json['message'] = "Seem to be an error while mark attendance!";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function save_employee_attendance(){
            $data = $this->input->post();
            $data['attendance_group'] = 'employee';
            $result = $this->Attendance_model->save_employee_attendance($data);
            if($result){
                $json['success'] = true;
                $json['message'] = "Attendance mark successfully!";
            }else{
                $json['error'] = false;
                $json['message'] = "Seem to be an error while mark attendance!";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

    	public function reports(){
            $data['batches'] = $this->Batches_model->get_all_batches();
            $data['batch_id'] = '';
            $data['students'] = array();
	    	$json['reports_html'] = $this->load->view('attendance/reports', $data, true);
	    	if($this->input->is_ajax_request()) {
		      set_content_type($json);
		    }
    	}

    	public function student_report_page(){
    		$json['reports_html'] = $this->load->view('attendance/report_page','',true);
    		if($this->input->is_ajax_request()){
    			set_content_type($json);
    		}
    	}

        public function student_attendance_report(){
            $form_data = $this->input->post();
            $data['batches'] = $this->Batches_model->get_all_batches();
            $data['students']  = $this->Attendance_model->get_student_attendance_report($form_data);
            $data['batch_id'] = $form_data['batch'];
            $data['month'] = $form_data['month'];
            $data['year'] = $form_data['year'];
            $data['active_tab'] = 'sretport';
            $json['register_html'] = $this->load->view('attendance/student_attendance_report', $data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

        public function teacher_attendance_report(){
            $form_data = $this->input->post();
            $data['batches'] = $this->Batches_model->get_all_batches();
            $data['employees']  = $this->Attendance_model->get_teacher_attendance_report($form_data);
            $data['batch_id'] = $form_data['batch'];
            $data['month'] = $form_data['month'];
            $data['year'] = $form_data['year'];
            $data['active_tab'] = 'tretport';
            $json['register_html'] = $this->load->view('attendance/teacher_attendance_report', $data, true);
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }

	}


?>