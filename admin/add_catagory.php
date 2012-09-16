<?php
include_once('config/db_conn.php');
include_once('db_config/db_gigs.php');
include_once('db_config/db_catagory.php');
$catagory =new catagory();
$rs_catagory=$catagory->catagory_list();


if($_REQUEST['submit'])
{
	$table='ninerr_catagory';
	$catagory_name=$_REQUEST['catagory_name'];
	$catagory_description=$_REQUEST['catagory_description'];
	$dataArray=array("catagory_name"=>$catagory_name,"catagory_description"=>$catagory_description);
	$catagory->dataInsert($table,$dataArray);
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
                        <legend>CATEGORY INFORMATION</legend>
                        <label for="lastname">Category Name : </label> 
                        <input name="catagory_name" id="catagory_name" type="text" tabindex="1" />
                        <br />
                        <label for="firstname">Category Description  : </label>
						
                        <textarea name="catagory_description" id="textarea" ></textarea>
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
