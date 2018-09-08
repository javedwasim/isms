<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
Class Grade_model extends CI_Model {

    public function get_scales(){
        $result = $this->db->select('*')
                    ->from('grade_scales')
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function get_scale_level($scale_id){
        $result = $this->db->select('*')
                    ->from('grade_scale_level')
                    ->where('grade_scale_id',$scale_id)
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function get_scale_by_id($id){
        $result = $this->db->select('*')
                    ->from('grade_scales')
                    ->where('id',$id)
                    ->limit(1)
                    ->get();
        if ($result) {
            return $result->row_array();
        } else {
            return array();
        }
    }

    public function get_scale_level_by_id($id){
        $result = $this->db->select('*')
            ->from('grade_scale_level')
            ->where('id',$id)
            ->limit(1)
            ->get();
        if ($result) {
            return $result->row_array();
        } else {
            return array();
        }
    }


    public function save_grade_scale($data){
        $this->db->insert('grade_scales', $data);
        return $this->db->insert_id();
    }

    public function save_grade_scale_level($data){
        $this->db->insert('grade_scale_level', $data);
        return $this->db->insert_id();
    }

    public function update_scale($data, $id) {
        $this->db->where('id', $id)->update('grade_scales', $data);
        return $this->db->affected_rows();
    }

    public function update_scale_level($data, $id) {
        $this->db->where('id', $id)->update('grade_scale_level', $data);
        return $this->db->affected_rows();
    }

    public function delete_grade_scale($id) {
        $this->db->where('id', $id)->delete('grade_scales');
        return $this->db->affected_rows();
    }

    public function retire_grade_scale($id) {
        $this->db->where('id', $id)->update('grade_scales',array('status'=>'retire'));
        return $this->db->affected_rows();
    }

    public function delete_grade_scale_level($id) {
        $this->db->where('id', $id)->delete('grade_scale_level');
        return $this->db->affected_rows();
    }

    public function get_institute_banks(){
        $result = $this->db->select('*')
                    ->from('banks')
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function add_bank_institution($data) {
        $this->db->insert('bank_accounts', $data);
        return $this->db->insert_id();
    }



    public function delete_institute_bank_account($id) {
        $this->db->where('id', $id)->delete('bank_accounts');
        return $this->db->affected_rows();
    }

    public function get_fee_type(){
        $result = $this->db->select('*')->from('fee_type')->get();
        if($result){
            return $result->result_array();
        }else{
            return array();
        }
    }

    public function add_fee($data){
        $this->db->insert('fee_type',$data);
        return $this->db->insert_id();
    }

    public function update_fee($data,$id){
        $this->db->where('id',$id)->update('fee_type',$data);
        return $this->db->affected_rows();
    }

    public function delete_fee($id) {
        $this->db->where('id', $id)->delete('fee_type');
        return $this->db->affected_rows();
    }

    public function get_payments(){
        $result = $this->db->select('*')->from('payments')->get();
        if($result){
            return $result->result_array();
        }else{
            return array();
        }
    }

    public function add_payment($data){
        $this->db->insert('payments',$data);
        return $this->db->insert_id();
    }

    public function update_payment($data,$id){
        $this->db->where('id',$id)->update('payments',$data);
        return $this->db->affected_rows();
    }

    public function delete_payment($id) {
        $this->db->where('id', $id)->delete('payments');
        return $this->db->affected_rows();
    }

}