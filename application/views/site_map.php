<ul id="sitemap">
    <li><a href="<?php echo base_url().'books/arabic';?>"><?=$dic['arabic_books'];?></a></li>
    <li><a href="<?php echo base_url().'books/english';?>"><?=$dic['english_books'];?></a></li>
    <li><a href="<?php echo base_url().'books/french';?>"><?=$dic['french_books'];?></a></li>
    <li><?=$dic['categories'];?> :
    		<ul>
			  <?php foreach($categories as $category){ ?>
              <li><a href="<?php echo base_url().$language.'/'.$category['en']; ?>" target="_self" ><span><?php echo $category[$lan]; ?></span></a></li>
              <?php } ?>
			</ul>
    </li>
    <li><a href="<?php echo base_url().'shopping-cart';?>"><?=$dic['my_cart'];?></a></li>
    <li><a href="<?php echo base_url().'checkout';?>"><?=$dic['checkout'];?></a></li>
    <li><a href="<?php echo base_url().'contact-us';?>"><?=$dic['contact_us'];?></a></li>
</ul>