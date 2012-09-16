<?php
include_once('config/db_conn.php');
include_once('db_config/db_admin_paypal_id.php');
$paypal=new paypal();
$rs_paypal=$paypal->uniq_paypal_list('id',1);
$data_paypal=mysql_fetch_array($rs_paypal);

if($_REQUEST['submit'])
{
	$table='ninerr_admin_paypal_id';
	$paypal_id=$_REQUEST['paypal_id'];
	$dataArray=array("paypal_id"=>$paypal_id);
	$fldArray=array("id"=>1);
	$paypal->dataUpdate($table,$dataArray,$fldArray);
	reDirect('paypal_desc.php');
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Orders - Admin</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
</head>
<body>
<div id="container">
  <?php
		include_once('header.php');
		?>
  <div id="top-panel">
    <div id="panel">
      <ul>
        <li><a href="#adduser" class="useradd">Add catagory </a> </li>
        <li><a href="#" class="search">Find catagory</a></li>
      </ul>
    </div>
  </div>
  <div id="wrapper">
    <div id="content">
      <div id="box">
       
        <div id="box">
                	<h3 id="adduser">Add user</h3>
                    <form id="form" action="" method="post">
                      <fieldset id="personal">
                        <legend>PAYPAL INFORMATION</legend>
                        <label for="paypal_id">Paypal Id :</label> 
                        <input name="paypal_id" id="paypal_id" type="text" tabindex="1" value="<?php echo $data_paypal['paypal_id']; ?>" />
                        <br />
                       
                       
                      </fieldset>
                      
                      
                      <div align="center">
                        <input name="submit" type="submit" id="button1" value="Update" />
                     
                      </div>
                    </form>

        </div>
      </div>
      <br />
    </div>
    <?php
			include_once('right.php');
			?>
  </div>
  <?php
		include_once('footer.php');
		?>
</div>
</body>
</html>
