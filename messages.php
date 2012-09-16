<?php
session_start();
include_once('config/db_conn.php');
include_once('db_config/db_user.php');
include_once('db_config/db_gigs.php');
include_once('db_config/db_sentmail.php');
include_once('db_config/db_inbox.php');

$sentmail=new sentmail();
$inboxmail=new inbox();

$to=$_REQUEST['to'];
$gig_id=$_REQUEST['gig_id'];
$user=new user();

$rs_user=$user->uniq_user_list('user_id',$_SESSION['user_id']);
$data_user=mysql_fetch_array($rs_user);

$rs_user_tomail=$user->uniq_user_list('user_name','sandip');
$data_user_tomail=mysql_fetch_array($rs_user_tomail);

//echo $data_user_tomail['user_primary_email'];

$gigs_obj=new gigs();
$rs_gigs=$gigs_obj->uniq_gigs_list('id',$gig_id);
$data_gigs=mysql_fetch_array($rs_gigs);


$rs_sentmail = $sentmail->uniq_sentmail_list('from_id',$_SESSION['user_id']);
$rs_inbox = $inboxmail->uniq_inbox_list('from_id',$_SESSION['user_id']);


if($_REQUEST['submit'])
{
	
	$data_senmail=array();
	
	
		$data_senmail['gigs_id']=$gig_id;
		$data_senmail['to']=$data_user_tomail['user_primary_email'];
		$data_senmail['from']=$data_user['user_primary_email'];
		$data_senmail['sub']=$_REQUEST['subject'];
		$data_senmail['body']=$_REQUEST['body'];
		$data_senmail['attachment']=$_FILES['attachment']['name'];
		$data_senmail['date_time']=date('y-m-d h:i:s');
		
	
	$sentmail->dataInsert('ninerr_sentmail',$data_senmail);
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
<script language="javascript" type="text/javascript" src="javascript/ajax.js"></script>
<link type='text/css' href='css/stylesheet.css' rel='stylesheet' media='screen' />
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
<script language="javascript" type="text/javascript">

	function read(val)
	{
		//document.getElementById("search_div").innerHTML='';
		loadFragmentInToElement('message_read_update.php?val='+val,'search_div','');
	
			
	}
	

	
</script>
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
<style type="text/css">

<!--

      .myNewStyle {

      font-family: Verdana, Arial, Helvetica, sans-serif;

      font-weight: bold;

      color: #000000;

      }

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
                      <td><span class="style1 style2">Inbox /<span class="style3">  All Messages</span></span></td>
                      <td><span class="style2"><a href="messages.php?mailbox=inbox" ><strong>Inbox</strong></a></span></td>
                    </tr>
                    <tr>
                      <td>Compose a new Hiverr message </td>
                      <td><span class="style2"><a href="messages.php?mailbox=sent" ><strong>Sent Items</strong></a></span> </td>
                    </tr>
                  </table></td>
              </tr>
               <tr height="40">
                <td width="2%">&nbsp;</td>
                <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                   
					<?php
					if($_REQUEST['mailbox']=='sent')
					{
					?>
					 <tr bgcolor="#DBF3FF" height="30">
                      <td colspan="2"><strong>Subject / Gig</strong></td>
                      <td width="24%"> <strong>To</strong></td>
					  <td width="18%"> <strong>Date</strong></td>
                    </tr>
					<?php
					
						while($data_sentmail=mysql_fetch_array($rs_sentmail))
						{
						
						$rs_user_s=$user->uniq_user_list('user_id',$data_sentmail['to_id']);
						$data_user_s=mysql_fetch_array($rs_user_s);
					?>
					
						<tr height="30">
						  <td colspan="2" onclick="like_click()"> <?php echo $data_sentmail['sub']; ?></td>
						  <td><?php echo $data_user_s['user_name']; ?></td>
						  <td><?php echo $data_sentmail['date_time']; ?></td>
						</tr>
	                <?php
						
						}
					}	
					else
					{
					?>
					<tr bgcolor="#DBF3FF" height="30">
                      <td colspan="2"><strong>Subject / Gig</strong></td>
                      <td width="24%"> <strong>From</strong></td>
					  <td width="18%"> <strong>Date</strong></td>
                    </tr>
					<?php 
						while($data_inbox=mysql_fetch_array($rs_inbox))
						{		
						$rs_user_i=$user->uniq_user_list('user_id',$data_inbox['from_id']);
						$data_user_i=mysql_fetch_array($rs_user_i);					
					?>
					 
						<tr height="30">
						  <td colspan="2" class="
						 <?php 
						 if($data_inbox['read_status']=='N')
						 {
						 ?>
						  myNewStyle
						  
						  <?php
						  }
						  ?>
						  "  
						  style="cursor:pointer;"><div id="search_div"><?php echo $data_inbox['sub']; ?></div></td>
						  <td><?php echo $data_user_i['user_name']; ?></td>
						  <td><?php echo $data_inbox['date_time']; ?></td>
						</tr>
					<?php
						}
					}
					
					?>
                  </table></td>
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
