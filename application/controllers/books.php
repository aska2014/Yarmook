<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('books_model');
		$this->load->model('category_model');
	}
	
	// Situations:
	//	1) books ------------- remaped to books/arabic
	//  2) books/language/
	//  3) books/language/page2
	//  4) books/language/category
	//  5) books/language/category/page2
	//  6) books/search/keyword
	
	function index($language = "",$category = "", $page = "")
	{
		if($this->uri->segment(2) == "search" && isset($_GET['keyword']))
		{
			$this->search();
		}
		else
		{
			if($this->uri->segment(2) == "language")
			{
				$this->language($category); // third segment
				$category = "";
			}
			
			if(!in_array($language,array("arabic","english","french"))) // remap --> books to books/arabic
				$language = "arabic";
			
			if(strpos($category,"page") !== false) // books/language/page
			{
				$page = str_replace("page","",$category); // page exists
				$category = "";
			}
			else if($category == "") // books/language
			{
				$page = 1;
			}
			else{} // books/language/category || books/language/category/page
			
			
			if(!is_numeric($page)) // double check for page
				$page = 1;
				
			// Variables to be used in the view
			$data['categories'] = $this->category_model->getAll();
			$data['m_books'] = $this->books_model->getBooks($language,$category,$page);
			$data['s_books'] = $this->books_model->getSlider($language);
			$data['b_book'] = $this->books_model->getBestBook();
			$data['lan'] = $this->_currentLan(); // Arabic or English
			$data['language'] = $language; // Arabic or English or French
			$data['page'] = "books_view";
			$data['title'] = $this->_getTitle($data['lan'],$language);
			$data['page_info'] = array('language'=>$language,'category'=>$category);
			$data['jquery_plugins'] = array('slider');
			$data['dic'] = $this->_dictionary($data['lan']);
		
			$this->load->view('main_view',$data);
		}
	}
	
	function search()
	{
		// Variables to be used in the view
		$language = "arabic"; // can be better by tracking visitors
		$data['categories'] = $this->category_model->getAll();
		$data['m_books'] = $this->books_model->getSearch($_GET['keyword']);
		$data['s_books'] = false;
		$data['b_book'] = $this->books_model->getBestBook();
		$data['lan'] = $this->_currentLan();
		$data['language'] = $language; // Arabic or English or French
		$data['page'] = "books_view";
		if($data['lan'] == "arabic")
			$data['title'] = $_GET['keyword']." | ".count($data['m_books'])." كتب وجدت";
		else
			$data['title'] = $_GET['keyword']." | ".count($data['m_books'])." books found";
		$data['page_info'] = array('language'=>$language,'category'=>"");
		$data['jquery_plugins'] = array('slider');
		$data['dic'] = $this->_dictionary($data['lan']);
		$data['nopages'] = true;
		
		// We have m_books, s_books, lan, page, title, page_info[language,category]
		$this->load->view('main_view',$data);
	}
	
	function language($language = "ar")
	{
		if($language != "ar" && $language != "en")
			$this->session->set_userdata('lan','ar');
		else
			$this->session->set_userdata('lan',$language);
		
		header('location:'.$_SERVER['HTTP_REFERER']);
	}
	
	/////////////////////////////////////////////// Private functions ////////////////////////////////////////////////////////////
 	
	private function _currentLan()
	{
		 $lan = $this->session->userdata('lan');
		 if(!$lan)return "ar";
		 else return $lan;
	}
	
	private function _getTitle($lan,$language)
	{
		if($lan == "ar")
		{
			if($language == "arabic")
				return "كتب عربية | مكتبة اليرموك";
			else if($language == "english")
				return "كتب أجنبية | مكتبة اليرموك";
			else if($language == "french")
				return "كتب فرنسية | مكتبة اليرموك";
		}
		else if($lan == "en")
		{
			if($language == "arabic")
				return "Arabic books | bookstore ElYarmook";
			else if($language == "english")
				return "English books | bookstore ElYarmook";
			else if($language == "french")
				return "French books | bookstore ElYarmook";
		}
		return "404 page";
	}
	
}