<?php
session_start();
?>
<?php
	include_once('config/db_conn.php');	
	include_once('db_config/db_user_transaction.php');
	$trans=new trans();	
	$date=date('y-m-d h:i:s');
	$dataArray=array("user_id"=>$_SESSION['user_id'],"pending_fund"=>$_REQUEST['amt'],"withdraw_request"=>"pending","withdraw_request_ammount"=>$_REQUEST['amt'],"tran_date"=>$date);		
	$trans->dataInsert('ninerr_user_transaction',$dataArray);
	$dataArray1=array("seller_withdraw_status"=>"pending");
	$fldArray=array();
	$trans->dataUpdate('ninerr_user_transaction',$dataArray1,$fldArray);
	reDirect('sales_balance.php?req=success');

?>
