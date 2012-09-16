<?php

if($_SESSION['user_name'])
{
?>
<a class="trigger" href="#"><?php echo ucfirst($_SESSION['user_name']); ?></a>
<?php
}
?>
<div class="header">
<div class="logo">
</div>
<div class="awesome" >
<ul>
<li> <a href="index.php"><span> Home</span></a></li>
<?php
if($_SESSION['username_email']=='')
{
?>
<li> <a href="how_work.php" ><span>How it Works </span></a></li>
<?php
}
?>

<?php
if($_SESSION['username_email']!='')
{
?>
<li> <a href="bookmarks.php" ><span>Stuff I Like</span></a></li>
<li> <a href="profile_edit.php"><span>Profile</span></a></li>
<li> <a href="user_gigs.php"><span>My Gigs</span></a></li>
<li> <a href="messages.php" ><span>inbox</span></a></li>
<li> <a href="manage_work.php"><span>Manage Work</span></a></li>
<li> <a href="manage_order.php"><span>Manage Orders </span></a></li>
<li> <a href="sales_balance.php"><span>Balance</span></a></li>
<li><a href="logout.php"><span>Log Out</span></a></li>
<?php 
}
else
{
?>
<li> <a href="#" id="login_link1"><span>Join </span></a></li>

<li> <a href="#" id="login_link"><span> 
<?php
	echo 'Sign In';
?>
</span></a></li>
<li> <a href="#" id="login_link1"><span>Help </span></a></li>
<?php
}
?>



 <?php
if($_SESSION['username_email']=='')
{
?>
<div class="fbc">
<script src="http://static.ak.fbcdn.net/connect/en_US/core.js"></script> <script> FB.init({ apiKey: '959a28fbc1c9221a657bf366525e93d1' }); </script> <div class="fb_button" id="fb-login" style="background:none;"> <a href="#" class="fb_button_medium"> <span id="fb_login_text"><img src='images/Connect_light_medium_short.gif' alt="Facebook Connect"/></span> </a> </div> <script> document.getElementById('fb-login').onclick = function() { FB.login(function(response) { if (response.session) { document.getElementById('fb-login').innerHTML = "<span id='fb_login_text'>Logout</span>"; } else { document.getElementById('fb-login').innerHTML = "<span id='fb_login_text' class='fb_button_text'><img src='images/Connect_light_medium_short.gif'></span>"; } }); }; </script>
</div>
<?php
}
?>

</ul>
</div>

<?php include('login_box.php'); ?>
<?php include('registration_box.php'); ?>
<div style="clear:both;"></div>