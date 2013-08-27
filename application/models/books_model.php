<?php

class Books_model extends CI_Model{
	
    function __construct()
    {
        parent::__construct();
    }
	
	var $no = 9;
	
	function getBooks($language,$category,$page)
	{
		// Checking to get where statement
		if($category == "")
			$Where = "language = '".$language."'";
		else 
			$Where = "language = '".$language."' and category = '".$category."'";
		
		$start = ($page - 1) * 9; 
		
		// query
		$query = $this->db->query("SELECT bookID,title,price,url FROM k_books 
												  WHERE ".$Where."
												  ORDER by bookID DESC 
												  LIMIT ".$start.",".$this->no."");
		if($query->num_rows() == 0)return false;
		else return $query->result_array();
	}
	
	function getSlider($language) // depend on rate
	{
		$query = $this->db->query("SELECT bookID,title,price,url FROM k_books
												  WHERE language = '".$language."'
												  ORDER by rate LIMIT 7");
		if($query->num_rows() == 0)return false;
		else return $query->result_array();
	}
	
	function getSearch($keyword = "nothing")
	{
		if($keyword == "")
			getBooks("arabic","",1);
		else
		{
			$query = $this->db->query("SELECT bookID,title,price,url FROM k_books
													  WHERE title like ?
													  ORDER by bookID DESC",array('%'.$keyword.'%'));
			if($query->num_rows() == 0)return false;
			else return $query->result_array();
		}
	}
	
	function getBook($bookID = 0)
	{
		$query = $this->db->query("SELECT * FROM k_books
												  WHERE bookID = ?
												  ORDER by bookID DESC",$bookID);
		if($query->num_rows() == 0)return false;
		else return $query->row_array(); // returns just one row
	}
	
	function getBestBook()
	{
		$query = $this->db->query("SELECT bookID,title,price,url FROM k_books
												  ORDER by rate DESC");
		if($query->num_rows() == 0)return false;
		else return $query->row_array(); // returns just one row
	}
	
	function getRelated($bookID = 0)
	{
		$query = $this->db->query("SELECT bookID,title,price,url FROM k_books
												WHERE category = (SELECT category FROM k_books WHERE bookID = ?)
												OR language = (SELECT language FROM k_books WHERE bookID = ?)
												ORDER BY category,language DESC LIMIT 15",array($bookID,$bookID));
		if($query->num_rows() == 0)return false;
		else return $query->result_array(); // returns just one row
	}
	
}