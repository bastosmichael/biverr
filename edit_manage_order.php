<?php
session_start();
?>
<?php
	
	include_once('config/db_conn.php');
	include_once('db_config/db_gigs.php');
	include_once('db_config/db_user.php');
	include_once('db_config/db_order_payment.php');
	include_once('db_config/db_user_transaction.php');
	$trans=new trans();	
	$rs_trans=$trans->uniq_trans_list('user_id',$_SESSION['user_id']);

	$data_trans=mysql_fetch_array($rs_trans);
	
	$rs_trans_sum_pending_fund=$trans->sum_trans('pending_fund',$_SESSION['user_id']);
	$data_trans_sum_pending_fund=mysql_fetch_array($rs_trans_sum_pending_fund);
	
	$rs_trans_sum_withdraw=$trans->sum_trans('withdraw_request_ammount',$_SESSION['user_id']);
	$data_trans_sum_withdraw=mysql_fetch_array($rs_trans_sum_withdraw);
	
	$data_trans=mysql_fetch_array($rs_trans);
	
	//echo $data_trans['pending_fund'];
	$user=new user();		
	$gigs=new gigs();
	$order_payment=new order_payment();
	$rs=$order_payment->uniq_order_payment_list_double('buyer_id',$_SESSION['user_id'],'order_id',$_REQUEST['orderid']); 
	$data=mysql_fetch_array($rs);  
	if($_REQUEST['orderid']=='')
	{
	reDirect('manage_order.php');
	}
	if($_REQUEST['submit'])
	{
		$table="ninerr_order_payment";
		
		$dataArray=array("order_status"=>$_REQUEST['order_status']);
		$fldArray=array("order_id"=>$_REQUEST['orderid']);
		$order_payment->dataUpdate($table,$dataArray,$fldArray);
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
<script src="javascript/main.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">

	/* this is just a simple reload; you can safely remove it; remember to remove it from the image too */
	
	function reloadCaptcha()
	{
		document.getElementById('captcha').src = document.getElementById('captcha').src+ '?' +new Date();
	}
</script>
<script language="javascript">
function openCenteredWindow(url) {
	parms = 'menubar=no,width=600,height=500,toolbar=no'
	name = "facebook_share"
	height=500
	width=600
   var left = Math.floor( (screen.width - width) / 2);
   var top = Math.floor( (screen.height - height) / 2);
   var winParms = "top=" + top + ",left=" + left + ",height=" + height + ",width=" + width;
   if (parms) { winParms += "," + parms; }
   var win = window.open(url, name, winParms);
   if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
   return win;
}
</script>

<link type='text/css' href='css/stylesheet.css' rel='stylesheet' media='screen' />
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
</head>
<body>
<div id="container">
<!--HEADER AREA-->
<?php include('header.php')?>
  <!--HEADER AREA END-->
  <div class="body_cont">
    <div class="body_cont_top"> </div>
    <div class="body_cont_center">
      <div class="left_cont">
        <div class="tweet_bx">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <!-- <tr>
              <td width="8%"><strong>Display</strong></td>
              <td width="3%"  ><a href="index.php?latest=latest" >All</a></td>
              <td width="7%" >Cleared</td>
              <td width="9%" >On Hold</td>
              <td width="10%" >Reversed</td>
              <td width="9%" >Pending</td>
              <td width="11%" >Withdrawn</td>
              <td width="43%" >Paid</td>
            </tr>-->
			   <tr>
              <td><strong>
              <h4>Edit Manage Orders </h4>
              </strong></td>
            </tr>
          </table>
          
<form action="" method="post" name="manage_edit" >
  <table width="100%"  cellpadding="0" cellspacing="0" bordercolor="#000099" class="settings-form" >
  <tr>
    <td width="22%" height="27"><strong>Shopp Orde Item </strong></td>
	<td width="3%">:</td>
    <td width="75%"><?php echo $data['item_name']; ?></td>
  </tr>
  <tr>
    <td height="38"><strong>Status</strong></td>
	<td width="3%">:</td>
    <td>
	<select name="order_status" >
	<!--<option value="pending" <?php if($data['order_status']=="pending") echo "selected"; ?>>Pending</option>-->
	<option value="compleated" <?php if($data['order_status']=="compleated") echo "selected"; ?> >Compleated</option>
	<option value="cancelled" <?php if($data['order_status']=="cancelled") echo "selected"; ?> >Cancelled</option>
	</select>
	</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
	<td width="3%">:</td>
    <td><input type="submit" value="Update" name="submit"  /></td>
  </tr>
  
</table>
</form>
<table width="100%"  cellpadding="0" cellspacing="0" >
<tr height="330">
              <td colspan="5">&nbsp;</td>
            </tr>
			</table>
        </div>
        <div class="tweet_bx">
          <div class="tweet_bx_left"></div>
        </div>
      </div>
      <?php include('profile_right.php'); ?>
    </div>
    <div class="body_cont_bottom"> </div>
  </div>
  <?php
include('footer.php');
 ?>
</div>
</body>
</html>
