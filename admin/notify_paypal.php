<?php
session_start();

?>
<?php
	
	include_once('config/db_conn.php');
	include_once('db_config/db_gigs.php');
	include_once('db_config/db_user.php');
	include_once('db_config/db_admin_order_payment.php');
	$user=new user();		
	$gigs=new gigs();
	$rs_gigs=$gigs->uniq_gigs_list('gigs_title',$_POST['item_name']);
	$data_gigs = mysql_fetch_array($rs_gigs);
	$user_id=$_REQUEST['user_id'];
	$admin_order_payment=new admin_order_payment();
	if($_POST)
	{
	$array_1=array("order_status_date"=>date('Y:m:d'));
	$array_m=array_merge($array_1,$_POST);
	$admin_order_payment->dataInsert('ninerr_admin_order_payment',$array_m);
	$fldArray=array("user_id"=>$user_id);
	$dataArray=array("cleader_fund"=>$_POST['mc_gross'],"withdraw_request"=>"sucess");
	$admin_order_payment->dataUpdate('ninerr_user_transaction',$dataArray,$fldArray);
	reDirect('transaction.php?req=success');
	}
?>
