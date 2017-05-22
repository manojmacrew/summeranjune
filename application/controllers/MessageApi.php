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
class MessageApi extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->helper('url');
		$this->load->model('MessageApi_Model'); 
    }
		
	/*
	*
	*	Send new message to other user
	*
	*/
    public function sendMessage_post()
    {
         /* code goes here */
    }
	/*
	*
	*	reply for a  message  to other user
	*
	*/
    public function replyMessage_post()
    {
          /* code goes here */
    }
	
	/*
	*
	*	Get all messages or one message data
	*
	*/
    public function getAllMessages_get()
    {
          /* code goes here */
    }
	
	/*
	*
	*	Get all Unread messages
	*
	*/
    public function getAllUnreadMessages_get()
    {
         /* code goes here */
    }
	/*
	*
	*	Get all thread messages for message
	*
	*/
    public function getAllthreadMessages_get()
    {
         /* code goes here */
    }
	/*
	*
	*	Change Unread messages to read
	*
	*/
    public function changeMessagesStatus_post()
    {
          /* code goes here */
    }
	
	/*
	*
	*	Student delete a message from thread
	*
	*/
    public function deleteMessage_delete()
    {
         /* code goes here */
    }
	
}
