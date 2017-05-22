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
class InstructorApi_Model extends CI_Model {

    public function __construct() {
		parent::__construct();
	}
	
	
	/*
	*
	*	Student Login
	*
	*/
	
    public function instructorLogin()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Student Signup
	*
	*/
	
    public function instructorSignup()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Save Instructor Basic Info
	*
	*/
    public function saveInstructorBasicInfo()
    {
       /* code goes here */
    }
	/*
	*
	*	Update Instructor Basic Info
	*
	*/
    public function updateInstructorBasicInfo()
    {
        /* code goes here */
    }

	/*
	*
	*	Save Instructor's Credit Card Details
	*
	*/
	
    public function saveInstructorPaypalDetails()
    {
         /* code goes here */
    }

	/*
	*
	*	Update Instructor's Credit Card Details
	*
	*/
	
    public function updateInstructorPaypalDetails()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Verify Instructor's Credit Card Details
	*
	*/
    public function verifyInstructorPaypalDetails()
    {
         echo 'verifyInstructorPaypalDetails_post';
    }
	
	/*
	*
	*	Get all details for a Instructor
	*
	*/
    public function instructorAllDetails()
    {
         /* code goes here */
    }

	/*
	*
	*	Get all Payment for Instructor by class
	*
	*/
    public function getAllPaymentForInstructor()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Get All Classes for an Instructor
	*
	*/
    public function getAllInstructorClasses()
    {
         /* code goes here */
    }
}
