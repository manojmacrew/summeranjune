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
class ClassApi extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
		
		$this->load->library('REST_Controller');
        $this->load->helper('url');
		$this->load->model('ClassApi_Model'); 
		$this->load->model('Common_Model'); 
    }
	/*
	*
	*	Add Class by Instructor
	*
	*/
    public function addClass_post()
    {
        $postArray	 	= $this->post();
		
		$dataArray = array(
			'instructor_id' 				=> $postArray['userId'],
			'class_name' 					=> $postArray['class_name'],
			'class_desc' 					=> $postArray['about_class'],
			'class_hours_length' 			=> $postArray['hours_length'],
			'class_min_length' 				=> $postArray['minutes_length'],
			'class_instruction' 			=> $postArray['special_instrauctions'],
			'complexity' 					=> $postArray['complexity'],
			'class_limit' 					=> 1,
			'class_date' 					=> $postArray['date_of_class'],
			'class_time' 					=> $postArray['time_hours'].":".$postArray['time_minutes'],
			'class_time_zone' 				=> $postArray['class_time_zone'],
			'class_cost' 					=> $postArray['cost'],
			'class_cancellation_policy' 	=> $postArray['cancellation_policy'],
			'class_cancellation_cost' 		=> $postArray['cancellation_cost'],
			'allow_message' 				=> $postArray['allow_msg'],
			'allow_bonus' 					=> $postArray['allow_bonus'],
			'status' 						=> 1,
			'date_added' 					=> date('Y-m-d H:i:s')
			);
		$this->Common_Model->insert('sj_class',$dataArray);
		$message = [
            'message' => 'New class added successfully.'
        ];
		$this->set_response($message, REST_Controller::HTTP_OK); // UPDATED (200) being the HTTP response code
    }
	
	/*
	*
	*	Update Class by Instructor
	*
	*/
    public function updateClass_post()
    {
          /* code goes here */
    }
	

	/*
	*
	*	Delete a by an Instructor
	*
	*/
    public function deleteClassByInstructor_delete()
    {
          /* code goes here */
    }
	
	/*
	*
	*	Search class by Student
	*
	*/
    public function searchClassByStudent_post()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Join a class by Student
	*
	*/
    public function joinClassByStudent_post()
    {
         /* code goes here */
    }
	/*
	*
	*	Cancel a class by Instructor
	*
	*/
    public function cancelClassByInstructor_post()
    {
         /* code goes here */
    }
	/*
	*
	*	Cancel a class by Student
	*
	*/
    public function cancelClassByStudent_post()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Start Class by an Instructor
	*
	*/
    public function startClassByInstructor_post()
    {
         /* code goes here */
    }
	
	/*
	*
	*	End Class by an Instructor
	*
	*/
    public function endClassByInstructor_post()
    {
          /* code goes here */
    }
	
	/*
	*
	*	Set Payment after complete class by Instructor
	*
	*/
    public function setClassPaymentByInstructor_post()
    {
         /* code goes here */
    }

}
