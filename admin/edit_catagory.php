<?php
include_once('config/db_conn.php');
include_once('db_config/db_gigs.php');
include_once('db_config/db_catagory.php');
$catagory =new catagory();
$cid=$_REQUEST['cid'];
$rs_catagory=$catagory->uniq_catagory_list("catagory_id",$cid);
if($_REQUEST['submit'])
{
	$table='ninerr_catagory';
	$dataArray=array("catagory_name"=>$_REQUEST['catagory_name']);
	$dataArray=array("catagory_description"=>$_REQUEST['catagory_description']);
	$dataArray=array("catagory_status"=>$_REQUEST['catagory_status']);
	$fldArray=array("catagory_id"=>$_REQUEST['id']);
	$catagory->dataUpdate($table,$dataArray,$fldArray);
	reDirect('catagory.php');
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
                	<h3 id="adduser">Edit Catagory </h3>
					<?php
					$data_catagory=mysql_fetch_array($rs_catagory);
					
					?>
                    <form id="form" action="" method="post">
                      <fieldset id="personal">
                        <legend>CATAGORY INFORMATION</legend>
                     
                        <input name="id" id="id" type="hidden" tabindex="1" value="<?php echo $data_catagory['catagory_id']; ?>" />
                       
                        Catagory  Name  : 
						
                        <input type="text" name="catagory_name" id="textarea" value="<?php echo $data_catagory['catagory_name']; ?>" >
                        <br />
                       Catagory Description  : 
						<textarea name="catagory_description" id="textarea" ><?php echo $data_catagory['catagory_description']; ?></textarea>
                        <br />
						Catagory Status  : 
						
                        <select name="catagory_status" >
						
						<option value="Active" <?php if($data_catagory['catagory_status']=='Active')echo 'selected';?> >
						Active
						</option>
						<option value="Inactive"  <?php if($data_catagory['catagory_status']=='Inactive')echo 'selected';?>>
						Inactive
						</option>
						
						</select>
						
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
