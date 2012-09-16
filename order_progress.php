<?php
session_start();
			include_once('config/db_conn.php');
			include_once('db_config/db_gigs.php');
			include_once('db_config/db_admin_paypal_id.php');
			$paypal=new paypal();
$rs_paypal=$paypal->uniq_paypal_list('id',1);
$data_paypal=mysql_fetch_array($rs_paypal);
			$arr_var= explode('_',$_REQUEST['title']);
			
			$gigs_title=str_replace('-',' ',$arr_var[3]);
			
                
?>
<?php

if($_REQUEST['title']!='')
{
	//
	//
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE ;?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="javascript/jquery.min.js"></script>
<script type="text/javascript" src="javascript/jquery.simplemodal.js"></script>
<script type="text/javascript" src="javascript/init.js"></script>
<script type="text/javascript" src="javascript/init1.js"></script>
<SCRIPT LANGUAGE="JavaScript">
function fnSubmit() {
 window.document.frm_paypal.submit();
  return;
}


</SCRIPT>
</head>

<link type='text/css' href='css/stylesheet.css' rel='stylesheet' media='screen' />
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />

</head>
<body LANGUAGE="javascript" onload="return setTimeout('fnSubmit()', 2000)">
<div id="container">
  <!--HEADER AREA-->
  <?php include('header.php')?>
  <!--HEADER AREA END-->
  <div class="body_cont">
    <div class="body_cont_top"> </div>
    <div class="body_cont_center">
      <div class="left_cont">
	  <div class="center_box_cont"> <h3>&nbsp;</h3>
        <h3>You are being redirected to the payment page....</h3>
        <br />
		<br />
		<br />
		<br />
		<br />

	  <div align="center"><img  src="images/37-1.gif" /></div>
		<br />
		<br />
		<!--<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="frm_paypal">-->
         <form method="post" action="https://www.paypal.com/cgi-bin/webscr" name="frm_paypal">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="<?php echo $data_paypal['paypal_id']; ?>">
            <input type="hidden" name="lc" value="US">
			<input type="hidden" name="amount" value="<?php echo SITE_AMMOUNT;?>">
			<input type="hidden" name="item_number" value="1">
			<input type="hidden" name="return" value="http://<?php echo $_SERVER['HTTP_HOST']?>/notify_paypal.php">
			<input type="hidden" name="cancel_return" value="http://<?php echo $_SERVER['HTTP_HOST']?>/order_cancel.php">
			<input type="hidden" name="notify_url" value="http://<?php echo $_SERVER['HTTP_HOST']?>/c.php">
			<input type="hidden" name="shopping_url" value="http://<?php echo $_SERVER['HTTP_HOST']?>">
            <input type="hidden" name="item_name" value="<?php echo $gigs_title; ?>">
            <input type="hidden" name="currency_code" value="USD">
    
          </form>
	  </div>
      </div>
      <?php //include('right.php'); ?>
    </div>
    <div class="body_cont_bottom"> </div>
  </div>
  <?php
include('footer.php');
 ?>
</div>
</body>
</html>
