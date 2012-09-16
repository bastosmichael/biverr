<?php
session_start();
			$gigs_id=$_REQUEST['id'];
			
			include_once('config/db_conn.php');
			include_once('db_config/db_catagory.php');
			include_once('db_config/db_user.php');
			include_once('db_config/db_gigs.php');
			$gigs_obj=new gigs();
			$catagory=new catagory();
			$rs=$catagory->catagory_list();
			$user=new user();
			$rs_user=$user->user_list();
			
			$rs_gigs=$gigs_obj->uniq_gigs_list('id',$gigs_id);
			$data_gigs=mysql_fetch_array($rs_gigs);
			
			$i=0;	
?>
<?php
if($_REQUEST['gigs_title']!='')
{
	$gigs_title= $_REQUEST['gigs_title'];
}
if($_REQUEST['submit'])
{
	$gigs=array();
	$gigs['gigs_title']=$_REQUEST['gigs_title'];
	$gigs['catagory_id']=$_REQUEST['catagory_id'];
	$gigs['user_id']=$_SESSION['user_id'];
	$gigs['gigs_description']= htmlentities($_REQUEST['gigs_description'],ENT_QUOTES); 
	$gigs['gigs_keywords_tags']=$_REQUEST['gigs_keywords_tags'];
	$gigs['gigs_maxi_days_to_comp']=$_REQUEST['gigs_maxi_days_to_comp'];
	if($_FILES['gigs_image']['name']!='')
	{
		$gigs['gigs_image']=date("ymdhi").$_FILES['gigs_image']['name'];
	}
	$fldArray=array();
	$fldArray['id']=$gigs_id;
	
	$rs_gigs_edit=$gigs_obj->dataUpdate('ninerr_gigs',$gigs,$fldArray);
	
	//reDirect('edit_gigs.php?title='.str_replace(' ','-', $gigs_title).'');
	$fileName=$_FILES['gigs_image']['name'];
	if($fileName!='')
	{
		$fileSize='2000';
		$fileTempName=$_FILES['gigs_image']['tmp_name'];
		$folderPath='gigsimg';
		$oldfileName='';
		fileUpload($fileName,$oldfileName,$fileSize,$fileTempName,$folderPath,$maxSize=5242880);
	}
	reDirect('edit_gigs.php?id='.$gigs_id);
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
    <div class="body_cont_top"> </div>
    <div class="body_cont_center">
      <div class="left_cont">
        <div class="tweet_bx">
          <form method="post" id="" enctype="multipart/form-data" class="gigs-form" action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#C8FFB8" >
              <tr height="40" bgcolor="#77E24D" >
                <td width="1%">&nbsp;</td>
                <td align="right"><span class="style1">I will </span></td>
                <td width="63%"><input type="text" value="<?php  echo $data_gigs['gigs_title'];?>" size="30" name="gigs_title" id="gigs_title" class="text-title"></td>
                <td width="19%"><span class="style1">for <?php echo SITE_AMMOUNT;?></span></td>
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
				    
                    <option value="<?php  echo $data['catagory_id'];?>" <?php
					if($data_gigs['catagory_id']==$data['catagory_id'])
					{
						echo 'selected';
					
					}
					
					 ?> ><?php  echo $data['catagory_name'];?></option>
                   
				
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
                <td colspan="2" style="padding-left:6px;"><textarea  name="gigs_description" id="profile_description" rows="5" cols="25" class="textarea"><?php echo $data_gigs['gigs_description']; ?></textarea></td>
              </tr>
			   <tr height="140"  >
                <td width="1%">&nbsp;</td>
                <td align="right">
<strong>Keywords/Tags</strong> Enter keywords that best describe your gig.

Example: "social ,marketing, stickers, promotion"</td>
                <td width="63%"><input type="text" value="<?php echo $data_gigs['gigs_keywords_tags']; ?>" size="30" name="gigs_keywords_tags" id="gigs_title" class="text-keyword"></td>
                <td width="19%">&nbsp;</td>
              </tr>
              <tr height="40" valign="top">
                <td width="1%">&nbsp;</td>
                <td><strong>Maximum Days To Complete</strong></td>
                <td colspan="2"><input type="text" value="<?php echo $data_gigs['gigs_maxi_days_to_comp']; ?>" size="30" name="gigs_maxi_days_to_comp"  id="gigs_maxi_days_to_comp" class="text-very-small">
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
