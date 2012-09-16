<?php
include_once('config/db_conn.php');
// Check if the user is logged in
if(!isSet($_SESSION['username'])){
reDirect($_SERVER['HTTP_REFERER']);
}
?>
