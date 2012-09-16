<?php
//Biverr:The Awesome Fiverr Clone
//V 1.3
//Dated:Aug 12 2010
//
session_start();
include_once('config/db_conn.php');
if(file_exists("install/install_biverr/index.php"))
{

	reDirect('install/install_biverr/index.php');
}
?>
<?php
		
		include_once('db_config/db_gigs.php');
		include_once('db_config/db_user.php');
		$user=new user();		
		$gigs=new gigs();
		
		/*For  Pagination */
		
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
		$page = ($page == 0 ? 1 : $page);
		$perpage = 10;//limit in each page
		$startpoint = ($page * $perpage) - $perpage;
	

		/*---------------*/
		
				
/*		$gigs_data['gigs_title'] = '';
		$gigs_data['catagory_id'] = '';
		$fldArray['catagory_id'] = '';
		$orderArray['catagory_id'] = '';
		$orderArray['gigs_title'] = '';
		$extra=' ';
		$orderType='desc';
		$offset=0;
		$limit=20;
		$gigs->dataSelect('ninerr_gigs',$gigs_data,$fldArray,$extra,$orderArray,$orderType,$limit,$offset);*/
		
		
		//$rs=$gigs->gigs_list();
		if($_REQUEST['tags']!='')
		{
			$rs=$gigs->uniq_gigs_list_limit_like('gigs_keywords_tags',$_REQUEST['tags'],$startpoint,$perpage);
		}
		elseif($_REQUEST['gigs']=='latest')
		{
			$rs=$gigs->uniq_gigs_list_orderby('gigs_date','ASC','user_id!',$_SESSION['user_id'],$startpoint,$perpage);
			$class1='link_select';
		}
		elseif($_REQUEST['gigs']=='rating')
		{
			$rs=$gigs->uniq_gigs_list_limit('gigs_rate','10',$startpoint,$perpage);
			$class3='link_select';
		}
		elseif($_REQUEST['gigs']=='popular')
		{
			$rs=$gigs->uniq_gigs_list_limit('gigs_like','Like',$startpoint,$perpage);
			$class2='link_select';
			
		}
		else
		{
			$rs=$gigs->uniq_gigs_list_limit('user_id!',$_SESSION['user_id'],$startpoint,$perpage);
			
		}
		$i=0;    
		       
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo SITE_TITLE ;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" name="powered by: www.Biverr.com" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="javascript/jquery.min.js"></script>
<script type="text/javascript" src="javascript/jquery.simplemodal.js"></script>
<script type="text/javascript" src="javascript/init.js"></script>
<script type="text/javascript" src="javascript/init1.js"></script>
<script src="javascript/main.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="javascript/ajax.js"></script>
<script language="javascript" type="text/javascript">

	function like_click(str,id)
	{
		//document.getElementById("search_div").innerHTML='';
		loadFragmentInToElement('gigs_like_update.php?id='+id+'&val='+str,'search_div'+id,'');
	
			
	}
	
	
</script>
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
<link type='text/css' href='css/bfooter.css' rel='stylesheet' media='screen' />
<link rel="stylesheet" type="text/css" href="css/style1.css" />
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
<h1>
</h1>
<?php
if($_SESSION['username_email']!='')
{
?>
<div class="tweet_bx">
  <div class="tweet_gig_bx_left">
   <form method="post" id="create_gigs" enctype="multipart/form-data"  action="manage_gigs.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0"  >
  <tr height="40" >
	<td width="9%" class="style1">I will </td>
	<td width="53%" align="right"><input type="text" value="" size="30" name="gigs_title" id="gigs_title" class="text-title"></td>
	<td width="11%" class="style1">for <?php echo SITE_AMMOUNT;?></td>
	<td width="27%"><input type="image" src="images/btn-2-continue-gray.png" style="border:none;" class="btn-update" alt="Update"></td>
  </tr>                        
</table>
</form>
</div>
</div>

<?php
}
?>
<div class="tweet_bx">
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="17%"><strong>Filter gigs by</strong></td>
	<td class="<?php echo $class1;  ?>" width="8%" align="center" ><a class="cuuuent" href="index.php?gigs=latest" >Latest</a></td>
	<td class="<?php echo $class2;  ?>" width="15%" align="center"><a href="index.php?gigs=popular">Most Popular</a></td>
	<td class="<?php echo $class3;  ?>" width="15%" align="center"><a href="index.php?gigs=rating" >Best Ratings</a></td>
	<td  width="45%" align="center">&nbsp;</td>
  </tr>
</table>
</div>
<?php

while($data=mysql_fetch_array($rs))
{
	 
$rs_user=$user->uniq_user_list('user_id',$data['user_id']);
$data_user=mysql_fetch_array($rs_user);
?>
<div style="position:relative;" class="tweet_bx">
<a href="users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>">
	  <!----Featured User---->
	  <?php
	  if($data['gigs_featured']=='Y')
	  {
	  ?>
	  
	  <div class="tag_img_a">	  </div>
	  <?php
	  }
	  ?>
	  
	  <!--End of Featured User-->
<img src="gigsimg/<?php 
if($data['gigs_image'])
echo $data['gigs_image'];
else echo 'no_img.jpg';
 ?>" height="72" width="101"  /> </a>
<div class="tweet_bx_left">
<p> 
<b><span style="cursor:pointer;" onclick="javascript:location.href='users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>'">I will <?php  echo  $data['gigs_title'];?> for <?php echo SITE_AMMOUNT;?>.</span></b> <br />

<?php  echo substr($data['gigs_description'],0,50);?>... (by <?php echo $data_user['user_name']; ?>)<br />
</p>
<div class="tweet_bx_b">
<i> <a href="users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>">Read more</a></i>
<?php
if($_SESSION['username_email']!='')
{
?>
	<div id="search_div<?php echo $data['id'];?>">
	<?php
	if($data['gigs_like']=='Like' && $data['gigs_like_user_id']==$_SESSION['user_id'] )
	{

	?>
	<img src="images/like.gif"  title="Like" onclick="like_click('n',<?php echo $data['id'];?>)" id="like" />
	<?php
	}
	else
	{
	
	?>
	
	<img src="images/unlike.gif"  title="Unlike" onclick="like_click('y',<?php echo $data['id'];?>)" id="like" />
	<?php
	}
	?>
	</div>
<?php
}
?>

<img src="images/tw_brd.jpg" /><div class="list-controllers">
              <ul class="gig-controls">
                <li><a href="#" class="pshare share-link">Share</a></li>
                <li class="p-share" style="display: none;">
  	<a href="#" onClick="openCenteredWindow('http://www.facebook.com/sharer.php?u=<?php echo 'http://'.$_SERVER['HTTP_HOST'];?>/users_<?php echo $data_user['user_name']; ?>_gigs_<?php echo str_replace(' ','-', $data['gigs_title']); ?>');"><img alt="Btn-facebook" src="images/btn-facebook.png" /></a>
  	<a href="http://www.twitter.com/?status=<?php echo $data_user['user_name']; ?>:<?php  echo str_replace(' ','+', $data['gigs_title']);?>+<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>" target="_blank" title="post to twitter"><img alt="Btn-twitter" src="images/btn-twitter.png"></a>
  	<a href="mailto:<?php echo $data_user['user_primary_email']; ?>?subject=<?php  echo str_replace(' ','%20', $data['gigs_title']);?>&amp;body=Hi,%0A%0ACheck%20it%20out:%20<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>" target="_blank" title="send by email"><img alt="Btn-email" src="images/btn-email.png"></a></li>
</li>                
              </ul>
</div>
</div>
</div>

<div class="btn"><a href="users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data['gigs_title']);?>">
<img src="images/or_bt.jpg" /></a></div>
</div>
<?php

}
?>
<div class="tweet_bx">
<?php


	//show pages
	
	if($_REQUEST['gigs']=='latest')
	{
		$page_name='index.php?gigs=latest&';
	}
	elseif($_REQUEST['gigs']=='rating')
	{
		$page_name='index.php?gigs=rating&';
	}
	elseif($_REQUEST['gigs']=='popular')
	{
		$page_name='index.php?gigs=popular&';
		
	}
	elseif($_REQUEST['tags']!='')
	{
		$page_name='index.php?tags='.$_REQUEST['tags'].'&';
	}
	else
	{
		$page_name='index.php?';
	}
	
	echo Pages("ninerr_gigs",$perpage,$page_name,$_SESSION['user_id']);
	
	
?>

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