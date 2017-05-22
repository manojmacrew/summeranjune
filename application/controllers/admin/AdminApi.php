<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class AdminApis extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->helper('url');
		$this->load->model('AdminApi_Model'); 
    }
	
	/*
	*
	*	Admin Login
	*
	*/
    public function adminLogin()
    {
        echo 'adminLogin';
    }
	
	/*
	*
	*	Admin Logout
	*
	*/
    public function adminLogout()
    {
        echo 'adminLogout';
    }
	
	/*
	*
	*	Save Admin's Basic Info
	*
	*/
    public function savePaypalBasicInfo_post()
    {
        echo 'saveadminBasicInfo_post';
    }

	/*
	*
	*	Update Admin's Basic Info
	*
	*/
    public function updatePaypalBasicInfo_post()
    {
        echo 'updateadminBasicInfo_post';
    }
	
	/*
	*
	*	Save Admin's Paypal Details
	*
	*/
	
    public function saveAdminPaypalDetails_post()
    {
         echo 'saveadminPaypalDetails_post';
    }
	
	/*
	*
	*	Update admin's paypal Details
	*
	*/
	
    public function updateAdminPaypalDetails_post()
    {
         echo 'updateadminPaypalDetails_post';
    }
	
	/*
	*
	*	Change Password
	*
	*/
    public function changePasswordAdmin_post()
    {
         echo 'changePasswordAdmin_post';
    }
	
	/*
	*
	*	forgot Password
	*
	*/
    public function forgotPasswordAdmin_post()
    {
         echo 'forgotPasswordAdmin_post';
    }
	

}
