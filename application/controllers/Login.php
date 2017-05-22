<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
        // To use site_url and redirect on this controller.
        $this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('login');
	}
	
	public function login(){

        $this->load->view('login');
	}
	public function saveUserData(){
		echo '<pre>'; print_r($_POST); die;
        $random_password = $this->user_model->generate_random_string(8);
		$this->user_model->register($_POST['first_name'],$_POST['last_name'],$_POST['email'],md5($random_password),$_POST['email'], 'Facebook');
		$this->user_model->update_pic($_POST['image_url']);
		
		if($this->session->userdata('ref_url') !== ''){
			echo $this->session->userdata('ref_url');
		}else{
			echo base_url();
		}
	}

    public function logout()
	{		
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('send_data');
	    session_destroy();
		$this->input->set_cookie('user_id', '');
		$this->input->set_cookie('user_name','');
		$this->input->set_cookie('user_type', '');
	  
	   redirect(base_url(), 'refresh');
	}
}
