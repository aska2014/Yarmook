<?php

class Checkout extends CI_Controller{
	var $error_array = array();
	var $success = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
	}
	
	function index()
	{
		// Main variables
		$data['categories'] = $this->category_model->getAll();
		$data['lan'] = $this->_currentLan(); // Arabic or English
		$data['page'] = "checkout_view";
		$data['title'] = "Bookstore | Checkout";
		$data['jquery_plugins'] = array('checkout');
		$data['language'] = "arabic";
		$data['dic'] = $this->_dictionary($data['lan']);
		
		//Checkout vars
		$data['success'] = $this->success;
		$data['errors'] = $this->error_array;
		$this->load->view('main_view',$data);
	}
	
	function send()
	{
		$this->load->model('messages_model');
		if(isset($_POST['full_name']))
		{
			$errors = array();
			$name_pattern = "/^([a-zA-Z ])*$/";
			$email_pattern = '/^[^@\s<&>]+@([-a-z0-9]+\.)+[a-z]{2,}$/i';
			$mobile_pattern = "/^([0-9 \(\)\+-])*$/";
			if(!preg_match($name_pattern,$_POST['full_name']))array_push($errors,"Entered name is not valid");
			if(!preg_match($email_pattern,$_POST['email']))array_push($errors,"Entered email is not valid");
			if(!preg_match($mobile_pattern,$_POST['mobile_no']))array_push($errors,"Entered mobile no. is not valid");
			if($_POST['method'] != "0" && $_POST['method'] != "1")array_push($errors,"Entered mobile no. is not valid");
			if(!preg_match($name_pattern,$_POST['city']))array_push($errors,"Entered city is not valid");
			if(!preg_match($name_pattern,$_POST['state']))array_push($errors,"Entered state is not valid");
			
			if(empty($errors))
			{
				$this->messages_model->send($_POST);
				if($this->_currentLan() == "ar")
					$this->success = array("لقد تم إرسال طلبك بنجاح");
				else
					$this->success = array("Your request has been sent successfully");
			}
			$this->error_array = $errors;
		}
		$this->index();
	}
	private function _currentLan()
	{
		 $lan = $this->session->userdata('lan');
		 if(!$lan)return "ar";
		 else return $lan;
	}
}