<?php
session_start();
include_once('config/db_conn.php');

include_once('db_config/db_recommend.php');
$recommend =new recommend();
$rs_recommend=$recommend->recommend_list();
	$table='ninerr_recommend';
	$recommend_value =$_REQUEST['textarea'];
	$recommend_by =$_SESSION['user_name'];
	$dataArray=array("recommend_value"=>$recommend_value,"recommend_by"=>$recommend_by );
	$recommend->dataInsert($table,$dataArray);
	reDirect('index.php');

?>