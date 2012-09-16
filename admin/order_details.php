<?php
include_once('config/db_conn.php');
include_once('db_config/db_gigs.php');
include_once('db_config/db_order_payment.php');
include_once('db_config/db_user.php');
$user=new user();
$order_payment =new order_payment();
$rs_order=$order_payment->uniq_order_payment_list('order_id',$_REQUEST['id']);

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
<div id="a">
    	
  <div id="wrapper">
            <div id="content">
                <div id="box">
                	<h3>Orders Details </h3>
                	<table width="100%">
						
						<tbody>
							
							<?php
							$i=0;
							while($data_order=mysql_fetch_array($rs_order))
							{
							
							?>
								<tr>
									<td width="16%">Name </td>
									<td width="84%"><a href="#"><?php echo $data_order['first_name'].' '.$data_order['last_name']; ?> </a></td>
									
								</tr>	
								<tr>
								<td>Payer Email  </td>
									<td><?php echo $data_order['payer_email']; ?></td>
								</tr>
								<tr>	
								<td>Payement Status </td>
									<td><?php echo $data_order['payment_status']; ?></td>
								</tr>
								<tr>
								<td>Payer Id </td>
									<td><?php echo $data_order['payer_id']; ?></td>
								</tr>
								<tr>
								<td>Transaction Subject</td>
									<td><?php echo $data_order['transaction_subject']; ?></td>
								</tr>
								<tr>
								<td>Item Name </td>
									<td><?php echo shortDescription($data_order['item_name'],30); ?></td>
								</tr>
								<tr>
								<td>Item Name </td>
									<td><?php echo shortDescription($data_order['item_name'],30); ?></td>
								</tr>
								<tr>
								<td>Payment Type </td>
									<td><?php echo shortDescription($data_order['payment_type'],30); ?></td>
								</tr>	
								<tr>
								<td>Receiver Mail </td>
									<td><?php echo shortDescription($data_order['receiver_email'],30); ?></td>
								</tr>
								<tr>
								<td>Merchant Return Link </td>
									<td><?php echo shortDescription($data_order['merchant_return_link'],30); ?></td>
								</tr>
								<tr>
								<td>Payement Date</td>
									<td><?php echo shortDescription($data_order['payment_date'],30); ?></td>
								</tr>	
								<tr>
								<td>Buyer Name</td>
									<td><?php 
									
									$rs_buyer=$user->uniq_user_list('user_id',$data_order['buyer_id']);
									$data_buyer=mysql_fetch_array($rs_buyer);
									echo $data_buyer['user_name']; ?></td>
								</tr>
								<tr>
								<td>Seller Name</td>
									<td><?php 
									$rs_seller=$user->uniq_user_list('user_id',$data_order['seller_id']);
									$data_seller=mysql_fetch_array($rs_seller);
									echo $data_seller['user_name']; ?></td>
								</tr>
							<?php
							$i++;
							}
							?>
						</tbody>
					</table>
              </div>
                <br />
                
            </div>
           
      </div>
</div>
</body>
</html>
