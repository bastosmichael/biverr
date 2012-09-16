<?php
session_start();
			include_once('config/db_conn.php');

                
?>

<html>
<SCRIPT LANGUAGE="JavaScript">
function fnSubmit() {
 window.document.frm_paypal.submit();
  return;
}


</SCRIPT>
<body>

		<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr" name="frm_paypal">
         <form method="post" action="https://www.paypal.com/cgi-bin/webscr">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="<?php echo $_REQUEST['email'];?>">
            <input type="hidden" name="lc" value="US">
			<input type="hidden" name="amount" value="<?php echo $_REQUEST['amt']; ?>">
			<input type="hidden" name="item_number" value="1">
			<input type="hidden" name="return" value="http://'.$_SERVER['HTTP_HOST'].'/ninerr/notify_paypal.php">
			<input type="hidden" name="cancel_return" value="http://www.google.co.in/">
			<input type="hidden" name="notify_url" value="http://www.google.co.in/c.php">
			<input type="hidden" name="shopping_url" value="http://www.ninner.com">
            <input type="hidden" name="currency_code" value="USD">
    
          </form>

</body>
</html>
