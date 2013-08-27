
        <div id="content">
        	<div id="book<?=$book['bookID']?>" class="main_product">
				<?=image($book);?>
                <div id="info">
                    <a href="<?=$book['url'];?>"><h2><?=$book['title'];?></h2></a>
                    <p id="description"><?=$book['_desc'];?></p>
                    <div id="price">
                        <?=$dic['price'];?> : <span class="price"><?=$book['price']; ?> <?=$dic['L.E'];?></span>
                    </div><!-- END of price -->
                    <?=makeBtn($book['bookID'],checkExists($book['bookID'],$this->cart->contents()),$dic); ?>
                </div><!-- END of info -->
                <div class="clr"></div>
            </div><!-- END of main_product -->
        	<style type="text/css">
				.main_product{width:850px; float:right; background:#FFF; padding:40px; margin-bottom:60px; border:1px solid #DDD;}
				.main_product img{float:right; width:168px; height:230px; border:1px solid #333;}
				.main_product #info{float:right; width:600px; margin-right:40px;}
				.main_product h2{font-size:18px; color:222; margin-bottom:10px; color:#900;}
				.main_product #description{font-size:12px; color:#555; line-height:20px; font-weight:bold;}
				.main_product .add_to_cart,.main_product .remove_from_cart{top:20px;}
				<?php if($book['language'] != "arabic"): ?>
					.main_product img{float:left;}
					.main_product #info{float:left; margin-left:40px; text-align:left;}
				<?php endif; ?>
			</style>
            
            <div class="clr"></div>
            
            <h5 style="font-size:18px; text-align:center; margin-bottom:20px; color:#3c60a4;"><?=$dic['related_books'];?></h5>
            
            <div id="products" style="width:980px; margin-right:20px;">
            	<?php
					$row = 4; $first = true;
					foreach($r_books as $book):
					
					if($first){echo '<div class="row">';$first = false;}
					else if($row%4 == 0)echo'</div><div class="clr"></div><div class="row">'; ?>
                    <div class="product" id="book<?=$book['bookID'];?>">
                    	<h2><a title="<?=$book['title'];?>" href="#"><?=$book['title'];?></a></h2>
						<?=image($book);?>
                        <span class="price"> <?=$book['price'];?> <?=$dic['L.E'];?></span><br/>
						<?=makeBtn($book['bookID'],array_key_exists($book['bookID'],$this->cart->contents()),$dic); ?>
                    </div><!-- END of .product -->
                <?php $row++; endforeach; ?>
                </div>
                <div class="clr"></div>
            </div><!-- END of products -->
        </div><!-- END of content -->
        