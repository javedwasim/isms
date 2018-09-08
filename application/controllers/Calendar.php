<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends CI_Controller
{

     public function __construct() {
        Parent::__construct();
        $this->load->model("Calendar_model");
        $this->load->model('Batches_model');
        $this->load->model('Student_model');
        $this->load->model('Employee_model');
    }

     public function index()
     {
        $data['screen'] = 'calendar';
        $this->load->view("calendar/index", $data);
          
     }
     
     public function Calendar(){
        $data['classes'] = $this->Batches_model->get_all_classes();
        $json['calendar_html'] = $this->load->view('calendar/Calendar', $data, true);
        if($this->input->is_ajax_request()) {
          set_content_type($json);
        }
     } 
     
     public function events(){
        $data['events'] = $this->Calendar_model->get_event_list();
        $json['calendar_html'] = $this->load->view('calendar/events_list',$data , true);
        if($this->input->is_ajax_request()) {
          set_content_type($json);
        }
     }
     
     public function events_list(){
        $data['events'] = $this->Calendar_model->get_event_list();
        $data['screen'] = 'events';
        $json['calendar_html'] = $this->load->view('calendar/index',$data);
        if($this->input->is_ajax_request()) {
          set_content_type($json);
        }
     } 
     
     public function add_event_view(){
        $data['classes'] = $this->Batches_model->get_all_classes();
        $data['categories'] = $this->Student_model->get_all_student_categories();
        $data['ecategories'] = $this->Employee_model->get_employee_categories();
        $data['departments'] = $this->Employee_model->get_employee_departments();
        $data['positions'] = $this->Employee_model->get_employee_positions();
        $json['add_event_html'] = $this->load->view('calendar/add_event', $data, true);
        if($this->input->is_ajax_request()) {
          set_content_type($json);
        }
     }
            


     public function get_events()
    {
        // Our Start and End Dates
        $start = $this->input->get("2018-08-01 00:00:00");
        $end = $this->input->get("2018-08-31 00:00:00");

        $startdt = new DateTime('now'); // setup a local datetime
        $startdt->setTimestamp($start); // Set the date based on timestamp
        $start_format = $startdt->format('Y-m-d H:i:s');

        $enddt = new DateTime('now'); // setup a local datetime
        $enddt->setTimestamp($end); // Set the date based on timestamp
        $end_format = $enddt->format('Y-m-d H:i:s');

        $events = $this->Calendar_model->get_events($start_format, $end_format);

        $data_events = array();

        foreach($events->result() as $r) {
            $data_events[] = array(
                "id" => $r->id,
                "title" => $r->title,
                "description" => $r->description,
                "end" => $r->end,
                "start" => $r->start
            );
        }

        echo json_encode(array("events" => $data_events));
        exit();
    }
    
    public function save_event(){
        $this->load->library('form_validation');
        $this->load->helper('security');
        //rules for required fields e.g email should be unique
        $this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
        $this->form_validation->set_rules('start', 'Event Start', 'required|xss_clean');
        $this->form_validation->set_rules('end', 'Event End', 'required|xss_clean');
        //echo "<pre>"; print_r($this->input->post()); die();
        if ($this->form_validation->run() == FALSE) {
            $validation_errors = validation_errors();
            $data['screen'] = 'create_event';
            $data['classes'] = $this->Batches_model->get_all_classes();
            $data['categories'] = $this->Student_model->get_all_student_categories();
            $data['ecategories'] = $this->Employee_model->get_employee_categories();
            $data['departments'] = $this->Employee_model->get_employee_departments();
            $data['positions'] = $this->Employee_model->get_employee_positions();
            $data['message'] = $this->session->set_flashdata('errors', $validation_errors);
            $this->load->view('calendar/index', $data);
        }else{
            $data = $this->input->post();
            $event_id=0;
            $event_data = array('title'=>$data['title'],'start'=>$data['start'],'description'=>$data['description'],
                            'end'=>$data['end'],'is_holiday'=>$data['is_holiday'],'is_common'=>$data['is_common']);
            //update event
            if($data['event_id']>0){
                $id = $data['event_id'];
                $result = $this->Calendar_model->update_event($id,$event_data);
            }
            //inset new event
            else{
                $event_id = $this->Calendar_model->save_event($event_data);
                $this->Calendar_model->save_event_group($data,$event_id);
            }
            
            if ($event_id || $result) {
                $this->session->set_flashdata('success', 'Event save successfully!');
                redirect('calendar/events_list');
            } 
            else {
                $this->session->set_flashdata('errors', 'Seem to be an error while saving event!');
                redirect('calendar/events_list');
            }
            
        }
        
    }
    
    
    public function edit_view($id){
        $data['event'] = $this->Calendar_model->get_eventby_id($id);
        $data['classes'] = $this->Batches_model->get_all_classes();
        $data['categories'] = $this->Student_model->get_all_student_categories();
        $data['ecategories'] = $this->Employee_model->get_employee_categories();
        $data['departments'] = $this->Employee_model->get_employee_departments();
        $data['positions'] = $this->Employee_model->get_employee_positions();
        $json['add_event_html'] = $this->load->view('calendar/add_event', $data, true);
        if($this->input->is_ajax_request()) {
          set_content_type($json);
        }
    }
     
    public function delete(){
        $data = $this->input->post();
        $id = $data['event_id'];
        $result = $this->Calendar_model->delete_event($id);
        if ($result) {
            $json['success'] = true;
            $json['message'] = "Event successfully deleted.";
            $data['events'] = $this->Calendar_model->get_event_list();
            $json['calendar_html'] = $this->load->view('calendar/events_list',$data , true);

        } else {
            $json['error'] = true;
            $json['message'] = "Seem to be an error while deleting event";
            $data['events'] = $this->Calendar_model->get_event_list();
            $json['calendar_html'] = $this->load->view('calendar/events_list',$data , true);
        }
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

}

?>