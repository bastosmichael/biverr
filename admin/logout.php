<?php
include_once('config/db_conn.php');
unset($_SESSION['user_login']);
header('location: login.php');
?>
<html>
<head>
<title>
Logged Out</title></head>
<body>
<h1>Please Login Again</h1><br/> Click On this link for <a href="login.php">Admin Panel Login</a>
<?php


//mod for debug
$CONFIG = new JConfig();

if ($CONFIG->error_reporting <= 0) {
	error_reporting( 0 );
echo "no error reporting";
} else if ($CONFIG->error_reporting > 0) {
echo "Error reporting is on";
	error_reporting( $CONFIG->error_reporting );
	ini_set( 'display_errors', 1 );
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
}

define( 'JDEBUG', $CONFIG->debug );

unset( $CONFIG );
//mod for debug



unset($_SESSION['user_login']);
header('location: login.php');

?>
</body>
</html>