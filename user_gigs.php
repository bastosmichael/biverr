<?php
session_start();
?>
<?php
		include_once('config/db_conn.php');
		include_once('db_config/db_gigs.php');
		include_once('db_config/db_user.php');
		$user=new user();
		$gigs=new gigs();
		$catagory_id=$_REQUEST['id'];

		$rs=$gigs->uniq_gigs_list_user('user_id',$_SESSION['user_id']);
		$i=0;
		if($_REQUEST['action'])
		{
			$msg="Action Succesfully changed.";
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
<script language="javascript">
function getvalue(val)
{
	document.getElementById('s').innerHTML='<a href="gigs_update.php?action=suspend&id='+val+'" class="btn-suspend"></a>';
	document.getElementById('a').innerHTML='<a href="gigs_update.php?action=active&id='+val+'" class="btn-activate"></a>';

}
</script>
</head>
<body>
<div id="container">
<!--HEADER AREA-->
<?php include('header.php')?>
  <!--HEADER AREA END-->
  <div class="body_cont">
    <div class="body_cont_top"> </div>
    <div class="body_cont_center">
      <div class="left_cont">
	  <div class="section">
    <!-- manage -->
    <div class="manage">
      <div class="heading">
        <div class="holder">
          <ul class="action">
            <li><a class="btn-add-new" href="manage_gigs.php"> </a></li>
			<li>
			<div id="s" >
            <a href="javascript:alert(gigs_action.value);" class="btn-suspend"></a>
            </div>
			</li>
            <li>
			<div id="a" >
			<a href="#" class="btn-activate"></a>
			</div>
			</li>
			<li><a class="btn-delete" href="#"></a></li>
          </ul>
          <div class="sort">
            <strong>
			<?php
			if($_REQUEST['action'])
			{
			?>
           <?php echo $msg;?>
             <!-- <li><a class="select-none" href="#">None</a>,</li>
              <li><a class="select-suspended" href="#">Suspended</a>,</li>
              <li><a class="select-active" href="#">Active</a></li>-->

			<?php
			}
			?>
			</strong>
          </div>
        </div>
      </div>
    </div>
</div>
<hr />
<?php
while($data=mysql_fetch_array($rs))
{

$rs_user=$user->uniq_user_list('user_id',$data['user_id']);
$data_user=mysql_fetch_array($rs_user);
?>
        <div class="tweet_bx1"> <input type="radio" id="gigs_action" name="gigs_action" value="<?php echo $data['id']; ?>" onclick="getvalue(this.value);" /><a href="users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>">

		 <img src="gigsimg/<?php
if($data['gigs_image'])
echo $data['gigs_image'];
else echo 'no_img.jpg';
 ?>" height="72" width="101"  /></a>
          <div class="tweet_bx_left">
            <p> <b><span style="cursor:pointer;" onclick="javascript:location.href='users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>'">I will
              <?php  echo  $data['gigs_title'];?>
              for <?php echo SITE_AMMOUNT;?>.</span></b> <br />
              <?php  echo substr($data['gigs_description'],0,50);?>
              ... <?php echo "[".$data['gigs_status']."]"; ?><br />
            </p>
            <div class="tweet_bx_b">
              <div class="list-controllers">
                <ul class="gig-controls">
                  <li><a href="#" class="pshare share-link"></a></li>
                  <li class="p-share" style="display: block;">
                  <a href="#" onClick="openCenteredWindow('http://www.facebook.com/sharer.php?u=<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/users_<?php echo $data_user['user_name']; ?>_gigs_<?php echo str_replace(' ','-', $data['gigs_title']); ?>');"><img alt="Btn-facebook" src="images/btn-facebook.png" /></a>
				    	<a href="http://www.twitter.com/?status=<?php echo $data_user['user_name']; ?>:<?php  echo str_replace(' ','+', $data['gigs_title']);?>+<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>" target="_blank" title="post to twitter"><img alt="Btn-twitter" src="images/btn-twitter.png"></a>
  	<a href="mailto:<?php echo $data_user['user_primary_email']; ?>?subject=<?php  echo str_replace(' ','%20', $data['gigs_title']);?>&amp;body=Hi,%0A%0ACheck%20it%20out:%20<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>" target="_blank" title="send by email"><img alt="Btn-email" src="images/btn-email.png"></a></li>
                  </li>
                </ul>
              </div>
            </div>
          </div><div ><!--<a href="featured.php?id=<?php echo $data['id'];?>&f=<?php echo $data['gigs_featured'];?>" >Featured</a>=<?php echo $data['gigs_featured'];?>--></div><br />

          <div class="btn"><a class="btn-edit" href="edit_gigs.php?id=<?php  echo $data['id'];?>"></a></div>

        </div>

        <?php

}



?>
        <div class="tweet_bx">
          <div class="tweet_bx_left"></div>
        </div>
      </div>
      <?php include('profile_right.php'); ?>
    </div>
    <div class="body_cont_bottom"> </div>
  </div>
  <?php
include('footer.php');
 ?>
</div>
</body>
</html>
