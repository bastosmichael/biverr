<?php
session_start();
include_once('config/db_conn.php');
include_once('db_config/db_delivered.php');
include_once('db_config/db_order_payment.php');
$order_payment=new order_payment();
$delivered=new delivered();
$orderid=base64_decode($_REQUEST['orderid']);
if($_REQUEST['submit'])
{
	
	$data=array("order_id"=>$orderid,"message"=>$_REQUEST['message'],"attachment"=>date("ymdhi").$_FILES['attach']['name']);
//	$_FILES['attach']['name'];
	$rs_delivered=$delivered->dataInsert('ninerr_delivered',$data);
	$dataArray=array("order_status"=>"compleated");
	$fldArray=array("order_id"=>$orderid);
	$order_payment->dataUpdate("ninerr_order_payment",$dataArray,$fldArray);
	$fileName=$_FILES['attach']['name'];
	$fileSize='2000';
	$fileTempName=$_FILES['attach']['tmp_name'];
	$folderPath='attach';
	$oldfileName='';
	fileUpload($fileName,$oldfileName,$fileSize,$fileTempName,$folderPath,$maxSize=5242880);
	reDirect('manage_order.php');
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

<link type='text/css' href='css/stylesheet.css' rel='stylesheet' media='screen' />
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
</head>

<body>
<div id="container">

<!--HEADER AREA-->
<?php include('header.php')?>
<!--HEADER AREA END-->
<div class="body_cont">
<div class="body_cont_top">
</div>
<div class="body_cont_center">
<div class="left_cont">
<div class="tweet_bx">
<form method="post" id="edit_user" enctype="multipart/form-data" class="settings-form" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFFAFF" >
  <tr >
   <td width="1%">&nbsp; </td>
    <td><strong><h2>Devered Work</h2> </strong></td>
    <td style="padding-left:6px;">&nbsp;</td>
  </tr>
  <tr height="200">
   <td width="1%">&nbsp; </td>
    <td><strong>Message </strong></td>
    <td style="padding-left:6px;"><textarea  name="message"  rows="5" cols="25" class="textarea"></textarea></td>
  </tr>
  <tr height="40">
   <td width="1%">&nbsp; </td>
    <td><strong>Attachment</strong></td>
    <td><input type="file"  size="30" name="attach" id="attach" class="browsefile"></td>
  </tr>
  <tr height="40">
   <td width="1%">&nbsp; </td>
    <td>&nbsp;</td>
    <td align="center"><input type="image" src="images/btn-2-save.png" name="submit" value="submit" class="btn-update" alt="Update"></td>
  </tr>
  
</table>
</form>
</div>
</div>
<?php include('profile_right.php'); ?>
</div>
<div class="body_cont_bottom">
</div>
</div>
<?php
include('footer.php');
 ?>

</div>
</body>
</html>
