<?php
session_start();
?>
<?php
		include_once('config/db_conn.php');
		include_once('db_config/db_gigs.php');
		include_once('db_config/db_user.php');
		$user=new user();
		$gigs=new gigs();
		$gigs_like='Like';
		$gigs_like_user_id=$_SESSION['user_id'];
		$rs=$gigs->uniq_gigs_list_double('gigs_like',$gigs_like,'gigs_like_user_id',$gigs_like_user_id);
		$i=0;
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
<script src="javascript/main.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
	/* this is just a simple reload; you can safely remove it; remember to remove it from the image too */
	function reloadCaptcha()
	{
		document.getElementById('captcha').src = document.getElementById('captcha').src+ '?' +new Date();
	}
</script>
<script language="javascript">
function openCenteredWindow(url) {
	parms = 'menubar=no,width=600,height=500,toolbar=no'
	name = "facebook_share"
	height=500
	width=600
   var left = Math.floor( (screen.width - width) / 2);
   var top = Math.floor( (screen.height - height) / 2);
   var winParms = "top=" + top + ",left=" + left + ",height=" + height + ",width=" + width;
   if (parms) { winParms += "," + parms; }
   var win = window.open(url, name, winParms);
   if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
   return win;
}
</script>
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
  <?php


while($data=mysql_fetch_array($rs))
{

$rs_user=$user->uniq_user_list('user_id',$data['user_id']);
$data_user=mysql_fetch_array($rs_user);
?>
<div class="tweet_bx">
<a href="users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>">
<img src="gigsimg/<?php
if($data['gigs_image'])
echo $data['gigs_image'];
else echo 'no_img.jpg';
 ?>" height="72" width="101"  /></a>
<div class="tweet_bx_left">
<p>
<b><span style="cursor:pointer;" onclick="javascript:location.href='users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>'">I will <?php  echo  $data['gigs_title'];?> for <?php echo SITE_AMMOUNT;?>.</span></b> <br />

<?php  echo substr($data['gigs_description'],0,50);?>... (by user)<br />
</p>
<div class="tweet_bx_b">
<i> <a href="users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>">Read more</a></i><img src="images/tw_brd.jpg" /><div class="list-controllers">
              <ul class="gig-controls">
                <li><a href="#" class="pshare share-link">Share</a></li>
                <li class="p-share" style="display: none;">
<a href="#" onClick="openCenteredWindow('http://www.facebook.com/sharer.php?u=<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/users_<?php echo $data_user['user_name']; ?>_gigs_<?php echo str_replace(' ','-', $data['gigs_title']); ?>');"><img alt="Btn-facebook" src="images/btn-facebook.png" /></a>
  	<a href="http://www.twitter.com/?status=<?php echo $data_user['user_name']; ?>:<?php  echo str_replace(' ','+', $data['gigs_title']);?>+<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>" target="_blank" title="post to twitter"><img alt="Btn-twitter" src="images/btn-twitter.png"></a>
  	<a href="mailto:<?php echo $data_user['user_primary_email']; ?>?subject=<?php  echo str_replace(' ','%20', $data['gigs_title']);?>&amp;body=Hi,%0A%0ACheck%20it%20out:%20<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>" target="_blank" title="send by email"><img alt="Btn-email" src="images/btn-email.png"></a></li>              </ul>
</div>
</div>
</div>

<div class="btn"><a href="users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>">
<img src="images/or_bt.jpg" /></a>
</div>
</div>
<?php

}



?>

<div class="tweet_bx">
  <div class="tweet_bx_left"></div>

</div>
</div>
<?php include('right.php'); ?>
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
