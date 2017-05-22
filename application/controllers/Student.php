<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
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
class Student extends CI_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
		$this->load->helper('url'); 
		$this->load->database(); 
    }
	/*
	*
	*	Student Dashboard
	*
	*/
	 public function dashboard()
    {
		echo 'Student Dashboard';
		$user_session = $this->session->userdata('logged_in');
    }
}
