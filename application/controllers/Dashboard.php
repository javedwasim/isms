<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->model('Student_model');
    }

    public function index() {
        if (!$this->session->userdata('is_logged_in')) {
            $this->load->view('login');
        } else {
            $data['students'] = $this->Student_model->get_all_students();
            $this->load->view('student/index', $data);
            //redirect('dashboard/dashboard');
        }
    }

    public function dashboard() {
        $this->load->view('parts/header');
        $this->load->view('parts/topbar');
        $this->load->view('parts/sidebar');
        $this->load->view('dashboard/dashboard');
        $this->load->view('parts/footer');
    }

    public function login() {
        //$hashToStoreInDb = password_hash('admin', PASSWORD_BCRYPT); print_r($hashToStoreInDb); die();
        if (!$this->session->userdata('is_logged_in')) {
            if ($this->input->post()) {
                $user_email = $this->input->post('email');
                $result = $this->Dashboard_model->get_user_by_email($user_email);
                if ($result) {
                    if (password_verify($this->input->post('password'), $result['password'])) {
                       
                        $this->session->set_userdata('userdata', $result);
                        $this->session->set_userdata('is_logged_in', '1');
                        $other_rights = $this->Dashboard_model->get_other_rights_detail();
                        $this->session->set_userdata('other_rights', $other_rights);
                        redirect('dashboard');
                        
                    } else {
                        $this->session->set_flashdata('error', "Wrong username or password.");
                        redirect('/');
                    }
                } else {
                    $this->session->set_flashdata('error', "Wrong username or password.");
                    redirect('/');
                }
            } else {
                //$this->session->set_flashdata('error', "Wrong user name or password.");
                $this->load->view('login');
            }
        }
    }

    public function get_menus() {
        $this->load->model('model_menu');
        $menus_array = $this->model_menu->fetch_menu();
        $this->load->helper('menu');
        $data['menu_result'] = print_menu(0, $menus_array);
        $data['user_data'] = $this->session->userdata('userdata');
        $this->load->view('parts/menu', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('/');
    }

}
