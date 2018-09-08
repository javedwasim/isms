<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
Class Fee_model extends CI_Model {

    public function get_batch_students($batch_id) {
        $result = $this->db->select('students.*')
                    ->from('students')
                    ->where('batch_no',$batch_id)
                    ->order_by('first_name')
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function add_payment($data) {
        if(($data['payment_id'])&&(!empty($data['payment_id'])) ){
            $payment_id = $data['payment_id'];
            $update_data = array(
                                'batch_id'=>$data['batch_id'],
                                'student_id'=>$data['student_id'],
                                'title'=>$data['title'],
                                'description'=>$data['description'],
                                'date'=>$data['date'],
                                'amount'=>$data['amount'],
                                'amount_paid'=>$data['amount_paid'],
                                'status'=>$data['status'],
                            );
            $this->db->where('id', $data['payment_id'])->update('student_fee', $update_data);
            return $this->db->affected_rows();
        }else{
            unset($data['payment_id']);
            $this->db->insert('student_fee', $data);
            return $this->db->insert_id();
        }

    }

    public function get_payments(){
        $this->db->select('sf.*,s.first_name,s.last_name,b.*,c.code');
        $this->db->from('student_fee sf');
        $this->db->join('students s', 's.student_id=sf.student_id', 'left');
        $this->db->join('batches b', 'b.id=s.batch_no', 'left');
        $this->db->join('classes c', 'c.id=b.course_id', 'left');
        $result = $this->db->get();
        if($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

}