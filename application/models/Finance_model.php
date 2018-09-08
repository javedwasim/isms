<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
Class Finance_model extends CI_Model {

    public function get_institution_bank_accounts(){
        $this->db->select('a.*, banks.name as bank_name');
        $this->db->from('bank_accounts a');
        $this->db->join('banks', 'banks.id=a.bank_name', 'left');
        $this->db->order_by('a.id','desc');
        $result = $this->db->get();
        if($result) {
            return $result->result_array();
        } else {
            return array();
        }

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

    public function update_bank_account($data, $id) {
        $this->db->where('id', $id)->update('bank_accounts', $data);
        return $this->db->affected_rows();
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

    public function add_transaction_cat($data) {
        $this->db->insert('transaction_categories', $data);
        return $this->db->insert_id();
    }

    public function get_transaction_cat(){
        $result = $this->db->select('*')
                    ->from('transaction_categories')
                    ->get();
        if ($result) {
            return $result->result_array();
        } else {
            return array();
        }

    }

    public function update_transaction_categories($data, $id) {
        $this->db->where('id', $id)->update('transaction_categories', $data);
        return $this->db->affected_rows();
    }

    public function delete_finance_transaction_categories($id) {
        $this->db->where('id', $id)->delete('transaction_categories');
        return $this->db->affected_rows();
    }

}