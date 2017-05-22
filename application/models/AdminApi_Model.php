<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
class AdminApi_Model extends CI_Model {

    public function __construct() {
		parent::__construct();
	}
	/*
	*
	*	Admin Login
	*
	*/
    public function adminLogin()
    {
       /* code goes here */
    }
	
	/*
	*
	*	Admin Logout
	*
	*/
    public function adminLogout()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Save Admin's Basic Info
	*
	*/
    public function savePaypalBasicInfo()
    {
       /* code goes here */
    }

	/*
	*
	*	Update Admin's Basic Info
	*
	*/
    public function updatePaypalBasicInfo()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Save Admin's Paypal Details
	*
	*/
	
    public function saveAdminPaypalDetails()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Update admin's paypal Details
	*
	*/
	
    public function updateAdminPaypalDetails()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Change Password
	*
	*/
    public function changePasswordAdmin()
    {
         /* code goes here */
    }
	
	/*
	*
	*	forgot Password
	*
	*/
    public function forgotPasswordAdmin()
    {
        /* code goes here */
    }

}
