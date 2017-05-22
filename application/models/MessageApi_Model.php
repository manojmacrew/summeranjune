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
class MessageApi_Model extends CI_Model {

    public function __construct() {
		parent::__construct();
	}
	
		
	/*
	*
	*	Send new message to other user
	*
	*/
    public function sendMessage)
    {
         /* code goes here */
    }
	/*
	*
	*	reply for a  message  to other user
	*
	*/
    public function replyMessage()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Get all messages or one message data
	*
	*/
    public function getAllMessages()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Get all Unread messages
	*
	*/
    public function getAllUnreadMessages()
    {
         /* code goes here */
    }
	/*
	*
	*	Get all thread messages for message
	*
	*/
    public function getAllthreadMessages()
    {
         /* code goes here */
    }
	/*
	*
	*	Change Unread messages to read
	*
	*/
    public function changeMessagesStatus()
    {
        /* code goes here */
    }
	
	/*
	*
	*	Student delete a message from thread
	*
	*/
    public function deleteMessage()
    {
         /* code goes here */
    }
}
