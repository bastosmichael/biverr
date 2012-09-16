<?php
include_once('config/db_conn.php');

include_once('db_config/db_admin_paypal_id.php');
$paypal=new paypal();
$rs_paypal=$paypal->paypal_list();
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
        <div id="top-panel"><div id="panel">
      <ul>
        <li><a href="update_paypal.php" class="useradd">Update  Paypal Id </a></li>
        </ul>
    </div>
            
      </div>
        <div id="wrapper">
            <div id="content">
                <div id="box">
                	<h3>Users</h3>
                	<table width="100%">
						<thead>
							<tr>
                            	<th width="146"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
                            	<th width="551"><a href="#">Paypal ID </a></th>
                            </tr>
						</thead>
						<tbody>
							
							<?php
							$i=0;
							while($data_paypal=mysql_fetch_array($rs_paypal))
							{
							
							?>
								<tr>
									<td class="a-center"><?php echo $i+1; ?></td>
									<td><a href="#"><?php echo $data_paypal['paypal_id']; ?></a></td>
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
