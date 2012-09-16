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
		$table="ninerr_review";
		
		$dataArray=array("review_msg"=>$_REQUEST['review_msg'],"order_id"=>$_REQUEST['orderid'],"review"=>$_REQUEST['review'],"review_by"=>$_SESSION['user_id'],"gigs_id"=>$_REQUEST['gigs_id'],"review_to"=>$_REQUEST['review_to'],"reviewer_type"=>"buyer");
		
		$order_payment->dataInsert($table,$dataArray);
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
              <h4>Review  </h4>
              </strong></td>
            </tr>
          </table>
          
<form action="" method="post" name="manage_edit" >
  <table width="100%"  cellpadding="0" cellspacing="0" bordercolor="#000099" class="settings-form" >
  <tr>
    <td width="22%" height="27"><strong>Shopp Orde Item </strong></td>
	<td width="3%">:</td>
    <td width="75%"><?php echo $data['item_name']; ?><input type="hidden"  name="order_id" value="<?php echo $_REQUEST['orderid']; ?>" /> <input type="hidden"  name="review_to" value="<?php echo $data['seller_id']; ?>" /><input type="hidden"  name="gigs_id" value="<?php 
	$rs_gigs=$gigs->uniq_gigs_list_double("gigs_title",$data['item_name'],"user_id",$_SESSION['user_id']);
	$data_gigs=mysql_fetch_array($rs_gigs);
	echo $data_gigs['id'];
	//	echo $data['seller_id'];
	
	
	 ?>" /></td>
  </tr>
   <tr>
    <td height="38"><strong>Review Messege </strong></td>
	<td width="3%">:</td>
    <td>
	<textarea name="review_msg" ></textarea>
	</td>
  </tr>
  
  <tr>
    <td height="38"><strong>Review</strong></td>
	<td width="3%">:</td>
    <td>
	<select name="review" >
	<?php 
	for($k=1;$k<11;$k++)
	{
	?>
	<option value="<?php echo $k; ?>" <?php i//f($data['order_status']=="pending") echo "selected"; ?>><?php echo $k; ?></option>
	<?php 
	}
	?>
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
