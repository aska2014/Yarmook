// JavaScript Document
$(document).ready(function(){
	if(lan == "ar")
	{
		$(".roll_over").hover(
			function(){
			  $(this).animate({"bottom": "+=10px"}, "fast");
			},
			function(){
			  $(this).animate({"bottom": "-=10px"}, "fast");
			}
		);
	}
});

function addCart(book_id,added){
	$("#book"+book_id).fadeTo(100,'0.2');
	if(added){
		$("#addtocart_btn" + book_id).attr("disabled", "disabled");
		var dataString = "bookID=" + book_id;
		$.ajax({
			cache:false,
			url: base_url + "cart/addtocart/" ,
			type:"GET",
			data:dataString,
			success:function (data){
				$("#addtocart_btn" + book_id).removeAttr("disabled", "disabled");
				if(data.indexOf("true") > 0){
					var cssObj = {
					  'background-color' : '#333',
					};
					if(lan == "ar")
						$("#addtocart_btn" + book_id).html('أخرج من السلة');
					else
						$("#addtocart_btn" + book_id).html('Remove from Cart');
					$("#addtocart_btn" + book_id).css(cssObj);
					$("#addtocart_btn" + book_id).attr("id", "removefromcart_btn"+book_id);
					var product_count = $(".product-count").html();
					$(".product-count").html(parseInt(product_count)+1);
				}
				$("#book"+book_id).fadeTo(100,'1');
			},
			error: function() {
				$("#add_loading").remove();
				$("#addtocart_btn" + book_id).removeAttr("disabled", "disabled");
				$("#book"+book_id).fadeTo(100,'1');
			}
		});
	}else{
		$("#removefromcart_btn" + book_id).attr("disabled", "disabled");
		var dataString = "bookID=" + book_id;
		$.ajax({
			cache:false,
			url:base_url + "cart/removefromcart/" ,
			type:"GET",
			data:dataString,
			success:function (data){
				$("#removefromcart_btn" + book_id).removeAttr("disabled", "disabled");
				if(data.indexOf("true") > 0){
					var cssObj = {
					  'background-color' : '#E52F36',
					};
					if(lan == "ar")
						$("#removefromcart_btn" + book_id).html('أضف للسلة');
					else
						$("#removefromcart_btn" + book_id).html('Add to Cart');
					$("#removefromcart_btn" + book_id).css(cssObj);
					$("#removefromcart_btn" + book_id).attr("id", "addtocart_btn"+book_id);
					var product_count = $(".product-count").html();
					$(".product-count").html(parseInt(product_count)-1);
				}else{
					$("#removefromcart_btn" + book_id).removeAttr("disabled", "disabled");
				}
				$("#book"+book_id).fadeTo(100,'1');
			},
			error: function() {
				$("#removefromcart_btn" + book_id).removeAttr("disabled", "disabled");
				$("#book"+book_id).fadeTo(100,'1');
			}
		});
	}
	return false;
}


function edit_quantity(book_id,quantity){
	$("#trshopping"+book_id).fadeTo(100,'0.2');
	var dataString = "bookID=" + book_id + "&quantity=" + quantity;
	$.ajax({
		cache:false,
		url:base_url + 'cart/edit_quantity/' ,
		type:"GET",
		data:dataString,
		success:function (data){
			$("#trshopping"+book_id).fadeTo(100,'1');
			if(!(data.indexOf("false") > 0)){
				var prices_array = data.split('<#>');
				if(quantity <= 0)$("#trshopping"+book_id).hide();
				$("#booksTotal").html(prices_array[1]);
			}
		},
		error: function() {
		}
	});
}