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
class StudentApi extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->helper('url');
		$this->load->model('StudentApi_Model'); 
    }
	
	/*
	*
	*	Student Login
	*
	*/
    public function studentLogin()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Student Signup
	*
	*/
    public function studentSignup()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Save Student Basic Info
	*
	*/
    public function saveStudentBasicInfo_post()
    {
         /* code goes here */
    }

	/*
	*
	*	Update Student Basic Info
	*
	*/
    public function updateStudentBasicInfo_post()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Save Student's Credit Card Details
	*
	*/
    public function saveStudentCreditCardDetails_post()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Update Student's Credit Card Details
	*
	*/
    public function updateStudentCreditCardDetails_post()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Save Student's billing address Details
	*
	*/
    public function saveStudentBillingAddress_post()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Update Student's billing address Details
	*
	*/
    public function updateStudentBillingAddress_post()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Get all details for a Student
	*
	*/
    public function studentAllDetails_get()
    {
          /* code goes here */
    }
	
	/*
	*
	*	Get All Classes for an Student
	*
	*/
    public function getAllStudentClasses_get()
    {
         /* code goes here */
    }
}
