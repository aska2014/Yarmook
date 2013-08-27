<?php

class Category_model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getAll()
	{
		$query_str = "SELECT * FROM
							k_categories ";
		$query = $this->db->query($query_str);
		return $query->result_array();
	}
	
}