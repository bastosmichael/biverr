<?php
session_start();
include_once('config/db_conn.php');
include_once('db_config/db_user.php');
$user=new user();
$rs_user=$user->uniq_user_list('user_id',$_SESSION['user_id']);
$data_user=mysql_fetch_array($rs_user);

if($_REQUEST['submit'])
{
	
	$user_old_password= $_REQUEST['user_old_password'];
	$user_password= $_REQUEST['user_password'];
	$user_new_password= $_REQUEST['user_new_password'];
	if($user_password==$user_new_password)
	{
		$dataArray=array("user_password"=>$user_new_password);
	
	$fldArray=array("user_password"=>$user_old_password,"user_id"=>$_SESSION['user_id']);
	$rs_user=$user->dataUpdate('ninerr_user',$dataArray,$fldArray);
	}
	reDirect('profile_edit.php');
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE ;?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="javascript/jquery.min.js"></script>
<script type="text/javascript" src="javascript/jquery.simplemodal.js"></script>
<script type="text/javascript" src="javascript/init.js"></script>
<script type="text/javascript" src="javascript/init1.js"></script>

<link type='text/css' href='css/stylesheet.css' rel='stylesheet' media='screen' />
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
</head>

<body>
<div id="container">

<!--HEADER AREA-->
<?php include('header.php')?>
<!--HEADER AREA END-->
<div class="body_cont">
<div class="body_cont_top">
</div>
<div class="body_cont_center">
<div class="left_cont">
<div class="tweet_bx">
<form method="post" id="edit_user" enctype="multipart/form-data" class="settings-form" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFFAFF" >
   <tr height="40">
   <td width="1%">&nbsp; </td>
    <td width="27%"> <strong> Old Password</strong></td>
    <td width="72%"><input type="password" value="" size="30" name="user_old_password" id="user_old_password" class="text"></td>
  </tr>
  <tr height="40">
   <td width="1%">&nbsp; </td>
    <td width="27%"> <strong> New Password</strong></td>
    <td width="72%"><input type="password" value="" size="30" name="user_password" id="user_password" class="text"></td>
  </tr>
  <tr height="40">
   <td width="1%">&nbsp; </td>
    <td><strong>Confirm New </strong></td>
    <td><input type="password" value="" size="30" name="user_new_password" id="user_new_password" class="text"></td>
  </tr>
   <tr height="40">
   <td width="1%">&nbsp; </td>
    <td>&nbsp;</td>
    <td align="center"><input type="image" src="images/btn-2-save.png" name="submit" value="submit" class="btn-update" alt="Update"></td>
  </tr>
  
</table>
</form>
</div>
</div>
<?php include('profile_right.php'); ?>
</div>
<div class="body_cont_bottom">
</div>
</div>
<?php
include('footer.php');
 ?>

</div>
</body>
</html>
