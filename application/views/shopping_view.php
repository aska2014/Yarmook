
        <div id="content">
        
			<?php if($this->cart->total_items() > 0){ ?>
 		       <img <?php if($lan == "ar") echo 'style="float:right; margin:0px 5px;"'; else echo 'style="float:left; margin:0px 5px;"'; ?> src="<?=base_url();?>public/style/images/cart-bg.gif" /><div class="niceTitle"><?=$dic['your_shopping_cart'];?> : </div><a <?php if($lan == "ar")echo 'style="cursor:pointer; float:left; padding:10px; background:#E52F36; color:#FFF;"';else echo 'style="cursor:pointer; float:right; padding:10px; background:#E52F36; color:#FFF;"';?>><?=$dic['checkout'];?></a>
				<div class="clr"></div>

                <style type="text/css">
                    #containerTable td,th{
                        width:25%;
                        text-align:center; font-size:13px;
						padding-bottom:15px;
                    }
					#containerTable{background:#FFF;}
					#containerTable th{color:#333;}
					.productTotal{width:920px; color:#333; font-size:18px; padding-left:60px; text-align:left; background:#FFF; border-top:1px solid #DDD; padding-top:20px; padding-bottom:20px;}
					.productName,.productRemove{color:#F00;}
                </style>
                    <table id="containerTable" width="100%" <?php if($lan == "ar") echo 'dir="rtl"'; ?>>
                    <tr>
                        <th style="padding-bottom:10px;"><?=$dic['name'];?></th>
                        <th><?=$dic['price']?></th>
                        <th><?=$dic['quantity'];?></th>
                        <th><?=$dic['remove_from_cart'];?></th>
                    </tr>
                    <?php
                     foreach($this->cart->contents() as $items): ?>
                    <tr id="trshopping<?php echo $items['rowid']; ?>">
                        <td class="productName"><a class="product_name" title="<?php echo $items['name']; ?>" href="<?php echo $items['url']; ?>"><?php echo $items['name']; ?></a></td>
                        <td class="productPrice"><?=$items['price']; ?></td>
                        <td class="productQuantity"><select onchange="edit_quantity(<?php echo $items['rowid']; ?>,this.value)";>
                                                                  <?php for($i = 1;$i < 10; $i++){ 
                                                                  if($i == $items['qty']){
                                                                  ?>
                                                                    <option value="<?php echo $i; ?>" selected="selected"><?php echo $i; ?></option>
                                                                  <?php }else{ ?>
                                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                  <?php }} ?>
                                                                </select></td>
                        <td class="productRemove"><A HREF="nojavascripthere.html" onClick="edit_quantity(<?php echo $items['rowid']; ?>,0); return false">Remove</a></td>
                    </tr>
                    <?php endforeach; ?>
                    </table>
                    
                    <div class="productTotal"><font color="#00F"><?=$dic['total']?></font> = <span id="booksTotal"><?=$this->cart->total()?></span></div>
        <?php
          }
          else
          { // IF is empty
		  	  if($lan == "en")
              	echo '<div style="text-align:left">There is no books in your shopping cart , Go to <a href="'.base_url().'books"> books home </a><br /><br />';
		      else
			  	echo '<div style="text-align:right">لا يوجد كتب لديك فى سلة المشتريات , اذهب إلى <a href="'.base_url().'books">الصفحة الرئيسية</a>';
				
              $this->load->view('site_map');
              echo '<br /><br /></div>';
          } ?>
        </div><!-- END of content -->