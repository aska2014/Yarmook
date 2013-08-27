<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- TODO:: MAKE keywords w description -->
<title><?=$title?></title>
<?php if($lan == "ar"){ ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/style/style_ar.css" media="screen" />
<?php }else if($lan == "en"){ ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>public/style/style_en.css" media="screen" />
<?php } ?>
</head>

<body <?php if($lan == "ar")echo 'dir="rtl"'; ?>>

<div id="Container">
	<div id="header">
    	<div id="top_bg"></div>
    	<div id="top">
            <div id="menu">
            	<?php if($lan == "ar"){ ?>
                    <a href="<?=base_url().'books/arabic';?>"><div class="roll_over" id="m_arabic"></div></a>
                    <a href="<?=base_url().'books/english';?>"><div class="roll_over" id="m_english"></div></a>
                    <a href="<?=base_url().'books/french';?>"><div class="roll_over" id="m_french"></div></a>
                    <a href="<?=base_url().'contact-us';?>"><div class="roll_over" id="m_contact"></div></a>
            	<?php }else if($lan == "en"){ ?>
                    <a class="menu" href="<?=base_url().'books/arabic';?>">Arabic books</a>
                    <a class="menu" href="<?=base_url().'books/english';?>">English books</a>
                    <a class="menu" href="<?=base_url().'books/french';?>">French books</a>
                    <a class="menu" href="<?=base_url().'contact-us';?>">Contact us</a>
				<?php } ?>
                <div id="basket">
                    <a href="<?=base_url().'shopping-cart';?>"><?=$dic['my_cart']?></a>
                      &nbsp; | &nbsp;
                    <a href="<?=base_url().'checkout';?>" style="color:#F60"><?=$dic['checkout'];?></a>
                </div><!-- END of basket -->
                <div id="shopping">
                	<div>
                        <span><?=$dic['books'];?></span>
                        <a href="<?=base_url().'shopping-cart';?>" class="product-count" style="font-size:24px;"><?php echo $this->cart->total_items(); ?></a>
                        <div id="shopping_icon"></div>
                    </div>
                </div><!-- END of shopping -->
            </div><!-- END of menu -->
        </div><!-- END of top -->
        
        <div class="clr"></div>
        
        <div id="bottom">
        	<div id="logo">
            </div>
        	<div id="languages">
            	<A href="<?=base_url().'books/language/ar';?>"><div id="arabic"></div></A>
                <A href="<?=base_url().'books/language/en';?>"><div id="english"></div></A>
            </div>
            <div id="search">
            	<form action="<?=base_url().'books/search';?>" enctype="multipart/form-data" method="get">
                	<input type="text" class="txt" onblur="if(this.value == '')this.value = '<?=$dic['search_txt'];?>'" onfocus="if(this.value == '<?=$dic['search_txt'];?>')this.value = '';" value="<?=$dic['search_txt'];?>" name="keyword" id="keyword" />
                    <input type="submit" class="sbmt" value="<?=$dic['search'];?>" />
                </form>
            </div>
        </div><!-- END of bottom -->
        
    </div><!-- END of header -->
	<div class="clr"></div>
    <div id="body">
    
		<?php $this->load->view($page); ?>
		
      </div><!-- END of body -->
    
    <div class="clr"></div>
    
</div>
 
<div id="footer_container">
    <div id="footer">
        <div id="right_footer">
			<h4><?=$dic['categories'];?></h4>
            <h2>
            <?php foreach($categories as $category): ?>
            		<a href="<?=base_url().'books/'.$language.'/'.$category['en'];?>"><?=$category[$lan] ?></a> | 
			<?php endforeach; ?>
                    </h2><!-- EVERY category in different link -->
        </div>
        <div id="middle_footer">
        	<div id="f_menu">
            	<a href="<?=base_url().'books/arabic';?>"><?=$dic['arabic_books'];?></a> | <a href="<?=base_url().'books/english';?>"><?=$dic['english_books'];?></a> | <a href="<?=base_url().'books/french';?>"><?=$dic['french_books'];?></a> | <a href="<?=base_url().'contact-us';?>"><?=$dic['contact_us'];?></a>
            </div>
            <div id="copyright">
            	<?=$dic['copyright'];?>
            </div>
        </div>
        <?php if($lan == "ar"){ ?>
    	<div id="left_footer">
        </div>
        <?php } ?>
    </div><!-- END of footer -->
</div><!-- END of footer_container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<?php if(in_array("slider",$jquery_plugins)){ ?>
                                                                                <!-- SLIDER -->
<link rel="stylesheet" href="<?php echo base_url(); ?>public/jquery_plugins/slider/css/liteaccordion.css">
<!--[if lt IE 9]>
    <script>
        document.createElement('figure');
        document.createElement('figcaption');			
    </script>
<![endif]-->	
<script src="<?php echo base_url(); ?>public/jquery_plugins/slider/js/liteaccordion.jquery.js"></script>
                                                                            <!-- END OF SLIDER -->
<?php } ?>
<?php if(in_array("checkout",$jquery_plugins)){ ?>
<script language="javascript" type="text/javascript">
	$("#method").change(function()
	{
		if($("#method").val() == "0")
		{
			$("#del").show();
			$("#pick").hide();
		}
		else if($("#method").val() == "1")
		{
			$("#pick").show();
			$("#del").hide();
		}
	});
</script>
<?php } ?>

<script language="javascript" type="text/javascript">
var lan = '<?=$lan?>';
var base_url = '<?=base_url(); ?>';
</script>
<script src="<?=base_url().'public/js/global.js';?>"></script>

</body>
</html>
 