<?php
include_once('config/db_conn.php');
include_once('db_config/db_user.php');
$user=new user();
######################################
/*random*/
######################################

function assign_rand_value($num)
{
// accepts 1 - 36
  switch($num)
  {
    case "1":
     $rand_value = "a";
    break;
    case "2":
     $rand_value = "b";
    break;
    case "3":
     $rand_value = "c";
    break;
    case "4":
     $rand_value = "d";
    break;
    case "5":
     $rand_value = "e";
    break;
    case "6":
     $rand_value = "f";
    break;
    case "7":
     $rand_value = "g";
    break;
    case "8":
     $rand_value = "h";
    break;
    case "9":
     $rand_value = "i";
    break;
    case "10":
     $rand_value = "j";
    break;
    case "11":
     $rand_value = "k";
    break;
    case "12":
     $rand_value = "l";
    break;
    case "13":
     $rand_value = "m";
    break;
    case "14":
     $rand_value = "n";
    break;
    case "15":
     $rand_value = "o";
    break;
    case "16":
     $rand_value = "p";
    break;
    case "17":
     $rand_value = "q";
    break;
    case "18":
     $rand_value = "r";
    break;
    case "19":
     $rand_value = "s";
    break;
    case "20":
     $rand_value = "t";
    break;
    case "21":
     $rand_value = "u";
    break;
    case "22":
     $rand_value = "v";
    break;
    case "23":
     $rand_value = "w";
    break;
    case "24":
     $rand_value = "x";
    break;
    case "25":
     $rand_value = "y";
    break;
    case "26":
     $rand_value = "z";
    break;
    case "27":
     $rand_value = "0";
    break;
    case "28":
     $rand_value = "1";
    break;
    case "29":
     $rand_value = "2";
    break;
    case "30":
     $rand_value = "3";
    break;
    case "31":
     $rand_value = "4";
    break;
    case "32":
     $rand_value = "5";
    break;
    case "33":
     $rand_value = "6";
    break;
    case "34":
     $rand_value = "7";
    break;
    case "35":
     $rand_value = "8";
    break;
    case "36":
     $rand_value = "9";
    break;
  }
return $rand_value;
}
function get_rand_id($length)
{
  if($length>0)
  {
  $rand_id="";
   for($i=1; $i<=$length; $i++)
   {
   mt_srand((double)microtime() * 1000000);
   $num = mt_rand(1,36);
   $rand_id .= assign_rand_value($num);
   }
  }
return $rand_id;
}


#######################
$dataArray['user_primary_email']=$_REQUEST['user_primary_email'];
$dataArray['user_name']=$_REQUEST['user_name'];
$dataArray['user_password']=$_REQUEST['user_password'];
/*$dataArray['user_status']='Inactive';*/
$dataArray['user_activation_code']=get_rand_id(20);

$user->dataInsert('ninerr_user',$dataArray);

###############################################################
						/*Mail Part */
###############################################################
$to_mail=$dataArray['user_primary_email'];
$rand=$dataArray['user_activation_code'];
	$subject =ucfirst(SITE_NAME).': Registration Confirmation';

		$mail_table = '
	<table width="600" border="0">

	  <tr>
		<td width="600" align="center"><h3>Thank you for joining '.ucfirst(SITE_NAME).'!</h3></td>
	  </tr>
	  <tr>
		<td width="600" align="left">Please click here to confirm your email address.</td>
	  </tr>
	  <tr>
		<td width="600" align="left">If clicking the link above does not work, copy and paste the following URL in a new browser window instead.
</td>
	  </tr>
	  <tr>
		<td width="600" align="left">http://'.$_SERVER['HTTP_HOST'].'/activate.php?code='.$rand.'</td>
	  </tr>


	</table>';


		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers.="To: ".$to_mail."\r\n";
		$headers.="From: Administrator <noreply@<?php echo SITE_MAIL; ?>>\r\n";
		@mail($to_mail, $subject, $mail_table, $headers);










###############################################################
echo "<h1>Congratulations!! Your account has been created Please Check Your Mail!! and Sign In </h1>";
include('index.php');
//reDirect('index.php');
?>