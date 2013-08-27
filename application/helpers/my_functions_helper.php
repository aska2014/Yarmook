<?php

function makeBtn($bookID = 0,$added = false,$dic)
{
	if(!$added) // not in cart
	{
		return '<a class="add_to_cart" id="addtocart_btn'.$bookID.'" href="javascript:void(0);" onclick="addCart('.$bookID.',true);">'.$dic['add_to_cart'].'</a>';
	}
	else // in cart
	{
		return '<a class="remove_from_cart" id="removefromcart_btn'.$bookID.'" href="javascript:void(0);" onclick="addCart('.$bookID.',false);">'.$dic['remove_from_cart'].'</a>';
	}
}

function image($book,$extra = "")
{
	return '<a href="'.base_url().$book['url'].'">
				<img src = "'.base_url().'albums/books/book'.$book['bookID'].'.jpg" alt="'.$book['title'].'" '.$extra.' />
			  </a>';
}

function checkExists($id, $array)
{
	foreach($array as $sub_array)
	{
		if($id == $sub_array['rowid'])
			return true;
	}
	return false;
}

function currency($price = 0){
	return $price;
}
?>