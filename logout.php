<?php
session_start();
include_once('config/db_conn.php');
if(isset($_SESSION['username_email'])|| isset($_SESSION['user_id']) )
{
unset($_SESSION['username']);
unset($_SESSION['user_id']);
unset($_SESSION['username_email']);
unset($_SESSION['user_name']);

if(isSet($_COOKIE[$cookie_name]))
{
// remove 'site_auth' cookie
setcookie ($cookie_name, '', time() - $cookie_time);
}
reDirect('index.php');

}
?>