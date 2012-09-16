<div id="login_form" style='display:none'>

<div id="status" align="left">

<center><h1><img src="images/key.png" align="absmiddle">&nbsp;LOGIN</h1> 

<div id="login_response"><!-- spanner --></div> </center>

<form id="login" action="javascript:alert('success!');">
<input type="hidden" name="action" value="user_login">
<input type="hidden" name="module" value="login">
<label>E-Mail</label><input type="text" name="email"><br />  
<label>Password</label><input type="password" name="password"><br />  
<label>&nbsp;</label><input value="Login" name="Login" id="submit" class="big" type="submit" />

<div id="ajax_loading">
<img align="absmiddle" src="images/spinner.gif">&nbsp;Processing...
</div>

</form>

 </div>

</div>
