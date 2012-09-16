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

	//$data_trans=mysql_fetch_array($rs_trans);
	
	$rs_trans_sum_pending_fund=$trans->sum_trans('pending_fund',$_SESSION['user_id']);
	$data_trans_sum_pending_fund=mysql_fetch_array($rs_trans_sum_pending_fund);
	
	$rs_trans_sum_clear_fund=$trans->sum_trans1('cleader_fund',$_SESSION['user_id']);
	$data_trans_sum_clear_fund=mysql_fetch_array($rs_trans_sum_clear_fund);
	
	$rs_trans_sum_withdraw=$trans->sum_trans('withdraw_request_ammount',$_SESSION['user_id']);
	$data_trans_sum_withdraw=mysql_fetch_array($rs_trans_sum_withdraw);
	
	$data_trans=mysql_fetch_array($rs_trans);
	
	//echo $data_trans['cleader_fund'];
	
		
	//echo $data_trans_sum_clear_fund['sum'];
	
	$user=new user();		
	$gigs=new gigs();
	$order_payment=new order_payment();
	$rs=$order_payment->uniq_order_payment_list_double('seller_id',$_SESSION['user_id'],"order_status","compleated");
	
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
<style type="text/css">
<!--
.style2 {
	color: #009C00;
	font-weight: bold;
	font-size: 14px;
}
-->
</style>
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
            <!--<tr>
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
              <td colspan="8" height="20"><?php if($_REQUEST['req']=='success') echo '<font color=red size=2><strong>You withdraw request has taken within 3 day requested ammount will transferred.</strong></font>'; ?></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr bgcolor="#F1F1F1" height="30">
              <td width="30%"><strong>Date</strong></td>
              <td width="36%"><strong>Gig</strong></td>
              <td width="12%"><strong>Buyer</strong></td>
              <td width="9%"><strong>Status</strong></td>
              <td width="13%"><strong>Gross</strong></td>
            </tr>
			<tr  >
              <td><?php if($_REQUEST['success']!='') echo 'Withdraw request  has taken successfully' ?></td>
            </tr>
            <?php 
			$payment_gross=0;
 while($data=mysql_fetch_array($rs))
 {
$ct= count($data[1]);
 
    ?>
            <tr  >
              <td><?php echo $data['payment_date']; ?></td>
              <td><?php echo $data['item_name']; ?></td>
              <td><?php echo $data['first_name'].''.$data['last_name']; ?></td>
              <td><?php echo $data['payment_status']; ?></td>
              <td>$<?php echo $data['payment_gross']; ?></td>
            </tr>
            <?php
		$payment_gross = $payment_gross+$data['payment_gross']-COMMISSION_AMMOUNT;
 }
  ?>
  			<tr height="100" >
              <td colspan="5" align="center">
			  <?php
			  
			  if($ct==0)
			  {
			  ?>
			  <strong>No revenues yet...</strong>
			  <?php
			  }
			  ?>			  </td>
            </tr>
            
			 <tr bgcolor="#DAFFC1" height="30">
              <td colspan="2"><input type="button" name="withdaw" onclick="javascript:location.href='request_withdraw.php?amt=<?php echo $payment_gross-$data_trans_sum_clear_fund['sum']; ?>'" value="Withdraw your earning $<?php echo $payment_gross-$data_trans_sum_clear_fund['sum']; ?>" style="cursor:pointer;"  <?php if($data_trans_sum_withdraw['sum']!=''){if($data_trans_sum_pending_fund['sum']== $data_trans_sum_withdraw['sum'])echo "disabled"; } ?>  /><br /></td>
              
              <td colspan="2"><!--<span class="style2">Cleared</span>--></td>
              <td><!--<span class="style2">$0</span>--></td>
            </tr>
			 <tr bgcolor="#DAFFC1" height="30">
               <td colspan="2"><br /></td><td colspan="2"><span class="style2">Pending Funds</span></td>
              <td><span class="style2">
                <?php
				if($data_trans['pending_fund']!=$data_trans['cleader_fund'])
				{
			  		echo "$".$data_trans['pending_fund'];
			   	 }
				 else
				 {
				 echo "$0";
				 }
			   
			   ?>
              </span></td>
            </tr>
           
			<tr  height="30">
              <td colspan="5"><strong>* Minimum withdraw sum: $40 
of Cleared funds You need additional $40 to withdraw.

</strong></td>
            </tr>
			<tr  height="30">
              <td colspan="5"><strong>* Above sums are gross. Service and transaction fees will be deducted during withdrawal.

</strong></td>
            </tr>
			<tr  height="30">
              <td colspan="5"><strong>* Cleared funds represent the gross amount of money earned by your gig sales and that is available to you after credit card refund period had passed.

</strong></td>
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
