<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
	public function __construct(){
	    parent::__construct();
	    /*echo "<pre>";
	    print_r($this->uri->rsegment(1));
	    die();*/
	    if(!$this->session->userdata('is_logged_in')) {
	        redirect('/');
	    }
	   
		}

}