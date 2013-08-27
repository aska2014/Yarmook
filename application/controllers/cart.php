<?php

class Cart extends CI_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function addtocart(){
		$bookID = (int)$_GET['bookID'];
		if(isset($_GET['bookID'])){
			$this->load->model('books_model');
			$book = $this->books_model->getBook($bookID);
			if($book != FALSE){
				$data = array(
				   'id'      => $bookID,
				   'qty'     => 1,
				   'price'   => $book['price'],
				   'name'    => $book['title'],
				   'url' => $book['url']
				);
				$this->cart->insert($data);
				echo 'is true';
			}
		}else {
			echo 'is false';
		}
		exit();
	}
	
	function removefromcart(){
		if(isset($_GET['bookID'])){
			$data = array(
						'rowid' => $_GET['bookID'],
						'qty' => 0
						);
			$this->cart->update($data);
			echo 'is true';
		}else {
			echo 'is false';
		}
		exit();
	}
	function destroy(){
		$this->cart->destroy();
	}
	
	function edit_quantity(){
		if(isset($_GET['bookID'])){
			$array = $this->cart->contents();
			if($_GET['quantity'] != 0)$price = $array[$_GET['bookID']]['price'] * $_GET['quantity'];
			else $price = 0;
			$data = array(
						'rowid' => $_GET['bookID'],
						'qty' => $_GET['quantity']
						);
			$this->cart->update($data);
			echo currency($price).'<#>'.currency($this->cart->total());
		}else{
			echo 'false';	
		}
		exit();
	}
}