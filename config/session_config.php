<?php
session_start();
include_once('config/db_conn.php');
$_SESSION['user_name'];
$_SESSION['password'];
if($_SESSION['user_name']==''&& $_SESSION['password']=='')
{
reDirect('index.php');
}
?>