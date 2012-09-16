<?php
include_once('db_config/db_catagory.php');
$catagory=new catagory();
$rs=$catagory->catagory_list();
$i=0;			
					
?><?php

include_once('db_config/db_recommend.php');
$recommend =new recommend();
$rs_recommend=$recommend->recommend_list();
?>
<div class="right_cont">
<div class="social_bk" style="border-bottom:0px;height:35px;">
<!-- AddToAny BEGIN -->
<a class="a2a_dd" href="http://www.addtoany.com/share_save?linkurl=http://<?php echo $_SERVER['HTTP_HOST']?>&amp;linkname="><img src="http://static.addtoany.com/buttons/share_save_256_24.png" width="256" height="24" border="0" alt="Share/Bookmark"/></a>
<script type="text/javascript">
var a2a_config = a2a_config || {};
a2a_config.linkurl = "http://<?php echo $_SERVER['HTTP_HOST']?>";
</script>
<script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->


<script  type="text/javascript">
	function popup(){
		window.open('tell_a_friend.php', 'tellafriend_script',
		'scrollbars=1,statusbar=1,resizable=1,width=400,height=510');
	}
</script>



</div>
<p>
<!-- <img align="middle" src="images/img.jpg" />
<a href="#"> <img src="images/invite.jpg" /></a> -->
<a href="http://www.twitter.com/<?php echo SITE_NAME; ?>" target="_blank"><img src="images/twit.png" /></a><br/>
<a href="http://www.facebook.com" target="_blank"><img src="images/facebookish.png" /></a>

</p>
<div class="right_box">
<div class="right_box_top">
</div>
<div class="right_box_center">
<p><table width="200" align="center" bgcolor="#FFFFFF" style="border:1px solid #5499de;" border="0" cellspacing="0" cellpadding="0">
   <form method="get" id="" enctype="multipart/form-data" action="search.php">
  <tr>
    <td width="3%"></td>
    <td width="77%"><input type="text" style="width:152px; border:1px solid #ffffff; height:30px;" name="query"  value="<?php if($query) echo $query; else echo 'Search'; ?>" onFocus="if(this.value=='Search') this.value=''" onBlur="if(this.value=='') this.value='Search'"  /></td>
    <td width="18%"><input type="image" src="images/ic24.jpg" /></td>
    <td width="2%">&nbsp;</td>
  </tr>
   </form>
</table>

 </p>
<ul>
<?php
while($data=mysql_fetch_array($rs))
{

?>
<li><a href="catagory.php?id=<?php  echo $data['catagory_id'];?>"><?php  echo $data['catagory_name'];?></a> </li>

<?php
}
?>
</ul>
</div>
<div class="right_box_bottom">
</div>
</div>
<div class="right_box">

<img align="middle" src="images/img.jpg" />
<a href="javascript:popup()"> <img align="middle" src="images/invite.jpg" style="padding-left:32px;" /></a>

</div>
<div class="right_box">
<div class="right_box_top_a">
</div>
<div class="right_box_center_a">


<table width="90%" align="center" border="0" cellspacing="0" cellpadding="0">
  <form action="add_recommend.php" method="get">
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:19px; border-bottom:1px dashed #cdcccb; "><em>Recommended ! </em></td>
  </tr>
  <tr>
    <td>.</td>
  </tr>

  <tr>
    <td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#295d40; font-weight:bold;">I want someone<br />

to do....</td>
  </tr>
  <tr>
    <td height="11"></td>
  </tr>
  
  <tr>
    <td><textarea name="textarea" style="width:190px; height:84px; border:1px solid #c17b21;"> </textarea> </td>
  </tr>
 
  <tr>
    <td>
	<table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="22%">&nbsp;</td>
    <td width="35%"><strong>for <?php echo SITE_AMMOUNT;?></strong></td>
    <td width="43%">
	 <?php
if($_SESSION['username_email']!='')
{
?>
	<input type="image" src="images/bt7.jpg" />
	<?php
	}
	else
	{
	?>
	<img src="images/bt7.jpg" onclick="javascript:alert('Please Login First');" style="cursor:pointer;"/>
	<?php
	}
	?>
	</td>
  </tr>
</table>
</td>
  </tr>
  </form>
  <?php
							$i=0;
							while($data_recommend=mysql_fetch_array($rs_recommend))
							{
							
							?>
  <tr>
    <td><strong><?php echo ucfirst($data_recommend['recommend_by'])." "; ?></strong><strong> wants:</strong><br />
<?php echo $data_recommend['recommend_value']; ?></td>
  </tr>
   <?php
							$i++;
							}
							?>
  
</table>

</div>
<div class="right_box_bottom_a">
</div>
</div>
</div>