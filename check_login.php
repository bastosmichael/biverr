<?php
			include_once('config/db_conn.php');
			include_once('db_config/db_user.php');
			$user=new user();
			


// Show all errors except the notice ones
error_reporting(E_ALL ^ E_NOTICE);

// Initialize session
session_id();
session_start();
if($_POST['email']==$config['email'])
{
	$_SESSION['username_email']= $config['email'] ;
	
}

header('Cache-control: private'); // IE 6 FIX

if($_POST['action'] == 'user_login')
{
$post_email = $_POST['email'];
$post_password = $_POST['password'];

// check username and password
$rs_user=$user->user_login($post_email,$post_password);
//echo $rs_user;
if($rs_user==34)
{ 
// No error? Register the session & redirect the user to his/her 'Control Panel'
	
$_SESSION['username_email']= $post_email;
$rs_user=$user->uniq_user_list('user_primary_email',$post_email);
$data_user=mysql_fetch_array($rs_user);
$_SESSION['user_id']=$data_user['user_id'];
$_SESSION['user_name']=$data_user['user_name'];

			if($_POST['remember_me'])
			{
			// set the cookies for 1 month

			setcookie ("remember_me", true, (time() + TIME_DIFF) + (3600 * 24 * 30));
			setcookie ("info", $user_id.','.md5($password), (time() + TIME_DIFF) + (3600 * 24 * 30));
			}
	        echo 'OK'; // this response is checked in 'process-login.js'
	}
	else 
	{
    $auth_error = '<div id="notification_error"><strong>The login info is not correct.</strong></div>';

    echo $auth_error;
	
	

	}
}
?>