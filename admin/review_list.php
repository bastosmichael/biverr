<?php
include_once('config/db_conn.php');
include_once('db_config/db_gigs.php');
include_once('db_config/db_user.php');
include_once('db_config/db_review.php');
$user=new user();
$gigs=new gigs();
$review=new review();
$rs_review=$review->review_list();
if($_REQUEST['id'])
{
	$user->delete($_REQUEST['id']);
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
                            	<th><a href="#"> 	Shopp Orde Item </a></th>
                                <th><a href="#"> 	Review By </a></th>
                                <th width="70px"><a href="#"> 	Review To  </a></th>
                                <th width="50px"><a href="#">Review </a></th>
                              
                            </tr>
						</thead>
						<tbody>
							
							<?php
							$i=0;
							while($data_review=mysql_fetch_array($rs_review))
							{
							
							 $rs_gigs1=$gigs->uniq_gigs_list("id",$data_review['gigs_id']);
 							$data_gigs1=mysql_fetch_array($rs_gigs1);

							
							?>
								<tr>
									<td class="a-center"><?php echo $i+1; ?></td>
									<td><a href="#"><?php echo $data_gigs1['gigs_title']; ?></a></td>
									<td>
									
									<?php
									 $rs_user1=$user->uniq_user_list("user_id",$data_review['review_by']);
			  $data_user1=mysql_fetch_array($rs_user1);
			  echo $data_user1['user_name']."(".$data_user1['user_primary_email'].")";
									
									
									 ?></td>
									<td><?php
									 $rs_user1=$user->uniq_user_list("user_id",$data_review['review_to']);
			  $data_user1=mysql_fetch_array($rs_user1);
			  echo $data_user1['user_name']."(".$data_user1['user_primary_email'].")";
									
									
									 ?></td>
									<td><?php echo $data_review['review']; ?></td>
								
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
