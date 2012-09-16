<?php
	
	/******************************************************************************
     * Tell A Friend Script: 
	 * This script allows your visitors to sent invitation to their friends via email to visit your site.
	 *
	 * Usage: 
	 * The script comes with three files tell_a_friend.php, thankyou.html and install.txt
	 * You're NOT allowed to redistribute or sell this script.
	 * You are allowed to modify this script for your own personal use.	 
	 * Please see install.txt attached in the zip for installation instructions.
	 *
	 * Notes:
	 * If you like this script or used it for your website or project.
	 * Please remember too link back to www.php-learn-it.com. 
	 * Your help is always appreciated.
	 *
	 * author: webdev (php-learn-it.com (or phplearnit.com)
	 * Visit www.php-learn-it.com (or www.phplearnit.com) for more script and tutorials on PHP.
	 *****************************************************************************/

	//minimum characters allowed in the message box
	$msg_min_chars = "10";

	//maximum characters allowed in the message box
	$msg_max_chars = "250";
	
	$errors = array();

	function validate_form_items()
	{
	   global $msg_min_chars, $msg_max_chars;
	   $msg_chars = "{".$msg_min_chars.",".$msg_max_chars."}";

	   $form_items = array(
		   
		   "name"  => array(
						   "regex" => "/^([a-zA-Z '-]+)$/",
						   "error" => "Your name appears to be in improper format",
						   ),
			"email" => array(
						   "regex" =>
							"/^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$/",
						   "error" => "email address is invalid",
						   ),
		   "message" => array(
						   "regex" => "/.*/",
						   "error" => "Your message is either too short or exceeds $msg_max_chars characters",
						   ),
	   );

	   global $errors;
		
		if(!preg_match($form_items["name"]["regex"], $_POST["your_name"]))
			$errors[] = $form_items["name"]["error"];

		if(!preg_match($form_items["email"]["regex"], $_POST["your_email"]))
			$errors[] = "your ".$form_items["email"]["error"];

		if(!preg_match($form_items["email"]["regex"], $_POST["friend_email1"]))
			$errors[] = "Friend 1 ".$form_items["email"]["error"];

		if(strlen(trim($_POST["message"])) < $msg_min_chars || strlen(trim($_POST["message"])) >  $msg_max_chars )
			$errors[] = $form_items["message"]["error"];

		if(trim($_POST["friend_email2"]) != "")
		{
			if(!preg_match($form_items["email"]["regex"], $_POST["friend_email2"]))
				$errors[] = "Friend 2 ".$form_items["email"]["error"];
		}
		
		if(trim($_POST["friend_email3"]) != "")
		{
			if(!preg_match($form_items["email"]["regex"], $_POST["friend_email3"]))
				$errors[] = "Friend 3 ".$form_items["email"]["error"];
		}
		
	   return count($errors);
	}
	
	function email($from, $from_name, $to, $message)
	{
		//header("Location: thankyou.html");return;

		$headers .= "From: ".$from."\r\n";
		$headers .= "Content-type: text/plain; charset=ISO-8859-1";
		
		$your_domian_name = "www.yourdomain.com";
		//edit what you want your vistors to see in their email here
		$subject = $from_name." sent you an invitation to $your_domian_name";
		$your_message = "Hi!\r\n";
		$your_message.= ucfirst($from_name);
		$your_message.= " wants you to check out $your_domian_name\r\n";
		$your_message.= "Sender's Message:\n\r";

		$message=$your_message.stripslashes($message);

		if (mail($to,$subject,$message,$headers) ) {
			return true;
		} else {
			return false;
		}
	}

	function print_error($errors)
	{
		
		foreach($errors as $error)
		{
			$err.=$error."<br/>";
		}

		echo 
		 "<div style=\"border:1px red solid; font-size:14px; font-weight:normal; color:red; margin:10px; padding:10px;\">
			$err
		 <div>";
		
	}
	
	function form_process()
	{	
		$from_name = $_POST["your_name"];
		$from_email = $_POST["your_email"];
		
		$to = $_POST["your_email"].",".$_POST["friend_email1"].",".$_POST["friend_email2"].",".$_POST["friend_email3"];
		$message = $_POST["message"];
		
		$error_count = validate_form_items();
		
		if($error_count == 0)
		{
			if(email($from_email, $from_name, $to, $message))
				header("Location: thankyou.html");
			else
			{
				global $errors;
				$errors[] = "Email coudn't be send at this time. <br>Please report the webmaster of this error.";
			}
		}
		
		
	}
	
	

	if(isset($_POST["submit"]))
		form_process();

?>

<html>
	<title>Biverr - The Awesome Fiverr Clone</title>
	<head>
	
	</head>

	<body>
	   <form id="test" method="post" action="<?php echo $PHP_SELF?>" >
		<table border="0">
			   

			   <tr>
				   <td colspan="2" style="border-bottom:1px solid black;">

					  <font size="+2"><b>Tell A Friend</b></font>
					  

				   </td>
			   </tr>
				

				<tr>
				   <td colspan="2">
					   <?php
							global $errors;
							if(count($errors) != 0){
								print_error($errors);
							}
						?>
				   </td>
			   </tr>

			   <tr>
				   <td>
						<b>Your Name:*</b>
				   </td>
				   <td>
						<b>Your Email:*</b>
				   </td>
			   </tr>

			   <tr>
				   <td>
						
						<input type="text" name="your_name" id="name" size="20" maxlength="25" value="<?php echo $_POST["your_name"]?>">
				   </td>
				   <td>
						<input type="text" name="your_email" id="email" size="31" maxlength="80" value="<?php echo $_POST["your_email"]?>">
				   </td>
			   </tr>
				
				<tr>
				   <td colspan="2">
						<b>Friend's Email:</b>*<br/>
						<input type="text" name="friend_email1" id="name" size="56" maxlength="80" value="<?php echo $_POST["friend_email1"]?>">
				   </td>
				   
			   </tr>

			   <tr>
				   <td colspan="2">						
						<b>Friend's Email:</b><br/>
						<input type="text" name="friend_email2" id="name" size="56" maxlength="80" value="<?php echo $_POST["friend_email2"]?>">
				   </td>
				</tr>
				
				<tr>
				   <td colspan="2">						
						<b>Friend's Email:</b><br/>
						<input type="text" name="friend_email3" id="name" size="56" maxlength="80" value="<?php echo $_POST["friend_email3"]?>">
				   </td>
				</tr>

			   <tr>
				   <td>
						<b>Message:*</b> 
				   </td>
				   <td>
						<i>(max 250 characters allowed)</i>
				   </td>
			   </tr>
			   <tr>
				   <td colspan="2">
						<textarea name="message" id="message" cols="42" rows="5"><?php echo $_POST["message"]?></textarea>
				   </td>
			   </tr>
			   <tr>
				   <td colspan="2" align="right">
						<i>(* required fields)</i> <input type="submit" value="submit" name="submit" >
				   </td>
			   </tr>
		</table>
		</form>

		
	</body>
	
</html>