<?php
session_start();

    if(isset($_POST['install']))
    {

       $valid= 0;
       $error = array();



       if(trim($_POST['dbhost']) == '')   {
         $error[] = 'Please fill in your database hostname';
         $valid= 1;

       }

        if(trim($_POST['dbname']) == '')     {
         $error[] = 'Please fill in your database name';
         $valid= 1;
       }

       if(trim($_POST['dbuser']) == '')     {
         $error[] = 'Please fill in your database username';
         $valid= 1;
       }

       if(trim($_POST['dbpassword']) == '')  {
         $error[]= 'Please fill in your database password';
         $valid= 1;
       }

       if(trim($_POST['dbprefix']) == '')   {
         $error[] = 'Please fill in your database prefix or leave the default prefix. The default prefix is vpx';
         $valid= 1;
       }
	    if(trim($_POST['sitename']) == '')   {
         $error[] = 'Please fill in your site name  ';
         $valid= 1;
       }
	    if(trim($_POST['admin_username']) == '')   {
         $error[] = 'Please fill in your Admin Password  ';
         $valid= 1;
       }
	   if(trim($_POST['admin_pass']) == '')   {
         $error[] = 'Please fill in your Admin Password  ';
         $valid= 1;
       }
        if(trim($_POST['admin_email']) == '')   {
         $error[] = 'Please fill in your Admin Email ';
         $valid= 1;
       }
	    if(trim($_POST['site_amt']) == '')   {
         $error[] = 'Please fill in your Site Ammount ';
         $valid= 1;
       }
	    if(trim($_POST['paypal_id']) == '')   {
         $error[] = 'Please fill in your PayPal Id ';
         $valid= 1;
       }


if($valid !=1)
  {
	include('sql.php');

$myFile = "../../config/config_global.php";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = '<?php
define ("DBHOST","'.$_POST['dbhost'].'");
define ("DBUSER","'.$_POST['dbuser'].'");
define ("DBPASS","'.$_POST['dbpassword'].'");
define ("DBNAME","'.$_POST['dbname'].'");

define ("DBPREFIX","ninerr_");
define ("CHAR_SET","utf8");
define ("CACHEDIR","");
define ("SITE_AMMOUNT","'.$_POST['site_amt'].'");
define ("COMMISSION_AMMOUNT","1");
define ("SITE_NAME","'.$_POST['sitename'].'");
define ("SITE_TITLE",ucfirst(SITE_NAME)." Marketplace Script | Fiverr Clone | Fiverr Clone Script");
?>';
fwrite($fh, $stringData);

fclose($fh);
$myFile1 = "../../admin/config/config_global.php";
$fh1 = fopen($myFile1, 'w') or die("can't open file");
$stringData1 = '<?php
define ("DBHOST","'.$_POST['dbhost'].'");
define ("DBUSER","'.$_POST['dbuser'].'");
define ("DBPASS","'.$_POST['dbpassword'].'");
define ("DBNAME","'.$_POST['dbname'].'");

define ("DBPREFIX","ninerr_");
define ("CHAR_SET","utf8");
define ("CACHEDIR","");
define ("SITE_AMMOUNT","$9");
define ("COMMISSION_AMMOUNT","1");
define ("SITE_NAME","'.$_POST['sitename'].'");
define ("SITE_TITLE",ucfirst(SITE_NAME)." Marketplace Script | Fiverr Clone | Fiverr Clone Script");
?>';
fwrite($fh1, $stringData1);

fclose($fh1);


header('Location:./step_two.php');
 exit;
 }
}



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>INSTALLATION</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="../javascript/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="../javascript/thickbox.js"></script>
<link rel="stylesheet" href="../javascript/thickbox.css" type="text/css" media="screen" />



<style type="text/css">
BODY { padding: 0; margin: 0; font: 0.7em Tahoma, Arial, sans-serif; line-height: 1.6em; background-color: #3D3D3D; color: #000000; text-align: center;}

#content { margin: 30px 30px 30px 30px; width: auto;  text-align: left; background: #FFFFFF;
         padding: 10px 10px 10px 10px; }




div.response_alert {
background-color: #FFFF99;
border-width: 1px;
border-color: #FFFF33;
border-style: solid;
padding: 2px 2px 2px 2px;
-moz-border-radius: 4px;
}

span.text {
color: #000000;
font-size:11px;
font-family: Tahoma;
font-weight:normal;
}

div.greybox {
background-color: #F7F7F7;
border-width: 1px;
border-color: #D6D5D6;
border-style: solid;
padding: 4px 4px 4px 4px;
margin: 2px 7px 2px 7px;
-moz-border-radius: 4px;
}

div.whitebox {
background-color: #FFFFFF;
border-width: 1px;
border-color: #D6D5D6;
border-style: solid;
padding: 4px 4px 4px 4px;
margin: 2px 7px 2px 7px;
-moz-border-radius: 4px;
}

div.response_error {
background-color: #ffeaea;
border-width: 1px;
border-color: #e82a2a;
border-style: solid;
padding: 2px 2px 2px 2px;
-moz-border-radius: 4px;
}

div.response_success {
background-color: #eaffea;
border-width: 1px;
border-color: #4dda2c;
border-style: solid;
padding: 2px 2px 2px 2px;
-moz-border-radius: 4px;
}

#dhtmltooltip{
position: absolute;
width: 150px;
border: 2px solid black;
padding: 2px;
background-color: lightyellow;
visibility: hidden;
z-index: 100;
/*Remove below line to remove shadow. Below line should always appear last within this CSS*/
filter: progid:DXImageTransform.Microsoft.Shadow(color=gray,direction=135);
}




</style>


<script>

//"Accept terms" form submission- By Dynamic Drive
//For full source code and more DHTML scripts, visit http://www.dynamicdrive.com
//This credit MUST stay intact for use

var checkobj

function agreesubmit(el){
checkobj=el
if (document.all||document.getElementById){
for (i=0;i<checkobj.form.length;i++){  //hunt down submit button
var tempobj=checkobj.form.elements[i]
if(tempobj.type.toLowerCase()=="submit")
tempobj.disabled=!checkobj.checked
}
}
}

function defaultagree(el){
if (!document.all&&!document.getElementById){
if (window.checkobj&&checkobj.checked)
return true
else{
alert("Please read/accept terms to submit form")
return false
}
}
}



</script>





</head>

<body>
<div id="dhtmltooltip"></div>
 <script src="../javascript/tooltip.js" type="text/javascript"></script>




<div id="content">








   <div class="whitebox">

  <?php if($valid ==1)
  {

    echo '<div class="response_error">';
    foreach($error as $error) {

     echo '<span class="text_bold">'.$error.'</span><br/>';

    }

    echo '</div>';



  }

  ?>






     <form method="post" action="" name="install" onSubmit="return defaultagree2(this)">
    <table width="81%">




    <tr><td><a href="#" onMouseover="ddrivetip('Required. Indicate your Database Host. For example localhost')"; onMouseout="hideddrivetip()" ><img src="images/help.gif" border="0"></a> <span class="text">Database Host</span></td><td> <input type="text" class="input_default" name="dbhost" value="localhost"></td></tr>
    <tr><td><a href="#" onMouseover="ddrivetip('Required. Indicate your Database Name. This is the name you used when you created the new database.')"; onMouseout="hideddrivetip()" ><img src="images/help.gif" border="0"></a>  <span class="text">Database Name</span> </td><td> <input type="text" class="input_default" name="dbname" value="dbname"></td></tr>
    <tr><td><a href="#" onMouseover="ddrivetip('Required. Indicate your Database Username.')"; onMouseout="hideddrivetip()" ><img src="images/help.gif" border="0"></a> <span class="text">Database Username</span> </td><td> <input type="text" class="input_default" name="dbuser" value="dbuser"></td></tr>
    <tr><td><a href="#" onMouseover="ddrivetip('Required. Indicate your Database Password.')"; onMouseout="hideddrivetip()" ><img src="images/help.gif" border="0"></a> <span class="text">Database Password</span> </td><td> <input type="password" class="input_default" name="dbpassword" value="dbpass"></td></tr>
	 <tr>
	   <td><a href="#" onMouseover="ddrivetip('Required. Indicate your Database Password.')"; onMouseout="hideddrivetip()" ><img src="images/help.gif" border="0"></a> <span class="text">Site Name </span> </td>
	   <td> <input type="text" class="input_default" name="sitename" value="My Biverr Site"></td></tr>
	   <tr>
	   <td><a href="#" onMouseover="ddrivetip('Required. Indicate your Database Password.')"; onMouseout="hideddrivetip()" ><img src="images/help.gif" border="0"></a>Admin Username </td>
	   <td> <input type="text" class="input_default" name="admin_username" value="admin"></td></tr>
	   <tr>
	   <td><a href="#" onMouseover="ddrivetip('Required. Indicate your Database Password.')"; onMouseout="hideddrivetip()" ><img src="images/help.gif" border="0"></a>Admin Password <span class="text"></span> </td>
	   <td> <input type="password" class="input_default" name="admin_pass" value="password"></td></tr>

	   <tr>
	   <td><a href="#" onMouseover="ddrivetip('Required. Indicate your Database Password.')"; onMouseout="hideddrivetip()" ><img src="images/help.gif" border="0"></a>Admin Email </td>
	   <td> <input type="text" class="input_default" name="admin_email" value="admin@yoursite.com"></td></tr>

	   <tr>
	   <td><a href="#" onMouseover="ddrivetip('Required. Indicate your Database Password.')"; onMouseout="hideddrivetip()" ><img src="images/help.gif" border="0"></a>Site Ammount (Ex 5 , or 10) </td>
	   <td> <input type="text" class="input_default" name="site_amt" value="10">$</td></tr>

	    <tr>
	   <td><a href="#" onMouseover="ddrivetip('Required. Indicate your Database Password.')"; onMouseout="hideddrivetip()" ><img src="images/help.gif" border="0"></a>Your PayPal Id </td>
	   <td> <input type="text" class="input_default" name="paypal_id" value="jackpotsoft@gmail.com"></td></tr>
    <tr><td colspan="2">
	<input type="hidden" class="input_default" name="dbprefix" value="ninerr"> </td>
    </tr>
<!--    <tr><td></td><td><input name="agreecheck" type="checkbox" onClick="agreesubmit(this)"> I agree to the license terms</td></tr>-->
    <tr><td> </td><td> <input type="submit" class="" name="install" value="SUBMIT" ></td></tr>



    </td>
    </tr>
    </table>

     </form>

     <script>
//change two names below to your form's names
document.forms.install.agreecheck.checked=false

</script>


    </div>
    <br><br><br>






</div>
</body>
</html>