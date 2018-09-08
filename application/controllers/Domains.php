<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Domains extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Domain_model');
        $this->load->helper('content-type');

    }

    public function index()
    {
        $data['domains'] = $this->Domain_model->get_domains();
        $this->load->view('grades/domains', $data);
    }

    public function domains()
    {
        $data['domains'] = $this->Domain_model->get_domains();
        $json['domain_html'] = $this->load->view('grades/domains', $data, true);
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function group_domains()
    {
        $data['domains'] = $this->Domain_model->get_domains();
        $this->load->view('parts/header');
        $this->load->view('parts/topbar');
        $this->load->view('parts/sidebar');
        $json['domain_html'] = $this->load->view('grades/domains', $data);
        $this->load->view('parts/footer');
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function add_domain_group_view()
    {
        $data['indicators'] = $this->Domain_model->get_domain_indicators();
        $data['grades'] = $this->Domain_model->get_grade_scales();
        $this->load->view('parts/header');
        $this->load->view('parts/topbar');
        $this->load->view('parts/sidebar');
        $json['domain_html'] = $this->load->view('grades/add_domain_group', $data);
        $this->load->view('parts/footer');

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function edit_domain_group_view($id)
    {
        $data['indicators'] = $this->Domain_model->get_domain_indicators_by_id($id);
        $data['grades'] = $this->Domain_model->get_grade_scales();
        $data['domain'] = $this->Domain_model->get_domain_group_by_id($id);
        $data['domain_id'] = $id;
        $data['indicator_status'] = 'update';
        $this->load->view('parts/header');
        $this->load->view('parts/topbar');
        $this->load->view('parts/sidebar');
        $json['domain_html'] = $this->load->view('grades/add_domain_group', $data);
        $this->load->view('parts/footer');

        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function save_domain_group()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'domain name', 'required|xss_clean');
        $this->form_validation->set_rules('learning_domain', 'learning domain', 'required|xss_clean');
        $this->form_validation->set_rules('grade_scale_id', 'grade scale', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        }else{
            //save domain group
            $domain= $this->input->post();
            $domain_id = $this->Domain_model->save_domain_group($domain);
            //save domain indicators from temp table
            $result = $this->Domain_model->save_indicators($domain_id);
            if ($result) {
                $this->session->set_flashdata('success', 'Domain group save successfully!');
                redirect('domains/group_domains');
            } else {
                $this->session->set_flashdata('error', 'Seems to an error while saving domain group');
                redirect('domains/group_domains');
            }

        }


    }

    public function add_domain_indicator(){
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'indicator name', 'required|xss_clean');
        $this->form_validation->set_rules('code', 'indicator code', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $indicator= $this->input->post();
            $result = $this->Domain_model->save_domain_indicator($indicator);
            if ($result) {
                if(isset($indicator['domain_group_id'])&&($indicator['domain_group_id']>0)){
                    $data['indicators'] = $this->Domain_model->get_domain_indicators_by_id($indicator['domain_group_id']);
                    $data['domain_id']=$indicator['domain_group_id'];
                }else{

                    $data['indicators'] = $this->Domain_model->get_domain_indicators();
                }

                $json['indicator_html'] = $this->load->view('grades/domain_indicator_table', $data, true);
                $json['success'] = true;
                $json['message'] = "Domain indicator successfully added.";
            } else {
                if(isset($indicator['domain_group_id'])){
                    $data['indicators'] = $this->Domain_model->get_domain_indicators_by_id($indicator['domain_group_id']);
                    $data['domain_id']=$indicator['domain_group_id'];
                }else{
                    $data['indicators'] = $this->Domain_model->get_domain_indicators();
                }
                $json['indicator_html'] = $this->load->view('grades/domain_indicator_table', $data, true);
                $json['error'] = true;
                $json['message'] = "Seems to an error while adding domain indicator.";
            }
        }
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function update_domain_indicator(){
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('name', 'indicator name', 'required|xss_clean');
        $this->form_validation->set_rules('code', 'indicator code', 'required|xss_clean');
        $indicator= $this->input->post();
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();
        } else {
            $update_fields = array('name'=>$indicator['name'],'code'=>$indicator['code'],'description'=>$indicator['description']);
            $result = $this->Domain_model->update_domain_indicator($update_fields,$indicator);
            if ($result) {
                if(isset($indicator['domain_id']) && ($indicator['domain_id'])) {
                    $data['indicators'] = $this->Domain_model->get_domain_indicators_by_id($indicator['domain_id']);
                    $data['domain_id'] = $indicator['domain_id'];
                }else{
                    $data['indicators'] = $this->Domain_model->get_domain_indicators();
                }
                $json['indicator_html'] = $this->load->view('grades/domain_indicator_table', $data, true);
                $json['success'] = true;
                $json['message'] = "Domain indicator successfully updated.";
            } else {
                if(isset($indicator['domain_id']) && ($indicator['domain_id'])) {
                    $data['indicators'] = $this->Domain_model->get_domain_indicators_by_id($indicator['domain_id']);
                    $data['domain_id'] = $indicator['domain_id'];
                }else{
                    $data['indicators'] = $this->Domain_model->get_domain_indicators();
                }
                $json['indicator_html'] = $this->load->view('grades/domain_indicator_table', $data, true);
                $json['error'] = true;
                $json['message'] = "Seems to an error while updating domain indicator.";
            }
        }
        if($this->input->is_ajax_request()) {
            set_content_type($json);
        }

    }

    public function delete_domain_indicator()
    {
        $form_data = $this->input->post();
        if(isset($form_data['domain_id']) && ($form_data['domain_id'])){
            $result = $this->Domain_model->delete_indicator($form_data['delete_id']);
        }else{
            $result = $this->Domain_model->delete_temp_indicator($form_data['delete_id']);
        }

        if ($result) {
            if(isset($form_data['domain_id']) && ($form_data['domain_id'])) {
                $data['indicators'] = $this->Domain_model->get_domain_indicators_by_id($form_data['domain_id']);
                $data['domain_id'] = $form_data['domain_id'];
            }else{
                $data['indicators'] = $this->Domain_model->get_domain_indicators();
            }
            $json['indicator_html'] = $this->load->view('grades/domain_indicator_table', $data, true);
            $json['success'] = true;
            $json['message'] = "Domain indicator successfully deleted.";
        } else {
            if(isset($form_data['domain_id']) && ($form_data['domain_id'])) {
                $data['indicators'] = $this->Domain_model->get_domain_indicators_by_id($form_data['domain_id']);
                $data['domain_id'] = $form_data['domain_id'];
            }else{
                $data['indicators'] = $this->Domain_model->get_domain_indicators();
            }
            $json['indicator_html'] = $this->load->view('grades/domain_indicator_table', $data, true);
            $json['error'] = true;
            $json['message'] = "Seems to an error while deleting domain indicator.";
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }



}
