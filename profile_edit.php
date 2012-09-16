<?php
session_start();
include_once('config/db_conn.php');
include_once('db_config/db_user.php');
$user=new user();
$rs_user=$user->uniq_user_list('user_id',$_SESSION['user_id']);
$data_user=mysql_fetch_array($rs_user);

if($_REQUEST['submit'])
{
	
	$user_data['user_fullname']= $_REQUEST['user_fullname'];
	$user_data['user_primary_email']= $_REQUEST['user_primary_email'];
	$user_data['user_paypal_account_email']= $_REQUEST['user_paypal_account_email'];
	$user_data['user_desc']=  htmlspecialchars($_REQUEST['user_desc'],ENT_QUOTES);
	if($_FILES['user_image']['name']!='')
	{
	$user_data['user_image']= date("ymdhi").$_FILES['user_image']['name'];
	}
	$fldArray['user_id']=$_SESSION['user_id'];
	$rs_user=$user->dataUpdate('ninerr_user',$user_data,$fldArray);
	
	$fileName=$_FILES['user_image']['name'];
	$fileSize='2000';
	$fileTempName=$_FILES['user_image']['tmp_name'];
	$folderPath='userimg';
	$oldfileName='';
	fileUpload($fileName,$oldfileName,$fileSize,$fileTempName,$folderPath,$maxSize=5242880);
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
    <td width="27%"> <strong>Fullname</strong></td>
    <td width="72%"><input type="text" value="<?php echo $data_user['user_fullname']; ?>" size="30" name="user_fullname" id="profile_name" class="text"></td>
  </tr>
  <tr height="40">
   <td width="1%">&nbsp; </td>
    <td><strong>Email </strong></td>
    <td><input type="text" value="<?php echo $data_user['user_primary_email']; ?>" size="30" name="user_primary_email" id="user_email" class="text"></td>
  </tr>
  <tr height="40">
   <td width="1%">&nbsp; </td>
    <td><strong>Paypal Account Email</strong></td>
    <td><input type="text" value="<?php echo $data_user['user_paypal_account_email']; ?>" size="30" name="user_paypal_account_email" id="user_paypal_email" class="text"></td>
  </tr>
  <tr height="200">
   <td width="1%">&nbsp; </td>
    <td><strong>Something about you</strong></td>
    <td style="padding-left:6px;"><textarea  name="user_desc" id="<?php echo $data_user['user_desc']; ?>" rows="5" cols="25" class="textarea"><?php 
	if($data_user['user_desc']!='')
	echo $data_user['user_desc']; ?></textarea></td>
  </tr>
  <tr height="40">
   <td width="1%">&nbsp; </td>
    <td><strong>Profile Picture</strong><img src="userimg/<?php echo $data_user['user_image']; ?>" height="72" width="102"  /></td>
    <td><input type="file" value="" size="30" name="user_image" id="gig_Image" class="browsefile"></td>
  </tr>
  <tr height="40">
   <td width="1%">&nbsp; </td>
    <td>&nbsp;</td>
    <td align="center"><input type="image" src="images/btn-2-save.png" name="submit" value="submit" class="btn-update" alt="Update"></td>
  </tr>
  <tr height="20">
   <td width="1%">&nbsp; </td>
    <td><a href="change_password.php" >Change Password </a></td>
    <td align="center">&nbsp;</td>
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
