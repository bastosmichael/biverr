<?php
session_start();
			include_once('config/db_conn.php');
			include_once('db_config/db_catagory.php');
			include_once('db_config/db_user.php');
			include_once('db_config/db_admin.php');
			
			$admin=new admin();
			$rs_admin=$admin->admin_list();

			$data_admin=mysql_fetch_array($rs_admin);
			$data_admin['user_email'];
			if($_REQUEST['submit'])
			{
			###############################################################
						/*Mail Part */
			###############################################################
			$to_mail=$data_admin['user_email'];
		
				$subject =$_REQUEST['subject'];
				
					$mail_table = '
				<table width="600" border="0">
				  
				  <tr>
					<td width="94" align="left">Message</td>
					<td width="13" align="left">:</td>
					<td width="479" align="center">'.$_REQUEST['message'].'</td>
				  </tr>
				  <tr>
					<td width="94" align="left">Order</td>
				    <td width="13" align="left">:</td>
				    <td width="479" align="left">'.$_REQUEST['order_id'].'</td>
				  </tr>
				  <tr>
					<td width="94" align="left">Name</td>
				    <td width="13" align="left">:</td>
				    <td width="479" align="left">'.$_REQUEST['name'].'</td>
				  </tr>
				  
				
				</table>';
					
					
					$headers  = "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$headers.="To: ".$to_mail."\r\n";
					$headers.="From: User <".$_REQUEST['email'].">\r\n";
					@mail($to_mail, $subject, $mail_table, $headers);


			
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
		<form action="" method="post" name="compose" >
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
              <tr height="40">
                <td width="1%" align="center"><h2><strong>Contact <?php echo SITE_NAME; ?></strong></h2></td>
              </tr>
			   <tr height="40">
                <td width="1%" align="left"><div class="compose-form">
          
          <div class="row">
            <label for="Subject">Subject</label>
            <select name="subject" id="contact_us_subject"><option value="">Select...</option>
<option value="Account problem / unblock">Account problem / unblock</option>
<option value="Report misuse, spam or bad behavior">Report misuse, spam or bad behavior</option>
<option value="Conflict with seller or buyer">Conflict with seller or buyer</option>
<option value="Seller Not Responding">Seller Not Responding</option>
<option value="Buyer Not Responding">Buyer Not Responding</option>
<option value="Request new features">Request new features</option>
<option value="Media and Press">Media and Press</option>
<option value="Partners or Investors">Partners or Investors</option>
<option value="Other...">Other...</option></select>
          </div>
          <div class="row">
            <label for="Order__">Order #</label>
            
              <input type="text" name="order_id" id="contact_us_order_id" class="txt">
            
          </div>
          <div class="row">
            <label for="Name">Name</label>
            <input type="text" name="name" id="contact_us_name" class="txt">
          </div>
          <div class="row">
            <label for="Email">Email</label>
            
              <input type="text" name="email" id="contact_us_email" class="txt">
            
          </div>
          <div class="row">
            <label for="Message">Message</label>
            <textarea rows="8" name="message" maxlength="400" id="contact_us_message" cols="75"></textarea>
          </div>
          <div class="row">
            <input type="submit" src="/images/btn-2-send.png?1280330784" value="Send" name="submit" class="button">
          </div>
        </div>
		
		</td>
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
