<?php

class Messages_model extends CI_Model{
	function __construct()
	{
		parent::__construct();
	}
	
	function send($send)
	{
		$booksID = array();
		foreach($this->cart->contents() as $book)
		{
			array_push($booksID,$book['id']);
		}
		$booksID = implode(",",$booksID);
		if(function_exists('date_default_timezone_set')) date_default_timezone_set('Egypt');
		$sqlNow = date('Y-m-d H:i:s');
		$query = $this->db->query("INSERT INTO k_messages
												(full_name,email,mobile_no,method,state,city,street_address,booksID,sign_date)
												VALUES(?,?,?,?,?,?,?,?,?)"
												,array($send["full_name"],$send["email"],$send["mobile_no"],$send['method']
												,$send['state'],$send['city'],$send['street_address'],$booksID,$sqlNow));
	}
}