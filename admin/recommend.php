<?php
include_once('config/db_conn.php');

include_once('db_config/db_recommend.php');
$recommend =new recommend();
$rs_recommend=$recommend->recommend_list();
if($_REQUEST['id'])
{
	$recommend->delete_list($_REQUEST['id']);
	reDirect('recommend.php');
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
        <li></li>
      </ul>
    </div>
  </div>
  <div id="wrapper">
    <div id="content">
      <div id="box">
        <h3>Recommend</h3>
        <table width="100%">
          <thead>
            <tr>
              <th width="74"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
              <th width="244"><a href="#">Gigs Recommend </a></th>
			  <th width="272"><a href="#">Gigs Recommend By</a></th>
              <th width="99"><a href="#">Action</a></th>
            </tr>
          </thead>
          <tbody>
            <?php
							$i=0;
							while($data_recommend=mysql_fetch_array($rs_recommend))
							{
							
							?>
            <tr>
              <td class="a-center"><?php echo $i+1; ?></td>
              <td><a href="#"><?php echo $data_recommend['recommend_value']; ?></a></td>
			   <td><a href="#"><?php echo $data_recommend['recommend_by']; ?></a></td>
              <td><a href="#"></a><a href="#"></a><a href="#"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16" onclick="javascript: confirmDelete('recommend.php?id=<?php  echo $data_recommend['id'];?>')" /></a></td>
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
