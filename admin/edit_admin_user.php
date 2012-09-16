<?php
include_once('config/db_conn.php');
include_once('db_config/db_gigs.php');
include_once('db_config/db_cms.php');
$cid=$_REQUEST['cid'];
$cms =new cms();
$rs_cms=$cms->uniq_cms_list("id",$cid);
if($_REQUEST['submit'])
{
	$table='ninerr_cms';
	$dataArray=array("cms_content"=>$_REQUEST['cms_content']);
	$fldArray=array("id"=>$_REQUEST['id']);
	$cms->dataUpdate($table,$dataArray,$fldArray);
	reDirect('cms.php');
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
        <li></li>
      </ul>
    </div>
  </div>
  <div id="wrapper">
    <div id="content">
      <div id="box">
       
        <div id="box">
                	<h3 id="adduser">Edit Admin </h3>
					<?php
					$data_cms=mysql_fetch_array($rs_cms);
					
					?>
                    <form id="form" action="" method="post">
                      <fieldset id="personal">
                        <legend>Admin INFORMATION</legend>
                     
                        <input name="id" id="id" type="hidden" tabindex="1" value="<?php echo $data_cms['id']; ?>" />
                       
                        CMS Description  : 
						
                        <input type="text" name="cms_content" id="textarea" >
                        <br />
                       
                      </fieldset>
                      
                      
                      <div align="center">
                        <input name="submit" type="submit" id="button1" value="Submit" />
                        <input id="button2" type="reset" />
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
