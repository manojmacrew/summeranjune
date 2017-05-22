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
class ClassApi_Model extends CI_Model {

    public function __construct() {
		parent::__construct();
	}
	
	/*
	*
	*	Add Class by Instructor
	*
	*/
    public function addClass()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Update Class by Instructor
	*
	*/
    public function updateClass()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Get All Classes for an Instructor
	*
	*/
    public function deleteClassByInstructor()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Search class by student
	*
	*/
    public function searchClassByStudent()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Join a class by Student
	*
	*/
    public function joinClassByStudent()
    {
         echo 'joinClass_post';
    }
	/*
	*
	*	Cancel a class by Instructor
	*
	*/
    public function cancelClassByInstructor()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Cancel a class by Student
	*
	*/
    public function cancelClassByStudent()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Start Class by an Instructor
	*
	*/
    public function startClassByInstructor()
    {
       /* code goes here */
    }
	
	/*
	*
	*	End Class by an Instructor
	*
	*/
    public function endClassByInstructor()
    {
         /* code goes here */
    }

	/*
	*
	*	Set Payment from student after complete class in popup
	*
	*/
    public function setClassPaymentByInstructor()
    {
         /* code goes here */
    }
}
