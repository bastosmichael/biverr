<?php
session_start();
include_once('config/db_conn.php');

if($_SESSION['user_login']=='')
{
reDirect('login.php');
}
?>