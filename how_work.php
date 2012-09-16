<?php
session_start();
			include_once('config/db_conn.php');
			include_once('db_config/db_catagory.php');
			include_once('db_config/db_user.php');
			include_once('db_config/db_cms.php');
			$cms=new cms();
			$rs_cms=$cms->uniq_cms_list("id","1");
			$user=new user();
			$rs_user=$user->user_list();
			$i=0;	
			$data_cms=mysql_fetch_array($rs_cms);
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
            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F2FBFF" >
              <tr height="40">
                <td width="1%" align="center"><font size="+2" >How It's Work</font></td>
              </tr>
			   <tr height="40">
                <td width="1%" align="left"><?php
							echo $data_cms['cms_content'];
							?></td>
              </tr>
            </table>
         
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
