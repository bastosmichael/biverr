<?php
include_once('config/db_conn.php');

include_once('db_config/db_user_transaction.php');
include_once('db_config/db_user.php');
$user=new user();
$trans =new trans();
$rs_trans=$trans->trans_list();

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
        <h3><?php echo "Payment :".$_REQUEST['req'];  ?></h3>
        <table width="100%">
          <thead>
            <tr>
              <th width="44"><a href="#">ID<img src="img/icons/arrow_down_mini.gif" width="16" height="16" align="absmiddle" /></a></th>
              <th width="165"><a href="#">User Name </a></th>
              <th width="210"><a href="#">Withdraw Request </a></th>
              <th width="207"><a href="#">Withdraw Request Ammount[$] </a></th>
              <th width="207"><a href="#">Request Date</a></th>
              <th width="59"><a href="#">Action toPay </a></th>
            </tr>
          </thead>
          <tbody>
            <?php
							$i=0;
							while($data_trans=mysql_fetch_array($rs_trans))
							{
							
							?>
            <tr>
              <td class="a-center"><?php echo $i+1; ?></td>
              <td><a href="#">
                <?php 
									$rs_user=$user->uniq_user_list('user_id',$data_trans['user_id']);
									$data_user=mysql_fetch_array($rs_user);
									echo $data_user['user_name']; ?>
                </a></td>
              <td><?php echo $data_trans['withdraw_request']; ?></td>
              <td><?php echo $data_trans['withdraw_request_ammount']; ?></td>
              <td><?php echo $data_trans['tran_date']; ?></td>
              <td><!--<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="frm_paypal">-->
                <form method="post" action="https://www.paypal.com/cgi-bin/webscr" name="frm_paypal">
                  <input type="hidden" name="cmd" value="_xclick">
                  <input type="hidden" name="business" value="<?php echo $data_user['user_paypal_account_email'] ?>">
                  <input type="hidden" name="lc" value="US">
                  <input type="hidden" name="amount" value="<?php echo $data_trans['withdraw_request_ammount'];?>">
                  <input type="hidden" name="item_number" value="1">
                  <input type="hidden" name="return" value="http://<?php echo $_SERVER['HTTP_HOST']?>/ninerr/admin/notify_paypal.php?user_id=<?php echo $data_trans['user_id'];?>">
                  <input type="hidden" name="cancel_return" value="http://www.google.co.in/">
                  <input type="hidden" name="notify_url" value="http://www.google.co.in/c.php">
                  <input type="hidden" name="shopping_url" value="http://www.ninner.com">
                  <input type="hidden" name="currency_code" value="USD">
				   <input type="hidden" name="item_name" value="Withdraw">
                  <input type="submit" name="pay" value="Pay $<?php echo $data_trans['withdraw_request_ammount'];?>"  style="cursor:pointer;" />
                </form></td>
            </tr>
            <?php
							$i++;
							}
							?>
          </tbody>
        </table>
        <div id="pager"> Total <strong><?php echo $i; ?></strong> records found </div>
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
