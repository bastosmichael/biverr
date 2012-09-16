<?php
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
<div class="tweet_bx"><h2>Your Order was Cancelled!!</h2></div>
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