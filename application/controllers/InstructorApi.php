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
class InstructorApi extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->helper('url');
		$this->load->model('InstructorApi_Model'); 
		$this->load->model('Common_Model'); 
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
    public function saveInstructorBasicInfo_post()
    {
		$postArray	 	= $this->post();
		$userId 	=	 $postArray['userId'];
		$dataArray = array(
			'first_name' 	=> $postArray['first_name'],
			'middle_name' 	=> $postArray['middle_name'],
			'last_name' 	=> $postArray['last_name'],
			'phone' 		=> $postArray['phone'],
			'address_1' 	=> $postArray['address_1'],
			'address_2' 	=> $postArray['address_2'],
			'state' 		=> $postArray['state'],
			'country' 		=> $postArray['country'],
			'zip' 			=> $postArray['zip'],
			);
		$this->Common_Model->update('sj_users',$dataArray,array('id'=>$userID));
		$message = [
            'message' => 'Profile Updated Successfully.'
        ];
		$this->set_response($message, REST_Controller::HTTP_OK); // UPDATED (200) being the HTTP response code
         /* code goes here */
    }
	/*
	*
	*	Update Instructor Basic Info
	*
	*/
    public function updateInstructorBasicInfo_post()
    {
         /* code goes here */
    }

	/*
	*
	*	Save Instructor's Credit Card Details
	*
	*/
    public function saveInstructorPaypalDetails_post()
    {
         /* code goes here */
    }

	/*
	*
	*	Update Instructor's Credit Card Details
	*
	*/
    public function updateInstructorPaypalDetails_post()
    {
          /* code goes here */
    }
	
	/*
	*
	*	Verify Instructor's Credit Card Details
	*
	*/
    public function verifyInstructorPaypalDetails_post()
    {
         /* code goes here */
    }
	
	
	
	/*
	*
	*	Get all details for a Instructor
	*
	*/
    public function instructorAllDetails_get()
    {
		$id = $this->get('id');
		 $users = $this->Common_Model->getAll('sj_users',10,0,array('user_role'=>1, 'id'=>$id));
        // If the id parameter doesn't exist return all the users

        $user = NULL;
	
        if (!empty($users))
        {
			
            foreach ($users as $key => $value)
            {
                if (isset($value->id) && $value->id == $id)
                {
                    $user = $value;
                }
            }
        }
	
		
        if (!empty($user))
        {
			
            $this->set_response($user,REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
	
	/*
	*
	*	Get all Experience for Instructor
	*
	*/
    public function getExperienceInstructor_get()
    {
		$id = $this->get('id');
        $result = $this->Common_Model->getAllExperience('sj_instructor_exp_edu',20,0,'type',0, $id);
		if (!empty($result))
        {
			
            $this->set_response($result,REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'No experience found.'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
	/*
	*
	*	Update Experience for Instructor
	*
	*/
    public function updateExperienceInstructor_post()
    {
		if($this->post('rowId') != 0)
		{
			$id = $this->post('rowId');
			$data = array(
			'Name' => $this->post('experience'),
			'start_date' => $this->post('exp_start_date'),
			'end_date' => $this->post('exp_end_date'),
			'certificate' => $this->post('certificate'),
			'certificate_image' => $this->post('certificate_image_name'),
			);
			
			$this->Common_Model->update('sj_instructor_exp_edu',$data,$data,array('id'=>$id));
			$this->db->trans_complete();
			if($this->db->trans_status() === TRUE)
			{
				 $message = [
					'message' => 'Updated Successfully.',
					'status' => true
				];
				$this->set_response($message,REST_Controller::HTTP_OK);
			}
			else
			{
				 $message = [
					'message' => 'Somthing went wrong.',
					'status' => false
				];
				$this->set_response($message,REST_Controller::HTTP_NOT_FOUND);
			}
		}
		else
		{
			$data = array(
				'id' => '',
				'type' => 0,
				'instructor_id' => $this->post('userId'),
				'Name' => $this->post('experience'),
				'start_date' => $this->post('exp_start_date'),
				'end_date' => $this->post('exp_end_date'),
				'certificate' => $this->post('certificate'),
				'certificate_image' => $this->post('certificate_image_name'),
			);
			
			if($this->Common_Model->insert('sj_instructor_exp_edu',$data))
			{
				 $message = [
					'message' => 'Added Successfully.',
					'status' => true
				];
				$this->set_response($message,REST_Controller::HTTP_OK);
			}
			else
			{
				 $message = [
					'message' => 'Somthing went wrong.',
					'status' => false
				];
				$this->set_response($message,REST_Controller::HTTP_NOT_FOUND);
			}
		}
	
    }
	/*
	*
	*	Get all Education for Instructor
	*
	*/
    public function getEducationInstructor_get()
	{
		$id = $this->get('id');
        $result = $this->Common_Model->getAllExperience('sj_instructor_exp_edu',20,0,'type',1, $id);
		if (!empty($result))
        {
			
            $this->set_response($result,REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'No experience found.'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
		
	}
	
	/*
	*
	*	Get all Education for Instructor
	*
	*/
    public function getinstructorPaymentDetails_get()
	{
		$id = $this->get('id');
        $result = $this->Common_Model->getRow('sj_paypal_details',array('instructor_id'=>$id));
		if (!empty($result))
        {
			
            $this->set_response($result,REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'No Details found.'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
		
	}
	
	/*
	*
	*	Update Education for Instructor
	*
	*/
	
    public function updateEducationInstructor_post()
    {
        if($this->post('rowId') != 0)
		{
			$id = $this->post('rowId');
			$data = array(
			'Name' => $this->post('education'),
			'start_date' => $this->post('edu_start_date'),
			'end_date' => $this->post('edu_end_date')
			);
			$this->Common_Model->update('sj_instructor_exp_edu',$data,array('id'=>$id));
			$this->db->trans_complete();
			if($this->db->trans_status() === TRUE)
			{
				 $message = [
					'message' => 'Updated Successfully.',
					'status' => true
				];
				$this->set_response($message,REST_Controller::HTTP_OK);
			}
			else
			{
				 $message = [
					'message' => 'Somthing went wrong.',
					'status' => false
				];
				$this->set_response($message,REST_Controller::HTTP_NOT_FOUND);
			}
		}
		else
		{
			$data = array(
			'id' => '',
			'type' => 1,
			'instructor_id' => $this->post('userId'),
			'Name' => $this->post('education'),
			'start_date' => $this->post('edu_start_date'),
			'end_date' => $this->post('edu_end_date')
			);
			
			if($this->Common_Model->insert('sj_instructor_exp_edu',$data))
			{
				 $message = [
					'message' => 'Added Successfully.',
					'status' => true
				];
				$this->set_response($message,REST_Controller::HTTP_OK);
			}
			else
			{
				 $message = [
					'message' => 'Somthing went wrong.',
					'status' => false
				];
				$this->set_response($message,REST_Controller::HTTP_NOT_FOUND);
			}
		}
    }
	
	/*
	*
	*	Update Education for Instructor
	*
	*/
	
    public function deleteExperienceEducationInstructor_post()
    {
        if($this->post('rowId') != 0)
		{
			$id = $this->post('rowId');
			
			$this->Common_Model->delete('sj_instructor_exp_edu',array('id'=>$id));
			$this->db->trans_complete();
			if($this->db->trans_status() === TRUE)
			{
				 $message = [
					'message' => 'Deleted Successfully.',
					'status' => true
				];
				$this->set_response($message,REST_Controller::HTTP_OK);
			}
			else
			{
				 $message = [
					'message' => 'Somthing went wrong.',
					'status' => false
				];
				$this->set_response($message,REST_Controller::HTTP_NOT_FOUND);
			}
		}
    }
	
	/*
	*
	*	Get all Payment for Instructor by class
	*
	*/
    public function getAllPaymentForInstructor_get()
    {
         /* code goes here */
    }
	
	/*
	*
	*	Get All Classes for an Instructor
	*
	*/
    public function getAllInstructorClasses_get()
    {
        $id = $this->get('id');
        $result = $this->Common_Model->getAllRecords('sj_class',array('instructor_id'=>$id),'id','DESC');
		if (!empty($result))
        {
			
            $this->set_response($result,REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'No Class found.'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
	
	/*
	*
	*	Get All Classes for an Instructor
	*
	*/
    public function viewClass_get()
    {
        $id = $this->get('id');

        $result = $this->Common_Model->getRow('sj_class',array('id'=>$id));
		if (!empty($result))
        {
			
            $this->set_response($result,REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' =>'No Class found.'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
	
	/*
	*
	*	Update profile image URL in database from profile or user activate page
	*
	*/
    public function uploadImage_post()
    {
		
		 $key = $this->post('key');
		 $fileUrl = $this->post('fileUrl');
		 $userId = $this->post('userId');
		 $this->Common_Model->updateUsermeta($key, $fileUrl, $userId);
		 $message = [
            'message' => 'Updated profile image'
        ];

        $this->set_response($message, REST_Controller::HTTP_CREATED);
         /* code goes here */
    }
}
