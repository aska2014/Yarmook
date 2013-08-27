
        <!-- SLIDER -->
        <?php if($s_books){ ?>
        <div id="one" class="accordion">
            <ol>
                <?php foreach($s_books as $book): ?>
                <li>
                    <h2><span><?=$book['title'];?></span></h2>
                    <div>
                        <figure>
                			<?=image($book,"height='300'");?>
                            <figcaption>Price : <?=$book['price'];?> LE</figcaption>
                        </figure>
                    </div>
                </li>
                <?php endforeach; ?>
            </ol>
            <noscript>
                <p><font color="#CC3300">Please enable JavaScript to get the full experience.</font></p>
            </noscript>
        </div>
        <?php } ?>
        <!-- END OF SLIDER -->
            
        <div class="clr"></div>
        
        <div id="content">
        	<div id="right_panel">
            	<div id="categories">
                    <div id="title"><?php if($lan == "en")echo $dic['categories']; ?></div>
                    <ul>
                    	<?php $temp = $categories; foreach($temp as $category){ ?>
	                        <li><a href="<?=base_url()?>books/<?=$language.'/'.$category['en'];?>"><h3><?=$category[$lan];?></h3></a></li>
						<?php } ?>
                    </ul>
                </div>
                
                <div class="best_book" id="book<?=$b_book['bookID'];?>">
                    <div id="title"><?php if($lan == "en")echo $dic['best_book']; ?></div>
                	<?=image($b_book);?>
                    <h2><a href="<?=base_url().$b_book['url']; ?>"><?=$b_book['title'];?></a></h2>
                    <span class="price"><?=$b_book['price'];?> <?=$dic['L.E'];?></span><br/>
                    <?=makeBtn($b_book['bookID'],checkExists($b_book['bookID'],$this->cart->contents()),$dic); ?>
                </div>
            </div>
            <div id="products">
            <?php if($m_books){ ?>
            	<?php
					$row = 3; $first = true;
					foreach($m_books as $book):
					
					if($first){echo '<div class="row">';$first = false;}
					else if($row%3 == 0)echo'</div><div class="clr"></div><div class="row">'; ?>
                    <div class="product" id="book<?=$b_book['bookID'];?>">
                    	<h2><a title="<?=$book['title'];?>" href="<?=base_url().'book/'.$book['url']?>"><?=$book['title'];?></a></h2>
						<?=image($book);?>
                        <span class="price"> <?=$book['price'];?> <?=$dic['L.E'];?></span><br/>
						<?=makeBtn($book['bookID'],array_key_exists($book['bookID'],$this->cart->contents()),$dic); ?>
                    </div><!-- END of .product -->
                <?php $row++; endforeach; ?>
                </div><div class="clr"></div>
                
                <!-- TODO:: MAKE PAGES -->
                <?php if(!isset($nopages)){ ?>
                <div id="pages">
                	<div class="page">
                    	<a href="#">1</a>
                    </div>
                </div><!-- END of pages -->
                <?php } ?>
            <?php }
			else {
				if($lan == "en")
            		echo "<div style='text-align:left; margin:50px;'>There's no books in this section, the sitemap might help you:";
				else
					echo "<div style='text-align:right; margin:50px;'>لا يوجد كتب فى هذا القسم , ربما تساعدك خريطة الموقع :";
				$this->load->view('site_map');
			
			} ?>
            </div><!-- END of products -->
        </div><!-- END of content -->