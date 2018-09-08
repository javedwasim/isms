<?php

class Calendar_Model extends CI_Model
{
    public function get_events($start, $end)
    {
        return $this->db->get("calendar_events");
    }

    public function add_event($data)
    {
        $this->db->insert("calendar_events", $data);
    }

    public function get_event($id)
    {
        return $this->db->where("ID", $id)->get("calendar_events");
    }

    public function update_event($id, $data)
    {
        $this->db->where("ID", $id)->update("calendar_events", $data);
        return $this->db->affected_rows();
    }

    public function delete_event($id)
    {
        $this->db->where('id', $id)->delete('calendar_events');
        $this->db->where('event_id', $id)->delete('events_groups');
        return $this->db->affected_rows();
    }
    
    public function save_event($data)
    {
        $this->db->insert('calendar_events', $data);
        return $this->db->insert_id();
    }
    
    public function save_event_group($data,$event_id)
    {
        if(isset($data['class_group'])){
            $class_groups = $data['class_group'];
            foreach ($class_groups as $group){
                $this->db->insert('events_groups', array('event_id'=>$event_id,'event_groups'=>$group));
            }
        }
        
        if(isset($data['student_category'])){
            $groups = $data['student_category'];
            foreach ($groups as $group){
                $this->db->insert('events_groups', array('event_id'=>$event_id,'event_groups'=>$group));
            }
        }
        
        if(isset($data['employee_category'])){
            $groups = $data['employee_category'];
            foreach ($groups as $group){
                $this->db->insert('events_groups', array('event_id'=>$event_id,'event_groups'=>$group));
            }
        }
        
        if(isset($data['employee_department'])){
            $groups = $data['employee_department'];
            foreach ($groups as $group){
                $this->db->insert('events_groups', array('event_id'=>$event_id,'event_groups'=>$group));
            }
        }
        
        if(isset($data['employee_position'])){
            $groups = $data['employee_position'];
            foreach ($groups as $group){
                $this->db->insert('events_groups', array('event_id'=>$event_id,'event_groups'=>$group));
            }
        }
        
        return $this->db->insert_id();
    }
    
    public function get_event_list()
    {
        $result = $this->db->select('*')
                    ->from('calendar_events')
                    ->get();
        
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }
    
    public function get_eventby_id($id)
    {
        $result = $this->db->select('*')
                    ->from('calendar_events')
                    ->where('id',$id)
                    ->limit(1)
                    ->get();
        
        if ($result) {
            return $result->row_array();
        } else {
            return array();
        }
    }

}

?>