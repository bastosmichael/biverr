<?php
//echo "connected!!";
include_once('config_global.php');
//include_once('helper.php');
include('helper.php');
include_once('xss.php');
require_once ('pagination.php');
$arr=explode('/',$_SERVER['PHP_SELF']);
$page_name=$arr[count($arr)-1];
if($page_name!='login.php')
{
require_once ('session_config.php');
}
$conn=@mysql_pconnect(DBHOST,DBUSER,DBPASS)or header("Location: construction.php");;
@mysql_select_db(DBNAME,$conn)or header("Location: construction.php");
?>
