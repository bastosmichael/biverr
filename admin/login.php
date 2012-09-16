<?php
session_start();
include_once('config/db_conn.php');
include_once('db_config/db_user_transaction.php');
include_once('db_config/db_user.php');
$user=new user();




if($_REQUEST['submit'])
{
$user_login=$_REQUEST['user_login'];
$user_pass=$_REQUEST['user_pass'];
$tableM = 'ninerr_admin';
$dataArrayM = array("*" => '');
$fldArrayM = array("user_login" => $user_login,"user_pass" => $user_pass);
$orderArrayM=array();
$orderTypeM='';
$arrUSERREG=$user->dataSelect($tableM,$dataArrayM,$fldArrayM,$extraM,$orderArrayM,$orderTypeM,$limit,$offset);
if(count($arrUSERREG[0])>0)
{
	$_SESSION['user_login']=$user_login;
	$_SESSION['user_id']=$arrUSERREG[0][0]['user_id'];
	reDirect('users.php');
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login - Admin</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
</head>
<body>
<div id="container">
  <?php
		include_once('login_header.php');
		?>


    <div id="content_login">

        <form id="form" action="" method="post" >
                      <fieldset id="personal">
                        <legend >LOGIN  INFORMATION</legend>
                        <label for="name" style="padding-left:180px;"> <strong>User Name</strong> : </label>
                        <input name="user_login" id="input" type="text" tabindex="1" size="30" value="admin"/>
                        <br />


                        <label for="name" style="padding-left:180px;"> <strong>Password</strong> : </label>
                        <input name="user_pass" id="input" type="password" tabindex="1" size="30" value="admin"/>
                        <br />

                      </fieldset>


                      <div align="center">
                        <input name="submit" type="submit" id="button1" value="Login" />
                        <input id="button2" type="reset"  value="Cancel"/>
                      </div>
                    </form>

    </div>


</div>
</body>
</html>