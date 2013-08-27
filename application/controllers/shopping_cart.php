<?php

class Shopping_cart extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('category_model');
	}
	
	function index(){
		// View variables
		$data['categories'] = $this->category_model->getAll();
		$data['lan'] = $this->_currentLan(); // Arabic or English
		$data['page'] = "shopping_view";
		$data['title'] = "Bookstore | Shopping cart";
		$data['jquery_plugins'] = array();
		$data['language'] = "arabic";
		$data['dic'] = $this->_dictionary($data['lan']);
		
		$this->load->view('main_view',$data);
	}
	
	private function _currentLan()
	{
		 $lan = $this->session->userdata('lan');
		 if(!$lan)return "ar";
		 else return $lan;
	}
	
}

?>