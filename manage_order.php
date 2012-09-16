<?php
session_start();
?>
<?php
	
	include_once('config/db_conn.php');
	include_once('db_config/db_gigs.php');
	include_once('db_config/db_user.php');
	include_once('db_config/db_order_payment.php');
	include_once('db_config/db_user_transaction.php');
	include_once('db_config/db_review.php');
	$trans=new trans();	
	$review=new review();	
	
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
	if($_REQUEST['st'])
	{
		$rs=$order_payment->uniq_order_payment_list_double('buyer_id',$_SESSION['user_id'],'order_status',$_REQUEST['st']);
	}
	else
	{
		$rs=$order_payment->uniq_order_payment_list('buyer_id',$_SESSION['user_id']);
	}
	
	$rs_review_list_by=$review->review_list("review_by",$_SESSION['user_id']);
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
              <td height="20" colspan="11"><strong>
              <h4>Manage Orders </h4>
              </strong></td>
            </tr>
            <tr height="50">
              <td width="12%"><a href="manage_order.php">All Status </a></td>
              <td width="11%"><a href="manage_order.php?st=pending">Pending</a></td>
              <td width="14%"><a href="manage_order.php?st=compleated">Completed</a></td>
			  <td width="14%"><a href="manage_order.php?st=cancelled">Cancelled</a></td>
              <td width="49%"><a href="manage_order.php?st=review">Review</a></td>
            </tr>
          </table>
		  <?php
		  if($_REQUEST['st']!="review")
		  {
		   ?>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr bgcolor="#F1F1F1" height="30">
              <td width="30%"><strong>Date</strong></td>
              <td width="31%"><strong>Shopp Orde Item </strong></td>
             
             
              <td width="20%" align="center"><strong>Status</strong></td>
		      <td width="8%" align="center"><strong>Action</strong></td>
              <td width="11%" align="center"><strong>Review</strong></td>
            </tr>
			<tr  >
              <td><?php if($_REQUEST['success']!='') echo 'Withdraw request  has taken successfully' ?></td>
            </tr>
            <?php 
			$payment_gross=0;
 while($data=mysql_fetch_array($rs))
 {
$ct= count($data[1]);
 
 $rs_review=$review->uniq_review_list("order_id",$data['order_id']);
 $data_review=mysql_num_rows($rs_review);
 
    ?>
            <tr  >
              <td><?php echo $data['payment_date']; ?></td>
              <td><?php echo $data['item_name']; ?></td>
             
             
              <td align="center"><?php echo $data['order_status']; ?></td>
		      <td ><img src="images/actions.png" align="middle" onclick="javascript:location.href='edit_manage_order.php?orderid=<?php echo $data['order_id'];  ?>'" style="cursor:pointer;" /></td>
              <td ><?php if($data_review==0){ ?><a href="review.php?orderid=<?php echo $data['order_id'];  ?>" >Give Review to seller </a><?php }else { echo "Review already given";} ?></td>
            </tr>
            <?php
		$payment_gross = $payment_gross+$data['payment_gross'];
 }
  ?>
  			<tr >
              <td colspan="5" align="left" style="font-weight:bolder;">
			  <?php
			  echo "Balance : $".$payment_gross;
			 
			  ?>			  </td>
            </tr>
  			<tr height="100" >
              <td colspan="5" align="center">
			  <?php
			 
			  if($ct==0)
			  {
			  ?>
			  <strong>No records found ! </strong>
			  <?php
			  }
			  ?>			  </td>
            </tr>
            
			
			
          </table>
		  
		  <?php
		  }
		  if($_REQUEST['st']=="review")
		  {
		   ?>
		  <table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr  height="30">
              <td width="13%"><strong>Review</strong></td>
              <td colspan="2">&nbsp;</td>
             
             
              <td colspan="3" align="center">&nbsp;</td>
	        </tr>
            <tr bgcolor="#F1F1F1" height="30">
              <td width="13%"><strong>SL NO </strong></td>
              <td width="48%"><strong>Shopp Orde Item </strong></td>
             
             
              <td width="21%"><strong>Review To </strong></td>
              <td colspan="3" align="center"><strong>Review</strong></td>
	        </tr>
			
            <?php 
			$k=0;
 while($data_review_list_by=mysql_fetch_array($rs_review_list_by))
 {

 $rs_gigs1=$gigs->uniq_gigs_list("id",$data_review_list_by['gigs_id']);
 $data_gigs1=mysql_fetch_array($rs_gigs1);
    
	?>
            <tr  >
			 <td><?php echo $k+1; ?></td>
              <td><?php echo $data_gigs1['gigs_title'] ?></td>
             
             
             
              <td><?php
			  $rs_user1=$user->uniq_user_list("user_id",$data_review_list_by['review_to']);
			  $data_user1=mysql_fetch_array($rs_user1);
			  echo $data_user1['user_name']."(".$data_user1['user_primary_email'].")";
			  ?></td>
              <td width="18%" colspan="3" align="center"><?php echo $data_review_list_by['review']; ?></td>
            </tr>
            <?php
		$k++;
		
 }
  ?>
  <tr height="100" >
              <td colspan="6" align="center">&nbsp;			 		  </td>
            </tr>
          </table>
		  <?php
		  }
		  ?>
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
