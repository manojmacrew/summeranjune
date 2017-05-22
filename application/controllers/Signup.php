<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
	public function __construct(){
		parent::__construct();

        // To use site_url and redirect on this controller.
		$this->load->library('googleplus');
        $this->load->helper('url');
		$this->load->model('Common_Model');
		$this->load->library('session');
	}
	
	public function index()
	{
		$user_session = $this->session->userdata('logged_in');
		
		if(!$user_session['social_profile_id']){
			if (!$this->googleplus->client->getAccessToken()){	// Need to set a session here if he is already logged in
				$authUrl = $this->googleplus->client->createAuthUrl();	
				$data['google_login_url'] = $authUrl;
			}else{	
				
			}
			$this->load->view('header');
			$this->load->view('signup',$data);
			$this->load->view('footer');
		}
		else
		{
			redirect(base_url(),'refresh');
		}
		
	}
	
	public function signup()
	{
		if (!$this->googleplus->client->getAccessToken()){	// Need to set a session here if he is already logged in
			$authUrl = $this->googleplus->client->createAuthUrl();	
			$data['google_login_url'] = $authUrl;
		}else{	
			
		}
		
        $this->load->view('header');
        $this->load->view('signup',$data);
		$this->load->view('footer');
	}
	
	/*
	*
	*	 Save facebook Data  and set session for login user
	*
	*/
	public function saveFacebookUserData(){
		$first_name = $_POST['first_name'];
		$last_name 	= $_POST['last_name'];
		
		$social_id 	= $_POST['social_id'];
		$image_url 	= $_POST['image_url'];
		if(isset($_POST['email']) && $_POST['email'] !='')
		{
			$email 		= $_POST['email'];
			$checkEmail = $this->Common_Model->has_duplicate($email, 'sj_users', 'email');
			if($checkEmail > 0)
			{
				$result = $this->Common_Model->getRow('sj_users',array('email'=>$email));
				if($result)
				{
					$sess_array = array();
					$sess_array = array(
						'social_profile_id' => $result->social_profile_id,
						'user_role' => $result->user_role,
						'email' => $result->email,
						'first_name' => $result->first_name,
						'last_name' => $result->last_name,
						'user_id' => $result->id,
					);
					$this->session->set_userdata('logged_in', $sess_array); 
					if($result->user_role == 1){
						echo base_url('instructor/dashboard');
					}else{
						echo base_url('student/dashboard');
					}
				}
				else
				{
					$this->session->set_flashdata('errormessage', 'invalid username/password');
					redirect('login', 'refresh');
				}
			}
			else
			{
				$now = date('Y-m-d H:i:s');
				$tableData = array(
						'social_profile_id' =>$social_id,
						'user_role' =>$this->session->userdata('signup_role'),
						'first_name' =>$first_name,
						'last_name' =>$last_name,
						'email' =>$email,
						'social_type' =>'Facebook',
						'created_at' =>$now
					);
				$this->Common_Model->insert('sj_users',$tableData);
				$userId = $this->db->insert_id();
				$this->Common_Model->insertUsermeta('user_profile_image', $image_url, $userId);
				$sess_array = array(
					'social_profile_id' => $social_id,
					'user_role' => $this->session->userdata('signup_role'),
					'email' => $email,
					'first_name' => $first_name,
					'last_name' => $last_name,
					'user_id' => $userId,
				);
				$this->session->set_userdata('logged_in', $sess_array);
				if($this->session->userdata('signup_role') == 1){
					echo base_url('instructor/dashboard');
				}else{
					echo base_url('student/dashboard');
				}
			}
		}
		else
		{
			
				$statusMsg = 'Somthing went wrong. Please check your facebook account.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
				$url =  base_url('signup');
				redirect($url, 'refresh');
		}
		
	}
	
	/*
	*
	*	 Save Google Data  and set session for login user
	*
	*/
	public function goauth_redirect(){
		if(isset($_REQUEST['error'])){
			redirect('signup');
		}
		try{
			if($this->input->get('code')!='') {
				$this->googleplus->client->authenticate();
			}
			$user_profile = $this->googleplus->people->get("me");
		}
		catch (GooglePlusApiException $e) {
        	$user_profile = null;
        }
		if($user_profile != null){
			$first_name = $user_profile['name']['givenName'];
			$last_name 	= $user_profile['name']['familyName'];
			$email 		= $user_profile['emails'][0]['value'];
			$social_id 	= $user_profile['id'];
			$image_url 	= $user_profile['image']['url'];
			$checkEmail = $this->Common_Model->has_duplicate($email, 'sj_users', 'email');
			if($checkEmail > 0)
			{
				$result = $this->Common_Model->getRow('sj_users',array('email'=>$email));
				if($result)
				{
					$sess_array = array();
					$sess_array = array(
						'social_profile_id' => $result->social_profile_id,
						'user_role' => $result->user_role,
						'email' => $result->email,
						'first_name' => $result->first_name,
						'last_name' => $result->last_name,
						'user_id' => $result->id,
					);
					$this->session->set_userdata('logged_in', $sess_array); 
					if($result->user_role == 1){
						$url =  base_url('instructor/dashboard');
						redirect($url, 'refresh');
					}else{
						$url =  base_url('student/dashboard');
						redirect($url, 'refresh');
					}
			   }
			   else
			   {
				 $this->session->set_flashdata('errormessage', 'invalid username/password');
				  redirect('signup', 'refresh');
			   }
			}
			else{
				$now = date('Y-m-d H:i:s');
				$tableData = array(
						'social_profile_id' =>$social_id,
						'user_role' =>$this->session->userdata('signup_role'),
						'first_name' =>$first_name,
						'last_name' =>$last_name,
						'email' =>$email,
						'social_type' =>'Google',
						'created_at' =>$now
					);
				$this->Common_Model->insert('sj_users',$tableData);
				$userId = $this->db->insert_id();
				$this->Common_Model->insertUsermeta('user_profile_image', $image_url, $userId);
				$sess_array = array(
					'social_profile_id' => $social_id,
					'user_role' => $this->session->userdata('signup_role'),
					'email' => $email,
					'first_name' => $first_name,
					'last_name' => $last_name,
					'user_id' => $userId,
				);
				$this->session->set_userdata('logged_in', $sess_array);
				if($this->session->userdata('signup_role') == 1){
					$url =  base_url('instructor/dashboard');
					redirect($url, 'refresh');
				}else{
					$url =  base_url('student/dashboard');
					redirect($url, 'refresh');
				}
			}
			
		}
	}
}
