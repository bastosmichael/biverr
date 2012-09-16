<script type="text/javascript" src="js/FormChek.js"></script>
<script language="javascript">
function captcha_check(val)
	{
		
		loadFragmentInToElement('captcha_check.php?val='+val,'captcha_div','');
	
			
	}

function check ()
{
var captcha=document.reg.captcha.value;
captcha_check(captcha);
return false;
}

</script>
<script language="javascript">
function fnBlankCheck()
{
		
	if(isWhitespace(document.reg.user_primary_email.value))
	{
		alert("Please specify the Primary Email.");
		document.reg.user_primary_email.focus();
		return false;
	}
	if(!isEmail(document.reg.user_primary_email.value))
	{
		alert("Please specify Valid Email.");
		document.reg.user_primary_email.focus();
		return false;
	}
	if(isWhitespace(document.reg.user_name.value))
	{
		alert("Please specify the User Name.");
		document.reg.user_name.focus();
		return false;
	}
	if(isWhitespace(document.reg.user_password.value))
	{
		alert("Please specify the User Password.");
		document.reg.user_password.focus();
		return false;
	}
	if(isWhitespace(document.reg.captcha.value))
	{
		alert("Please specify the Captcha Code.");
		document.reg.captcha.focus();
		return false;
	}
	
	return true;		

}

</script>

<div id="login_form1" align="center" style='display:none;'>
<center><h1><!--<img src="images/key1.png" align="absmiddle">-->&nbsp;JOIN</h1> 
 </center>
 <div id="captcha_div" >
 </div>
<!--<form  action="javascript:alert('success!');location.href='a.php'">-->
<form  action="join.php" name="reg">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td>&nbsp;</td>
    <td><strong>E-Mail</strong></td>
    <td><input type="text" name="user_primary_email"></td> 
	 <td>&nbsp;</td>  
  </tr>
    <tr>
	 <td>&nbsp;</td>
    <td><strong>Username</strong></td>
    <td><input type="text" name="user_name"></td>  
	 <td>&nbsp;</td> 
  </tr>
    <tr>
	 <td>&nbsp;</td>
    <td><strong>Password</strong></td>
    <td><input type="password" name="user_password"></td>   
	 <td>&nbsp;</td>
  </tr>
    <tr>
	 <td>&nbsp;</td>
    <td><strong>Are You Human?</strong></td>
    <td><img src="CaptchaSecurityImages.php?width=100&height=40&characters=5"   /></td>   
	 <td>&nbsp;</td>
  </tr>
  <tr>
	 <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="captcha" name="captcha" onkeyup="check();" ></td>   
	 <td>&nbsp;</td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input value="Join" name="Join" id="submit" class="big" type="submit" onclick="return fnBlankCheck()"/></td>  
	 <td>&nbsp;</td> 
  </tr>
</table>

<div id="ajax_loading">
<img align="absmiddle" src="images/spinner.gif">&nbsp;Processing...
</div>
</form>
</div>