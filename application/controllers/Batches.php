<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batches extends MY_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->model('Batches_model');
        $this->load->helper('content-type');

    }

    public function index(){
        $record['batches'] = $this->Batches_model->get_all_batches();
        $record['sessions'] = $this->Batches_model->get_all_sessions();
        $record['classes'] = $this->Batches_model->get_all_classes();
        $this->load->view('batches/index', $record);
    }

    public function batches()
    {
        $record['batches'] = $this->Batches_model->get_all_batches();
        $record['sessions'] = $this->Batches_model->get_all_sessions();
        $record['classes'] = $this->Batches_model->get_all_classes();
        $record['rights'] = $this->session->userdata('other_rights');
        $record['userdata'] = $this->session->userdata('userdata');
        $json['batch_html'] = $this->load->view('batches/list', $record, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save() {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('arm', 'arm', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $batch_data = $this->input->post();
            if(isset($batch_data['id']) && ($batch_data['id']>0)){
                $id = $batch_data['id'];
                $data = array('arm'=>$batch_data['arm'],'course_id'=>$batch_data['course_id']
                        ,'session'=>$batch_data['session']);
                $result = $this->Batches_model->update_batch($data,$id);
            }else{
                $result = $this->Batches_model->save_batch($batch_data);
            }

            if ($result) {
                $json['success'] = true;
                $json['message'] = "Batch save successfully ";
                $record['batches'] = $this->Batches_model->get_all_batches();
                $json['batch_html'] = $this->load->view('batches/list', $record, true);
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error. Please try again.";
                $record['batches'] = $this->Batches_model->get_all_batches();
                $json['batch_html'] = $this->load->view('batches/list', $record, true);
            }
        }
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function edit($id){
        $record['batch'] = $this->Batches_model->get_batch_by_id($id);
        $record['sessions'] = $this->Batches_model->get_all_sessions();
        $record['classes'] = $this->Batches_model->get_all_classes();
        $json['batch_html'] = $this->load->view('batches/edit', $record, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function delete($id){
        $result = $this->Batches_model->delete_batch($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Batch successfully deleted.";
            $record['batches'] = $this->Batches_model->get_all_batches();
            $json['batch_html'] = $this->load->view('batches/list', $record, true);

        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error";
            $record['batches'] = $this->Batches_model->get_all_batches();
            $json['batch_html'] = $this->load->view('batches/list', $record, true);
        }
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function demographics($id){
        $data['students']=$this->Batches_model->get_demographics($id);
        $data['employees']=$this->Batches_model->get_all_employees($id);
        $data['assigned_employee']=$this->Batches_model->get_assigned_employees($id);
        $data['current_batch_info']=$this->Batches_model->get_all_batches_by_id($id);
        $data['scales']=$this->Batches_model->get_grade_scale_level(2);
        $data['batch_id']=$id;
        $data['screen'] = 'batch_students';
        $this->load->view('batches/demographics', $data);
    }
    public function assign_employees(){

        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('employee[]', 'employee', 'required|xss_clean');
        $this->form_validation->set_rules('role[]', 'role', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        }else{

            $data = $this->input->post();
            $result = $this->Batches_model->assign_new_employee($data);


            if($result) {
                $json['success'] = true;
                $json['message'] = "Employees assign  successfully!";
                $record['batches'] = $this->Batches_model->get_all_batches();
                $json['batch_html'] = $this->load->view('batches/list', $record, true);

            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error in assigning employee.";
                $record['batches'] = $this->Batches_model->get_all_batches();
                $json['batch_html'] = $this->load->view('batches/list', $record, true);
            }

        }

        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }


    }

    public function transfer_batch(){
        $this->load->library('form_validation');
        $this->load->helper('security');

        $this->form_validation->set_rules('ids', 'select student', 'required|xss_clean');
        $this->form_validation->set_rules('last_day_in_batch', 'Last day in batch', 'required|xss_clean');
        $this->form_validation->set_rules('reason_to_leave_batch', 'Reason to leave batch', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        }else{

            $data = $this->input->post();
            $result = $this->Batches_model->transfer_student_batch($data);
            if($result) {
                $json['success'] = true;
                $json['message'] = "Student batch transfer successfully!";

            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while transferring batch";
            }

        }

        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_student_behavioural_score(){
        $this->load->library('form_validation');
        $this->load->helper('security');

        $this->form_validation->set_rules('punctuality', 'Punctuality', 'required|xss_clean');
        $this->form_validation->set_rules('student_id', 'Please click student', 'required|xss_clean');
        $this->form_validation->set_rules('assignments', 'Assignments', 'required|xss_clean');
        $this->form_validation->set_rules('participation', 'Participation in Class', 'required|xss_clean');
        $this->form_validation->set_rules('honesty', 'Honesty', 'required|xss_clean');
        $this->form_validation->set_rules('politeness', 'Politeness', 'required|xss_clean');
        $this->form_validation->set_rules('attentiveness', 'Attentiveness', 'required|xss_clean');
        $this->form_validation->set_rules('community_spirit', 'Community Spirit', 'required|xss_clean');
        $this->form_validation->set_rules('initiative', 'Initiative', 'required|xss_clean');
        $this->form_validation->set_rules('obedience', 'Obedience', 'required|xss_clean');
        $this->form_validation->set_rules('self_control', 'Self Control', 'required|xss_clean');
        $this->form_validation->set_rules('religious_activities', 'Religious Activities', 'required|xss_clean');
        $this->form_validation->set_rules('sense_of_responsibility', 'Sense of Responsibility', 'required|xss_clean');
        $this->form_validation->set_rules('relationship', 'Relationship with Others', 'required|xss_clean');
        $this->form_validation->set_rules('neatness', 'Neatness', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        }else{

            $data = $this->input->post();
            $student_data=array();
            $student_data['student_behavioural_score'] = json_encode($data,JSON_PRETTY_PRINT);
            $student_data['student_id'] = $data['student_id'];
            $student_data['grade_scale_id'] = $data['grade_scale_id'];
            $student_data['term_id'] = $data['term_id'];
            $result = $this->Batches_model->save_student_behavioural_score($student_data);
            if($result) {
                $json['success'] = true;
                $json['message'] = "Student behaviour score save successfully!";
            } else {
                $json['error'] = true;
                $json['message'] = "Seems to an error while saving behaviour score";
            }
        }

        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function get_student_grade(){
      $data = $this->input->post();
      $student_id = $data['student_id'];
      $term_id = $data['term_id'];
      $result = $this->Batches_model->get_student_behaviour_score($student_id,$term_id); 
      $score_info =json_decode($result['student_behavioural_score']);
      $record['behaviour_score'] =$score_info;
      $record['student_info'] =$result;
      $record['s_id'] =$student_id;
      $record['term_id'] =$term_id;
      $record['scales']=$this->Batches_model->get_grade_scale_level(2);
      $json['behaviour_score_html'] = $this->load->view('batches/student_score_form', $record, true);
      if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }


}