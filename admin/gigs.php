<?php
include_once('config/db_conn.php');
include_once('db_config/db_gigs.php');
include_once('db_config/db_user.php');
$user=new user();
$gigs=new gigs();
$rs_gigs=$gigs->gigs_list();

if(isset($_REQUEST['id']))
{
$gigs->delete($_REQUEST['id']);
//Echo "Gig Deleted!! <a href=\"gigs.php\">Go Back</a>";
reDirect('gigs.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gigs - Admin </title>
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
                            	<th width="35"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
                            	<th width="89"><a href="#">Gigs Title</a></th>
								<th width="80"><a href="#">Gigs Keyword</a></th>
                                <th width="57"><a href="#">Gigs By</a></th>
                                <th width="145"><a href="#">Gigs Description [short]</a></th>
                                <th width="86"><a href="#">User Image</a></th>
								<th width="127"><a href="#">Click to Featured</a></th>
								<th width="54"><a href="#">Featured</a></th>
								<th width="54"><a href="#">Action </a></th>
                            </tr>
						</thead>
						<tbody>
							
							<?php
							$i=0;
							while($data_gigs=mysql_fetch_array($rs_gigs))
							{
							$rs_user=$user->uniq_user_list('user_id',$data_gigs['user_id']);
							$data_user=mysql_fetch_array($rs_user);
							?>
								<tr>
									<td class="a-center"><?php echo $i+1; ?></td>
									<td><a href="#"><?php echo $data_gigs['gigs_title']; ?></a></td>
									<td><?php echo $data_gigs['gigs_keywords_tags']; ?></td>
									<td><?php echo $data_user['user_name']; ?></td>
									<td><?php echo shortDescription($data_gigs['gigs_description'],50); ?></td>
									<td><img  src="../gigsimg/<?php echo $data_gigs['gigs_image']; ?>" height="70" width="70" /></td>
									<td><a href="featured.php?id=<?php echo $data_gigs['id'];?>&f=<?php echo $data_gigs['gigs_featured'];?>" >
									
									 Click to Make Featured
									
									</a><?php //echo $data_gigs['gigs_featured'];?></td>
									<td><?php echo $data_gigs['gigs_featured'];?></td>
									<td><a href="#"></a><a href="#"></a><a href="#"><img src="img/icons/user_delete.png" title="Delete user" width="16" height="16"  onclick="javascript: confirmDelete('gigs.php?id=<?php  echo $data_gigs['id'];?>')"/></a></td>
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
