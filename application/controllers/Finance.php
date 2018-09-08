<?php

defined('BASEPATH') OR exit('No direct script access allowed');

	class Finance extends MY_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->helper('content-type');
            $this->load->model('Finance_model');
		}

		public function institution_bank_accounts(){
            $data['accounts'] = $this->Finance_model->get_institution_bank_accounts();
            $data['banks'] = $this->Finance_model->get_institute_banks();
            $json['finance_html'] = $this->load->view('finance/institution_bank', $data, true);
	    	if($this->input->is_ajax_request()) {
		      set_content_type($json);
		    }
    	}

    	public function fee_type(){
    		$data['fees'] = $this->Finance_model->get_fee_type();
            $json['finance_html'] = $this->load->view('finance/fee_types', $data, true);
	    	if($this->input->is_ajax_request()) {
		      set_content_type($json);
		    }
    	}

        public function add_bank_institution(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('bank_name', 'bank name', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $bank = $this->input->post();
                $result = $this->Finance_model->add_bank_institution($bank);
                if ($result) {
                    $data['accounts'] = $this->Finance_model->get_institution_bank_accounts();
                    $json['finance_html'] = $this->load->view('finance/institution_bank', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Institute bank account successfully added.";
                } else {
                    $data['accounts'] = $this->Finance_model->get_institution_bank_accounts();
                    $json['finance_html'] = $this->load->view('finance/institution_bank', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while adding class.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function update_bank_institution() {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('account_name', 'account name', 'required|xss_clean');
            $data = $this->input->post();


            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $update_fields = array('bank_name'=>$data['bank_name'],'account_name'=>$data['account_name']
                ,'account_number'=>$data['account_number']);
                $result = $this->Finance_model->update_bank_account($update_fields,$data['account_id']);
                if ($result) {
                    $data['accounts'] = $this->Finance_model->get_institution_bank_accounts();
                    $json['finance_html'] = $this->load->view('finance/institution_bank', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Bank account successfully updated.";
                } else {
                    $data['accounts'] = $this->Finance_model->get_institution_bank_accounts();
                    $json['finance_html'] = $this->load->view('finance/institution_bank', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error in image uploading.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function delete_account($id){
            $result = $this->Finance_model->delete_institute_bank_account($id);
            if ($result) {
                $data['accounts'] = $this->Finance_model->get_institution_bank_accounts();
                $json['finance_html'] = $this->load->view('finance/institution_bank', $data, true);
                $json['success'] = true;
                $json['message'] = "Account successfully deleted.";
            } else {
                $data['accounts'] = $this->Finance_model->get_institution_bank_accounts();
                $json['finance_html'] = $this->load->view('finance/institution_bank', $data, true);
                $json['success'] = true;
                $json['message'] = "Seems to an error in delete student record.";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

    	public function custom_payment_method(){
		    $data['payments']=$this->Finance_model->get_payments();
    		$json['finance_html'] = $this->load->view('finance/custom_payment', $data, true);
	    	if($this->input->is_ajax_request()) {
		      set_content_type($json);
		    }
    	}

    	public function transaction_categories(){
            $data['transaction_cat'] = $this->Finance_model->get_transaction_cat();
    		$json['finance_html'] = $this->load->view('finance/transection_categories', $data, true);
	    	if($this->input->is_ajax_request()) {
		      set_content_type($json);
		    }
    	}

        public function add_fee(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'fee name', 'required|xss_clean');
            $this->form_validation->set_rules('description', 'fee description', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $fee = $this->input->post();
                $result = $this->Finance_model->add_fee($fee);
                if ($result) {
                    $data['fees'] = $this->Finance_model->get_fee_type();
                    $json['finance_html'] = $this->load->view('finance/fee_types', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Institute bank account successfully added.";
                } else {
                    $data['fees'] = $this->Finance_model->get_fee_type();
                    $json['finance_html'] = $this->load->view('finance/fee_types', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while adding class.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function update_fee() {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'fee name', 'required|xss_clean');
            $this->form_validation->set_rules('description', 'fee description', 'required|xss_clean');
            $data = $this->input->post();
            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $update_fields = array('name'=>$data['name'],'description'=>$data['description']);
                $result = $this->Finance_model->update_fee($update_fields,$data['fee_id']);
                if ($result) {
                    $data['fees'] = $this->Finance_model->get_fee_type();
                    $json['finance_html'] = $this->load->view('finance/fee_types', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Fee successfully updated.";
                } else {
                    $data['fees'] = $this->Finance_model->get_fee_type();
                    $json['finance_html'] = $this->load->view('finance/fee_types', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error in image uploading.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function delete_fee($id){
            $result = $this->Finance_model->delete_fee($id);
            if ($result) {
                $data['fees'] = $this->Finance_model->get_fee_type();
                $json['finance_html'] = $this->load->view('finance/fee_types', $data, true);
                $json['success'] = true;
                $json['message'] = "Account successfully deleted.";
            } else {
                $data['fees'] = $this->Finance_model->get_fee_type();
                $json['finance_html'] = $this->load->view('finance/fee_types', $data, true);
                $json['success'] = true;
                $json['message'] = "Seems to an error in delete student record.";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function add_payment(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'fee name', 'required|xss_clean');
            $this->form_validation->set_rules('description', 'fee description', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $payment = $this->input->post();
                if(isset($payment['is_incoming']) && ($payment['is_incoming']=='on')){$payment['is_incoming']=1;}else{$payment['is_incoming']=0;}
                $result = $this->Finance_model->add_payment($payment);
                if ($result) {
                    $data['payments']=$this->Finance_model->get_payments();
                    $json['finance_html'] = $this->load->view('finance/custom_payment', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Payment successfully added.";
                } else {
                    $data['payments']=$this->Finance_model->get_payments();
                    $json['finance_html'] = $this->load->view('finance/custom_payment', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while adding class.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function update_payment() {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'fee name', 'required|xss_clean');
            $this->form_validation->set_rules('description', 'fee description', 'required|xss_clean');
            $data = $this->input->post();
            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                if(isset($data['is_incoming']) && ($data['is_incoming']=='on')){$data['is_incoming']=1;}else{$data['is_incoming']=0;}
                $update_fields = array('name'=>$data['name'],'description'=>$data['description'],'is_incoming'=>$data['is_incoming']);
                $result = $this->Finance_model->update_payment($update_fields,$data['payment_id']);
                if ($result) {
                    $data['payments']=$this->Finance_model->get_payments();
                    $json['finance_html'] = $this->load->view('finance/custom_payment', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Payment successfully updated.";
                } else {
                    $data['payments']=$this->Finance_model->get_payments();
                    $json['finance_html'] = $this->load->view('finance/custom_payment', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error in image uploading.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function delete_payment($id){
            $result = $this->Finance_model->delete_payment($id);
            if ($result) {
                $data['payments']=$this->Finance_model->get_payments();
                $json['finance_html'] = $this->load->view('finance/custom_payment', $data, true);
                $json['success'] = true;
                $json['message'] = "Payment successfully deleted.";
            } else {
                $data['payments']=$this->Finance_model->get_payments();
                $json['finance_html'] = $this->load->view('finance/custom_payment', $data, true);
                $json['success'] = true;
                $json['message'] = "Seems to an error in delete student record.";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function add_transaction_categories(){
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $trans_cat = $this->input->post();
                $result = $this->Finance_model->add_transaction_cat($trans_cat);
                if ($result) {
                    $data['transaction_cat'] = $this->Finance_model->get_transaction_cat();
                    $json['finance_html'] = $this->load->view('finance/transection_categories', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Transaction Categories added successfully.";
                } else {
                    $data['transaction_cat'] = $this->Finance_model->get_transaction_cat();
                    $json['finance_html'] = $this->load->view('finance/transection_categories', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Seems to an error while adding transaction categories.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function update_transaction_categories() {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'name', 'required|xss_clean');
            $data = $this->input->post();
            //print_r($data); die();

            if ($this->form_validation->run() == FALSE) {
                $json['error'] = true;
                $json['message'] = validation_errors();
            } else {
                $update_fields = array('name'=>$data['name'],'description'=>$data['description']);
                $result = $this->Finance_model->update_transaction_categories($update_fields,$data['trans_id']);
                if ($result) {
                    $data['transaction_cat'] = $this->Finance_model->get_transaction_cat();
                    $json['finance_html'] = $this->load->view('finance/transection_categories', $data, true);
                    $json['success'] = true;
                    $json['message'] = "Transaction categories successfully updated.";
                } else {
                    $data['transaction_cat'] = $this->Finance_model->get_transaction_cat();
                    $json['finance_html'] = $this->load->view('finance/transection_categories', $data, true);
                    $json['error'] = true;
                    $json['message'] = "Error updating.";
                }
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }

        public function delete_transaction_categories($id){
            $result = $this->Finance_model->delete_finance_transaction_categories($id);
            if ($result) {
                $data['transaction_cat'] = $this->Finance_model->get_transaction_cat();
                $json['finance_html'] = $this->load->view('finance/transection_categories', $data, true);
                $json['success'] = true;
                $json['message'] = "Account successfully deleted.";
            } else {
                $data['transaction_cat'] = $this->Finance_model->get_transaction_cat();
                $json['finance_html'] = $this->load->view('finance/transection_categories', $data, true);
                $json['success'] = true;
                $json['message'] = "Seems to an error in delete student record.";
            }
            if($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        }


	}


?>