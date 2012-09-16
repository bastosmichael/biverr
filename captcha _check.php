<?php
session_start();
/*echo $_SESSION['security_number'];
exit;
header('location: index.php');*/
if($_SESSION['security_number']!=$_REQUEST['val'])
{
echo '<font color=red >invalid captcha</font>';

}
else
{
 	header('location: a.php');
}

?>