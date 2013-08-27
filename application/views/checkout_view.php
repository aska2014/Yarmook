<div id="content">
<?php
		if($this->cart->total() == 0)
		{
			if($lan == "en")
				echo 'You don\'t have books in your cart, Here are some links that could help you';
			else
				echo 'لا يوجد لديك كتب فى سلة المشتريات , هذه بعض الصفحات التى قد تساعدك';
			echo '<br />';
			$this->load->view('site_map.php');
			
		}else{?>
    <form action="<?=base_url()?>checkout/send" method="post" class="mainForm">
        <div class="title"><?=$dic['checkout']?></div>
        <div><label><?=$dic['full_name']?></label><input name="full_name" class="txt" type="text" /></div>
        <div><label><?=$dic['email']?></label><input name="email" class="txt" type="text" /></div>
        <div><label><?=$dic['mobile_no'];?></label><input name="mobile_no" class="txt" type="text" /></div>
        <div><label><?=$dic['method'];?></label><select name="method" class="slct" id="method"><option selected="selected" value=""><?=$dic['select_method'];?></option><option value="0"><?=$dic['delivery'];?></option><option value="1"><?=$dic['pick_up'];?></option></select></div>
        <div id="del" style="display:none;">
            <div><label><?=$dic['state'];?></label><input name="state" class="txt" type="text" /></div>
            <div><label><?=$dic['city'];?></label><input name="city" class="txt" type="text" /></div>
            <div><label><?=$dic['street_address'];?></label><input name="street_address" class="txt" type="text" /></div>
        </div>
        <div id="pick" style="display:none;">
            <!-- PUT HERE THE GOOGLE MAP -->
        </div>
        <input type="submit" value="<?=$dic['send_request']?>" class="sbmt" />
        <font color="#CC0000">
        <?php 
		if(!empty($errors))echo implode("<br />",$errors);
		?>
        </font>
        <font color="#009900">
        <?php 
		if(!empty($success))echo implode("<br />",$success);
		?>
        </font>
    </form>
</div>
<style type="text/css">
#content .mainForm{padding:20px; margin:0px auto; width:420px; background: #ffffff; /* Old browsers */
background: -moz-linear-gradient(top,  #ffffff 0%, #f1f1f1 50%, #e1e1e1 51%, #f6f6f6 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(50%,#f1f1f1), color-stop(51%,#e1e1e1), color-stop(100%,#f6f6f6)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #ffffff 0%,#f1f1f1 50%,#e1e1e1 51%,#f6f6f6 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #ffffff 0%,#f1f1f1 50%,#e1e1e1 51%,#f6f6f6 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #ffffff 0%,#f1f1f1 50%,#e1e1e1 51%,#f6f6f6 100%); /* IE10+ */
background: linear-gradient(to bottom,  #ffffff 0%,#f1f1f1 50%,#e1e1e1 51%,#f6f6f6 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=0 ); /* IE6-9 */ border:1px solid #BBB; text-align:left;}
.mainForm div.title{font-size:22px; font-weight:bold; color:#E52F36; margin:0px 150px; margin-bottom:20px;}
.mainForm div{ margin-top:10px;}
.mainForm div label{width:150px; float:left;}
.mainForm .txt,.slct{padding:4px; border:1px solid #BBB; width:250px;}
.mainForm .sbmt{padding:3px; border:1px solid #BBB; cursor:pointer; margin:30px 160px; margin-bottom:0px;}
<?php if($lan == "ar"){ ?>
.mainForm div.title{width:140px;}
.mainForm{text-align:right;}
.mainForm div label{float:right; text-align:right;}
<?php } ?>
</style>
<?php } ?>