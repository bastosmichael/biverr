<?php
include_once('config/db_conn.php');
include_once('db_config/db_gigs.php');
include_once('db_config/db_catagory.php');
$catagory =new catagory();
$rs_catagory=$catagory->catagory_list();
if($_REQUEST['id'])
{
	$catagory->delete_list($_REQUEST['id']);
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
    <div id="panel">
      <ul>
        <li><a href="add_catagory.php" class="useradd">Add catagory </a> </li>
      </ul>
    </div>
  </div>
  <div id="wrapper">
    <div id="content">
      <div id="box">
        <h3>Catagory</h3>
        <table width="100%">
          <thead>
            <tr>
              <th width="44"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
              <th width="165"><a href="#">Catagory Name</a></th>
              <th width="343"><a href="#">Catagory Description</a></th>
              <th width="74"><a href="#">Catagory Status</a></th>
              <th width="59"><a href="#">Action</a></th>
             
            </tr>
          </thead>
          <tbody>
            <?php
							$i=0;
							while($data_catagory=mysql_fetch_array($rs_catagory))
							{
							
							?>
            <tr>
              <td class="a-center"><?php echo $i+1; ?></td>
              <td><a href="#"><?php echo $data_catagory['catagory_name']; ?></a></td>
              <td><?php echo $data_catagory['catagory_description']; ?></td>
              <td><?php echo $data_catagory['catagory_status']; ?></td>
             
              <td><a href="#"></a><a href="edit_catagory.php?cid=<?php echo $data_catagory['catagory_id']; ?>"><img src="img/icons/page_white_edit.png"  title="Edit" width="16" height="16" /></a><a href="#"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" onclick="javascript: confirmDelete('catagory.php?id=<?php  echo $data_catagory['catagory_id'];?>')" /></a></td>
            </tr>
            <?php
							$i++;
							}
							?>
          </tbody>
        </table>
        <div id="pager">  Total <strong><?php echo $i; ?></strong> records found </div>
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
