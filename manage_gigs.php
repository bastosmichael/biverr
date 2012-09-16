<?php
session_start();
			include_once('config/db_conn.php');
			include_once('db_config/db_catagory.php');
			include_once('db_config/db_user.php');
			include_once('db_config/db_gigs.php');
			$catagory=new catagory();
			$rs=$catagory->catagory_list();
			$user=new user();
			$rs_user=$user->user_list();
			$i=0;	
?>
<?php
if($_REQUEST['gigs_title']!='')
{
	$gigs_title= $_REQUEST['gigs_title'];
}
if($_REQUEST['submit'])
{
$c=0;
	if($_REQUEST['gigs_title']=='')
	{
		$err_msg_title="<li>Title can't be blank.</li>";
		
	}
	
	if($_REQUEST['gigs_description']=='')
	{
		$err_msg_description="<li>Description can't be blank</li>";
		
	}
	if($_REQUEST['catagory_id']=='')
	{
		$err_msg_catagory="<li>Category id must be selected for this gig.</li>";
		
	}
	if($_REQUEST['gigs_keywords_tags']=='')
	{
		$err_msg_keywords="<li>Tag list must contain at least 3 tags.</li>";
		
	}
	if($_FILES['gigs_image']['name']=='')
	{
		$err_msg_image="<li>Photo must be set.</li>";
		
	}
	
	else
	{
		$gigs=array();
		$gigs['gigs_date']=date('y-m-d h:i:s');
		$gigs['gigs_title']=$_REQUEST['gigs_title'];
		$gigs['catagory_id']=$_REQUEST['catagory_id'];
		$gigs['user_id']=$_SESSION['user_id'];
		$gigs['gigs_description']=$_REQUEST['gigs_description'];
		$gigs['gigs_keywords_tags']=$_REQUEST['gigs_keywords_tags'];
		$gigs['gigs_maxi_days_to_comp']=$_REQUEST['gigs_maxi_days_to_comp'];
		$gigs['gigs_image']=date("ymdhi").$_FILES['gigs_image']['name'];
		$gigs_obj=new gigs();
		$rs_gigs=$gigs_obj->datainsert('ninerr_gigs',$gigs);
		$fileName=$_FILES['gigs_image']['name'];
		$fileSize='2000';
		$fileTempName=$_FILES['gigs_image']['tmp_name'];
		$folderPath='gigsimg';
		$oldfileName='';
		fileUpload($fileName,$oldfileName,$fileSize,$fileTempName,$folderPath,$maxSize=5242880);
		reDirect('user_gigs.php');
	}
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

<script type="text/javascript">

/*var msg_box ="You dont have permission to copy";
function dis_rightclickIE(){
	if (navigator.appName == 'Microsoft Internet Explorer' && (event.button == 2 || event.button == 3))
		alert(msg_box)
}

function dis_rightclickNS(e){
	if ((document.layers||document.getElementById&&!document.all) && (e.which==2||e.which==3))
	{
	alert(msg_box)
	return false;
	}
}
if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=dis_rightclickNS;
}
else if (document.all&&!document.getElementById){
document.onmousedown=dis_rightclickIE;
}
document.oncontextmenu=new Function("alert(msg_box);return false")*/
</script>
<!-- Script by hscripts.com -->

</head>
<body  ondragstart="return false" onselectstart="return false">
<div id="container">
  <!--HEADER AREA-->
  <?php include('header.php')?>
  <!--HEADER AREA END-->
  <div class="body_cont">
    <div class="body_cont_top"> </div>
    <div class="body_cont_center">
      <div class="left_cont">
        <div class="tweet_bx">
          <form method="post" id="" enctype="multipart/form-data" class="gigs-form" action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#D1EAF9" >
              <tr height="40" bgcolor="#D1EAF9" >
                <td width="1%">&nbsp;</td>
                <td align="right"><span class="style1">I will </span></td>
                <td width="63%"><input type="text" value="<?php echo $gigs_title; ?>" size="30" name="gigs_title" id="gigs_title" class="text-title"></td>
                <td width="19%"><span class="style1">for <?php echo SITE_AMMOUNT;?></span></td>
              </tr>
		 
 <tr class="edit-gig-form-errors"  >
                <td width="1%">&nbsp;</td>
              
                <td colspan="3"> <div id="errorExplanation" >
  <!--<h2> errors prohibited this gig from being saved</h2>-->
  
  <ul>
    <?php echo $err_msg_image; ?>
    <?php echo $err_msg_title; ?>
    <!--Title is too short (minimum is 8 characters)-->
    <?php echo $err_msg_description; ?>
<!--    Expected duration can't be blank
    Expected duration is not a number-->
    <?php echo $err_msg_catagory; ?>
    <?php echo $err_msg_keywords; ?>
  </ul>
</div> </td>
              </tr>
              <tr height="40">
                <td width="1%">&nbsp;</td>
                <td width="17%"><strong>Catagory</strong></td>
                <td colspan="2"><select name="catagory_id" id="catagory_id" class="categoryselection">
				<option value="">Please select</option>
				<?php
				while($data=mysql_fetch_array($rs))
				{
				
				?>
				    
                    <option value="<?php  echo $data['catagory_id'];?>"><?php  echo $data['catagory_name'];?></option>
                   
				
				<?php
				}
				?>	
                  </select></td>
              </tr>
              <tr height="200">
                <td width="1%">&nbsp;</td>
                <td><strong> Description </strong><br />
                  Be as descriptive as possible.
                  
                  Provide samples, what is required, what you will and will not do
                  
                  Define the extents of this gig - how many units, revisions, samples are included</td>
                <td colspan="2" style="padding-left:6px;"><textarea  name="gigs_description" id="profile_description" rows="5" cols="25" class="textarea"><?php echo $_REQUEST['gigs_description']; ?></textarea></td>
              </tr>
			   <tr height="140"  >
                <td width="1%">&nbsp;</td>
                <td align="right">
<strong>Keywords/Tags</strong> Enter keywords that best describe your gig.

Example: "social marketing stickers promotion"</td>
                <td width="63%"><input type="text" value="<?php echo $_REQUEST['gigs_keywords_tags']; ?>" size="30" name="gigs_keywords_tags" id="gigs_title" class="text-keyword"></td>
                <td width="19%">&nbsp;</td>
              </tr>
              <tr height="40" valign="top">
                <td width="1%">&nbsp;</td>
                <td><strong>Maximum Days To Complete</strong></td>
                <td colspan="2"><input type="text" value="<?php echo $_REQUEST['gigs_maxi_days_to_comp']; ?>" size="30" name="gigs_maxi_days_to_comp" id="gigs_maxi_days_to_comp" class="text-very-small">
                  <table width="65%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>The longest time it will take you to complete your work<br />
                        <br />
                        Consider:  time to accept the order, timezone differences, the free time you have  for this work and correspondence with your buyers<br />
                        <br />
                        Late deliveries are the #1 reason for order cancellations</td>
                    </tr>
                  </table></td>
              </tr>
              <tr height="40">
                <td width="1%">&nbsp;</td>
                <td align="right"><strong>Gig Image</strong> </td>
                <td colspan="2"><input type="file" value="" size="30" name="gigs_image" id="gig_Image" class="browsefile"></td>
              </tr>
              <tr height="40">
                <td width="1%">&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="2" align="center"><input type="image" src="images/btn-2-save.png" name="submit" value="submit" class="btn-update" alt="Update"></td>
              </tr>
            </table>
          </form>
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
