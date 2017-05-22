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
class ReviewApi extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->helper('url');
		$this->load->model('ReviewApi_Model'); 
    }
	
	/*
	*
	*	Add a review for Instructure by Student
	*
	*/
    public function addReviewByStudent_post()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Add a review for Student by Instructure
	*
	*/
    public function addReviewByInstructure_post()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Get all review for Instructure 
	*
	*/
    public function getAllReviews_get()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Get average reviews for an user
	*
	*/
    public function getAverageReviews_get()
    {
          /* code goes here */
    }
}
