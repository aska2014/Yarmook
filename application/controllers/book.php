<?php

class Book extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('books_model');
		$this->load->model('category_model');
	}
	
	function index($var = ""){
		$var_array = explode('-',$var);
		$bookID = $var_array[count($var_array) -1];
		$this->_setsession($bookID);
		
		$data['categories'] = $this->category_model->getAll();
		$data['lan'] = $this->_currentLan();
		$data['book'] = $this->books_model->getBook($bookID);
		$data['r_books'] = $this->books_model->getRelated($bookID);
		$data['language'] = $data['book']['language']; // Arabic or English or French
		$data['page'] = "book_view";
		$data['title'] = $data['book']['title'];
		$data['page_info'] = array('language'=>$data['book']['language'],'category'=>$data['book']['category']);
		$data['jquery_plugins'] = array();
		$data['dic'] = $this->_dictionary($data['lan']);
		
		// Load main view
		$this->load->view('main_view',$data);
	}
	
	
	/////////////////////////////////////// Private functions
	
	function _setsession($bookID = 1){
		if(!$this->session->userdata('books_visited'))
			$books_string = $bookID;
		else
			$books_string = $this->session->userdata('books_visited').'<=>'.$bookID;
		$this->session->set_userdata('books_visited',$books_string);
	}
	
	private function _currentLan()
	{
		 $lan = $this->session->userdata('lan');
		 if(!$lan)return "ar";
		 else return $lan;
	}
}