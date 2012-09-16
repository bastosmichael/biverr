<?php



require_once('config/db_conn.php');
include_once('db_config/db_gigs.php');
include_once('db_config/db_user.php');
//debug
//ini_set('display_errors', 1);
//ini_set('log_errors', 1);
//ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
//error_reporting(E_ALL);
//debug



$user=new user();
$rs_user=$user->user_list();


if(isset($_REQUEST['id']))
{
	$user->delete($_REQUEST['id']);
echo "User deleted!! <a href=\"users.php\" >Back</a>";

		include_once('users.php');
	reDirect('users.php');
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Orders - Admin </title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script>
   var StyleFile = "theme" + document.cookie.charAt(6) + ".css";
   document.writeln('<link rel="stylesheet" type="text/css" href="css/' + StyleFile + '">');
</script>
<script>
function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete")) {
    document.location = delUrl;
  }
}
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
            
      </div>
        <div id="wrapper">
            <div id="content">
                <div id="box">
                	<h3>Users</h3>
                	<table width="100%">
						<thead>
							<tr>
                            	<th width="40px"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
                            	<th><a href="#">Full Name</a></th>
                                <th><a href="#">Email</a></th>
                                <th width="70px"><a href="#">User Name</a></th>
                                <th width="50px"><a href="#">User Description</a></th>
                                <th width="90px"><a href="#">User Image</a></th>
                                <th width="60px"><a href="#">Action</a></th>
                            </tr>
						</thead>
						<tbody>
							
							<?php
							$i=0;
							while($data_user=mysql_fetch_array($rs_user))
							{
							
							?>
								<tr>
									<td class="a-center"><?php echo $i+1; ?></td>
									<td><a href="#"><?php echo $data_user['user_fullname']; ?></a></td>
									<td><?php echo $data_user['user_primary_email']; ?></td>
									<td><?php echo $data_user['user_name']; ?></td>
									<td><?php echo shortDescription($data_user['user_desc'],50); ?></td>
<?php
if($data_user['user_image']=='')
{
$data_user['user_image']="nouser.gif";
}
?>

									<td><img  src="../userimg/<?php echo $data_user['user_image']; ?>" height="70" width="70" /></td>
									<td><a href="#"></a><a href="#"></a><a href="#"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" onclick="javascript: confirmDelete('users.php?id=<?php  echo $data_user['user_id'];?>')" /></a></td>
								</tr>
								
							<?php
							$i++;
							}
							?>
						</tbody>
					</table>
                    <div id="pager">
                   	    | Total <strong><?php echo $i; ?></strong> records found                    </div>
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
