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
class ReviewApi_Model extends CI_Model {

    public function __construct() {
		parent::__construct();
	}
	
	/*
	*
	*	Add a review for Instructure by Student
	*
	*/
    public function addReviewByStudent()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Add a review for Student by Instructure
	*
	*/
    public function addReviewByInstructure()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Get all review for Instructure 
	*
	*/
    public function getAllReviews()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Get average reviews for an user
	*
	*/
    public function getAverageReviews()
    {
         /* code goes here */
    }
}
