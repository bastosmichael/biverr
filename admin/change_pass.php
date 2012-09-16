<?php
include_once('config/db_conn.php');
include_once('db_config/db_gigs.php');
include_once('db_config/db_admin.php');
$admin =new admin();


if($_REQUEST['submit'])
{
	$table='ninerr_admin';
	$user_pass =$_REQUEST['password'];
	$new_password=$_REQUEST['new_password'];
	$con_new_password=$_REQUEST['con_new_password'];
	if($new_password==$con_new_password)
	{
		$dataArray=array("user_pass"=>$new_password);
		$fldArray=array("user_pass"=>$user_pass);
		$admin->dataUpdate($table,$dataArray,$fldArray);
		//reDirect('change_pass.php');
	}
	else
	{
		$err_msg= "New password is mismatch with confirm password.";
	}
	
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Admin</title>
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
		include_once('header.php');
		?>
  <div id="top-panel">
    <div id="panel">
      <ul>
        <li></li>
      </ul>
    </div>
  </div>
  <div id="wrapper">
    <div id="content">
      <div id="box">
       
        <div id="box">
                	<h3 id="adduser">&nbsp;</h3>
                    <form id="form" action="" method="post">
                      <fieldset id="personal">
                        <legend>CHANGE PASSWORD</legend>
						
                        <label for="lastname">Current Password : </label>
                        <input name="password" id="password" type="password" tabindex="1" />
                        <br />
                       <label for="lastname">New Password : </label> 
                        <input name="new_password" id="new_password" type="password" tabindex="1" />
                        <br />
                       <label for="lastname">Confirm Password : </label> 
                        <input name="con_new_password" id="con_new_password" type="password" tabindex="1" />
                        <br />
                      </fieldset>
                      
                      
                      <div align="center">
                        <input name="submit" type="submit" id="button1" value="Submit" />
                        <input id="button2" type="reset" />
                      </div>
                    </form>

        </div>
      </div>
      <br />
    </div>
    <?php
			include_once('right.php');
			?>
  </div>
  <?php
		include_once('footer.php');
		?>
</div>
</body>
</html>
