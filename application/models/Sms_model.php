<?php

class Sms_Model extends CI_Model
{

    public function add_sms($data,$recipients)
    {
        $result = $this->db->select('*')->from('selected_recipients')->limit(1)->get();
        //print_r($recipients); die();
        if($result->num_rows()>0){

            $this->db->insert("sms", $data);
            $sms_id =  $this->db->insert_id();

            if (in_array("selected_students_guardians", $recipients)){
                $result = $this->db->select('*')
                            ->from('student_guardians')
                            ->join('guardians','guardians.guardian_id = student_guardians.guardian_id')
                            ->group_by('student_guardians.guardian_id')
                            ->get();
                $student_guardians = $result->result_array();
                foreach ($student_guardians as $guardian){
                    //send sms on selected user mobile
                    $this->db->insert("sms_recipients", array('recipient_id'=>$guardian['guardian_id'],'recipient_group'=>'student_guardians','sms_id'=>$sms_id));
                }
            }
            if (in_array("selected_guardians", $recipients)){
                $result = $this->db->select('*')->from('selected_recipients')->where('recipient_group','selected_guardians')->get();
                $selected_guardians = $result->result_array();
                foreach ($selected_guardians as $guardian){
                    //send sms on selected user mobile
                    $this->db->insert("sms_recipients", array('recipient_id'=>$guardian['user_id'],'recipient_group'=>'selected_guardians','sms_id'=>$sms_id));
                }
            }
            if (in_array("selected_students", $recipients)){
                $result = $this->db->select('*')->from('selected_recipients')->where('recipient_group','selected_students')->get();
                $selected_students = $result->result_array();
                foreach ($selected_students as $student){
                    //send sms on selected user mobile
                    $this->db->insert("sms_recipients", array('recipient_id'=>$student['user_id'],'recipient_group'=>'selected_students','sms_id'=>$sms_id));
                }
            }

            if (in_array("selected_employees", $recipients)){
                $result = $this->db->select('*')->from('selected_recipients')->where('recipient_group','selected_employees')->get();
                $selected_employees = $result->result_array();
                foreach ($selected_employees as $employee){
                    //send sms on selected user mobile
                    $this->db->insert("sms_recipients", array('recipient_id'=>$employee['user_id'],'recipient_group'=>'selected_employees','sms_id'=>$sms_id));
                }
            }
            return $sms_id;

        }else{
            return false;
        }

    }

    public function get_sms_detail($id){
        $query = "SELECT sms.*, 
                    CASE 
                        WHEN st.first_name !='' THEN CONCAT(st.first_name,\" \",st.last_name)
                        WHEN employee.first_name !='' THEN CONCAT(employee.first_name,\" \",employee.middle_name)
                        WHEN guardian.first_name !='' THEN CONCAT(guardian.first_name,\" \",guardian.last_name)
                        WHEN sguardian.first_name !='' THEN CONCAT(sguardian.first_name,\" \",sguardian.last_name)
                    ELSE '' END AS UserName,
                    
                    CASE 
                        WHEN st.mobile_phone !='' THEN st.mobile_phone
                        WHEN employee.mobile_phone !='' THEN employee.mobile_phone
                        WHEN guardian.mobile_phone !='' THEN guardian.mobile_phone
                        WHEN sguardian.mobile_phone !='' THEN sguardian.mobile_phone
                    ELSE '' END AS mobile_phone
                    
                    
                    FROM `sms`
                    LEFT JOIN sms_recipients  ON sms_recipients.sms_id = sms.id 
                    
                    LEFT JOIN (
                        select * FROM students
                    )st ON st.student_id = sms_recipients.recipient_id AND sms_recipients.recipient_group = 'selected_students'
                    
                    LEFT JOIN 
                    (
                        select * FROM employees
                    
                    )employee ON employee.employee_id = sms_recipients.recipient_id 
                    AND sms_recipients.recipient_group = 'selected_employees'
                    
                    LEFT JOIN 
                    (
                        select * FROM guardians
                    
                    )guardian ON guardian.guardian_id = sms_recipients.recipient_id 
                    AND sms_recipients.recipient_group = 'student_guardians'
                    
                    LEFT JOIN 
                    (
                        select * FROM guardians
                    
                    )sguardian ON sguardian.guardian_id = sms_recipients.recipient_id 
                    AND sms_recipients.recipient_group = 'selected_guardians'
                    
                    where sms.id = $id";
        $result = $query = $this->db->query($query);
        if($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }


    
    public function get_sms_list()
    {
        $query = "SELECT sms.*, sr.recipients 
                    FROM `sms` 
                    LEFT JOIN (
                        SELECT count(id) as recipients, sms_id
                        From sms_recipients
                        GROUP BY sms_recipients.sms_id
                    )sr ON sr.sms_id = sms.id
                    WHERE 1";
        $result = $query = $this->db->query($query);
        if($result) {
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