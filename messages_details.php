<?php
session_start();
include_once('config/db_conn.php');
include_once('db_config/db_user.php');
include_once('db_config/db_gigs.php');
include_once('db_config/db_sentmail.php');
include_once('db_config/db_inbox.php');
$sentmail=new sentmail();
$inboxmail=new inbox();
$to=trim($_REQUEST['to'],' ');
$gig_id=$_REQUEST['gig_id'];
$user=new user();


$rs_user=$user->uniq_user_list('user_id',$_SESSION['user_id']);
$data_user=mysql_fetch_array($rs_user);

$rs_user_tomail=$user->uniq_user_list('user_name',$to);
$data_user_tomail=mysql_fetch_array($rs_user_tomail);


$gigs_obj=new gigs();
$rs_gigs=$gigs_obj->uniq_gigs_list('id',$gig_id);
$data_gigs=mysql_fetch_array($rs_gigs);

if($_REQUEST['submit'])
{
	
	$data_senmail=array();
	
	
		$data_senmail['gigs_id']=$gig_id;
		$data_senmail['to_id']=$data_user_tomail['user_id'];
		
		$data_senmail['from_id']=$_SESSION['user_id'];
		
		$data_senmail['sub']=$_REQUEST['subject'];
		$data_senmail['body']=$_REQUEST['body'];
		$data_senmail['attachment']=$_FILES['attachment']['name'];
		$data_senmail['date_time']=date('y-m-d h:i:s');
		
	
		$sentmail->dataInsert('ninerr_sentmail',$data_senmail);
	
		$data_inbox['gigs_id']=$gig_id;
		
		$data_inbox['from_id']=$data_user_tomail['user_id'];
		
		
		$data_inbox['to_id']=$_SESSION['user_id'];
		
		
		$data_inbox['sub']=$_REQUEST['subject'];
		$data_inbox['body']=$_REQUEST['body'];
		$data_inbox['attachment']=$_FILES['attachment']['name'];
		$data_inbox['date_time']=date('y-m-d h:i:s');
	
		$inboxmail->dataInsert('ninerr_inbox',$data_inbox);
		reDirect('messages.php');
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
<style type="text/css">
<!--
.style2 {color: #2791B9}
.style3 {color: #000000}
-->
</style>
</head>
<body >
<div id="container">
<!--HEADER AREA-->
<?php include('header.php')?>
  <!--HEADER AREA END-->
  <div class="body_cont">
    <div class="body_cont_top"> </div>
    <div class="body_cont_center">
      <div class="left_cont">
        <div class="tweet_bx">
          <form method="post" id="edit_user" enctype="multipart/form-data"  action="">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr height="40">
                <td width="2%">&nbsp;</td>
                <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="80%">&nbsp;</td>
                      <td width="20%"><span class="style2"><strong>Inbox</strong> </span></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><span class="style2"><strong>Sent Items</strong></span> </td>
                    </tr>
                  </table></td>
              </tr>
              <tr height="40">
                <td>&nbsp;</td>
                <td width="11%" height="13"><strong>From</strong>:</td>
                <td width="87%"><?php echo $data_user['user_name']; ?></td>
              </tr>
              <tr height="40">
                <td>&nbsp;</td>
                <td height="17"><strong>To</strong>:</td>
                <td><a href="users_<?php echo $to;?>_gigs_<?php  echo str_replace(' ','-', $data_gigs['gigs_title']);?>"><?php echo $to;?></a></td>
              </tr>
              <tr height="40">
                <td>&nbsp;</td>
                <td height="13"><strong>Gig</strong>:</td>
                <td><a href="users_<?php echo $to;?>_gigs_<?php  echo str_replace(' ','-', $data_gigs['gigs_title']);?>"><?php echo $data_gigs['gigs_title']; ?></a></td>
              </tr>
              <tr height="40">
                <td>&nbsp;</td>
                <td><strong>Order</strong>#:</td>
                <td></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="settings-form" bgcolor="#EFFAFF" >
              <tr height="40">
                <td width="1%">&nbsp;</td>
                <td width="19%"><strong>Subject</strong></td>
                <td width="80%">&nbsp;</td>
              </tr>
              <tr height="200">
                <td width="1%">&nbsp;</td>
                <td><strong>Message</strong></td>
                <td style="padding-left:6px;">&nbsp;</td>
              </tr>
              <tr height="40">
                <td width="1%">&nbsp;</td>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr height="40">
                <td width="1%">&nbsp;</td>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr height="40">
                <td width="1%">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right">&nbsp;</td>
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
