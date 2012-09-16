<?php
session_start();

			include_once('config/db_conn.php');
			include_once('db_config/db_gigs.php');
			include_once('db_config/db_catagory.php');
			include_once('db_config/db_user.php');
			include_once('db_config/db_review.php');
			$user=new user();
			$review=new review();
			$arr_var= explode('_',$_REQUEST['title']);
			
			$gigs_title=str_replace('-',' ',$arr_var[3]);
		
			$gigs=new gigs();
			$rs_gigs=$gigs->uniq_gigs_list('gigs_title',$gigs_title);
			$i=0;			
			$data=mysql_fetch_array($rs_gigs);
			$catagory=new catagory();
			$rs_catagory=$catagory->uniq_catagory_list('catagory_id',$data['catagory_id']);	
			$data_catagory=mysql_fetch_array($rs_catagory);
			$rs_cat_gigs=$gigs->uniq_gigs_list('catagory_id',$data['catagory_id']);
			$rs_others_gigs=$gigs->uniq_gigs_list('user_id',$data['user_id']);
			$rs_uniq_user=$user->uniq_user_list('user_id',$data['user_id']);
			$data_uniq_user=mysql_fetch_array($rs_uniq_user);
           


if($_REQUEST['gigs_title']!='')
{
	$gigs_title= $_REQUEST['gigs_title'];
}
if($_REQUEST['submit'])
{
	$gigs_title=$_REQUEST['gigs_title'];
	$gig_category_id=$_REQUEST['gig_category_id'];
	$gigs_title=$_REQUEST['gigs_description'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />



<title><?php

echo $data_uniq_user['user_name']; ?> will <?php echo $gigs_title;?> for <?php echo SITE_AMMOUNT;?> : <?php echo SITE_TITLE ;?>

</title>
<meta name="description" content="<?php echo $data_uniq_user['user_name']; ?> will <?php echo $gigs_title;?> for <?php echo SITE_AMMOUNT;?> : <?php echo SITE_TITLE ;?> ,<?php echo $data['gigs_description']; ?>" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="javascript/jquery.min.js"></script>
<script type="text/javascript" src="javascript/jquery.simplemodal.js"></script>
<script type="text/javascript" src="javascript/init.js"></script>
<script type="text/javascript" src="javascript/init1.js"></script>
<link type='text/css' href='css/stylesheet.css' rel='stylesheet' media='screen' />
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
<style type="text/css">
<!--
.style3 {font-weight: bold; font-size: 14px;}
.style4 {font-size: 12px}
.style5 {font-size: 12px; color: #000066; }
.style6 {color: #00CCFF}
.style7 {
	color: #0066FF;
	font-size: 12px;
}
-->
</style>
</head>
<body>
<div id="container">
  <!--HEADER AREA-->

<!--
<div style="position:relative; left: 492px; top: 160px;">
<a href="#" id="login_link"><span> 
--><?php
	//echo 'Sign In';

?>
<!--</span></a></div>
-->

  <?php include('header.php')?>
  
  <!--HEADER AREA END-->
  <div class="body_cont">
    <div class="body_cont_top"> </div>
    <div class="body_cont_center">
      <div class="left_cont">
	  <div class="center_box_cont">

	  <h2> <img class="uimage" width="100" height="100" src="userimg/<?php 
if($data_uniq_user['user_image'])
echo $data_uniq_user['user_image'];
else echo 'no-user.gif';
 ?>" style="float:left; margin-right:10px;" /><?php echo $data_uniq_user['user_name'] ?>: I will <?php echo $data['gigs_title']; ?> for <?php echo SITE_AMMOUNT;?>.</h2>

	 <!-- <form method="post" action="https://www.paypal.com/cgi-bin/webscr">
         <form method="post" action="https://www.paypal.com/cgi-bin/webscr">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="<?php echo SITE_MAIL;?>">
            <input type="hidden" name="lc" value="US">
			<input type="hidden" name="amount" value="<?php echo SITE_AMMOUNT;?>">
			<input type="hidden" name="item_number" value="1">
            <input type="hidden" name="item_name" value="<?php echo $data['gigs_title']; ?>">
            <input type="hidden" name="currency_code" value="USD">
    

           <input class="order-now-g" type="image" src="images/btn-2-order-orange.png"  border="0" onclick="javascript:location.href='order_progress.php'" name="submit" alt="Contribute"> 
          </form>-->
		  <?php
if($_SESSION['username_email']!='')
{
?>
	  <a class="order-now-g"  onclick="javascript:location.href='order_progress.php?title=<?php echo $_REQUEST['title'];?>'" >order now</a>
	  
	  <?php
	  }
	  else
	  {
	  ?>
		<a class="order-now-g"  onclick="javascript:alert('Please login first !')" style="padding-top:22px;" >order now</a>
		<?php
		}
		?>
		<div style="clear:both;"></div>
	   <p class="gig-desc" style="padding-left:70px;">In: <b><a href="/catagory.php?id=<?php echo $data['catagory_id']; ?>"><?php echo $data_catagory['catagory_name'] ?></a></b> . Work Duration:<strong><?php echo $data['gigs_maxi_days_to_comp']; ?> days</strong></p><p class="style3"><a href="new_messages.php?gig_id=<?php echo $data['id']; ?>&amp;to=<?php echo $data_uniq_user['user_name'] ?>" class="style5">Contact Seller</a></p>
	   <br /> 
	  
	   <span class="style4"></span>		<br />
		<br />
		<div style="position:relative;" class="center_box_cont_b">
	  <ul class="fly_txt">
		<?php
		$arr=explode(',',$data['gigs_keywords_tags']);
		
		$count=count($arr);
		for($i=0;$i<$count;$i++)
		{
		?>
	  
	  <li><a href="index.php?tags=<?php echo $arr[$i];?>"><?php echo $arr[$i];?></a></li>
	  <?php
	  }
	  ?>
	  </ul>
	  <!--Featured Gigs-->
	  <?php
	  if($data['gigs_featured']=='Y')
	  {
	  ?>
	  <div class="tag_img">	  </div>
	  <?php
	  }
	  ?>
	  <img style="float:right; clear:right;" src="gigsimg/<?php echo $data['gigs_image']; ?>" width="380" height="265" />
	 
	  <div style="width:200px; float:left; margin:auto; padding:0px;" class="gig-desc">
	<?php echo $data['gigs_description']; ?>
	  </div>
	  </div>  <div style="clear:both;"></div>
	  <?php
	   $rs_review_list_by=$review->uniq_review_list("gigs_id",$data['id']); 
	   $data_review_list=mysql_fetch_array($rs_review_list_by);
	   	$rs_uniq_review_user=$user->uniq_user_list('user_id',$data_review_list['review_by']);
		 $data_review_user=mysql_fetch_array($rs_uniq_review_user);
	  ?>
	  <div style="height:50px;"></div>
	  <?php
	  if($data_review_user['user_name'])
	  {
	  ?>
	  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="feedback">
	  
	<tr>
    <td colspan="2"><h3>Buyers Feedback</h3></td>
    </tr>  
  <tr>
    <td width="6%" rowspan="2" align="center"><img src="images/good.png"  /></td>
    <td width="94%" height="45"><span class="style6"><span class="style4"><strong><?php  echo $data_review_user['user_name']?></strong>
      </span>
      
     </span>      </td>
  </tr>
  <tr>
    <td><?php  echo $data_review_list['review_msg']?></td>
  </tr>
   <tr height="100">
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<?php
}
?>
	  <div class="comment_box">
	  
	  
	 <div class="comment_cont">
	  <h2> 
Related Gigs1</h2>
<?php
	while($data_cat_gigs=mysql_fetch_array($rs_cat_gigs))
{
$rs_user=$user->uniq_user_list('user_id',$data_cat_gigs['user_id']);
$data_user=mysql_fetch_array($rs_user);

	?>
	 
	  <div style="width:50px; height:50px; border:3px solid #FFFFFF; float:left;"  class="small_ic">
	
<img src="gigsimg/<?php 
if($data_cat_gigs['gigs_image'])
echo $data_cat_gigs['gigs_image'];
else echo 'no_img.jpg';
 ?>" height="50" width="50" onclick="javascript:location.href='users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data_cat_gigs['gigs_title']);?>'" style="cursor:pointer;"  />
	  </div>
	  <div class="comment_post"> <span style="cursor:pointer;" onclick="javascript:location.href='users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data_cat_gigs['gigs_title']);?>'">I will <?php  echo  $data_cat_gigs['gigs_title'];?> for <?php echo SITE_AMMOUNT;?>.</span>
	  </div>
	  
	  
	  
	 
	<?php
	
	}
	?>
	</div>
	
	   <div class="comment_cont">
	  <h2> 

Other gigs by <?php echo $data_uniq_user['user_name'] ?></h2>
<?php
	while($data_others_gigs=mysql_fetch_array($rs_others_gigs))
{
$rs_user=$user->uniq_user_list('user_id',$data_others_gigs['user_id']);
$data_user=mysql_fetch_array($rs_user);

	?>
	 
	  <div style="width:50px; height:50px; border:3px solid #FFFFFF; float:left;"  class="small_ic"><span class="small_ic" style="width:50px; height:50px; border:3px solid #FFFFFF; float:left;"><img src="gigsimg/<?php 
if($data_others_gigs['gigs_image'])
echo $data_others_gigs['gigs_image'];
else echo 'no_img.jpg';
 ?>" height="50" width="50" onclick="javascript:location.href='users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data_others_gigs['gigs_title']);?>'" style="cursor:pointer;" /></span></div>
	  <div class="comment_post"> <span style="cursor:pointer;" onclick="javascript:location.href='users_<?php echo $data_user['user_name']; ?>_gigs_<?php  echo str_replace(' ','-', $data_others_gigs['gigs_title']);?>'">I will <?php  echo  $data_others_gigs['gigs_title'];?> for <?php echo SITE_AMMOUNT;?>.</span>
	  </div>
	  
	  
	  
	 
	<?php
	
	}
	?>
	</div>
	  
	  </div>
	  </div>
       
      </div>
      <?php include('right.php'); ?>
    </div>
    <div class="body_cont_bottom"> </div>
  </div>
  <?php
include('footer.php');
 ?>
</div>
</body>
</html>