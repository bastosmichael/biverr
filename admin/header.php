<?php 
$arr=explode('/',$_SERVER['PHP_SELF']);

$page_name=$arr[count($arr)-1];
if($page_name=='users.php')
$class1='current';
if($page_name=='orders.php')
$class2='current';
if($page_name=='catagory.php' || $page_name=='add_catagory.php' )
$class3='current';
if($page_name=='transaction.php')
$class4='current';
if($page_name=='gigs.php')
$class5='current';

if($page_name=='admin_users.php')
$class6='current';

if($page_name=='paypal_desc.php')
$class7='current';
if($page_name=='recommend.php')
$class8='current';
if($page_name=='cms.php')
$class9='current';
if($page_name=='change_pass.php')
$class10='current';
if($page_name=='review_list.php')
$class11='current';
?>
<div id="header"><div style="float:left"><a href="users.php"><img src="/images/biverr_fiverr_clone.png" alt="Biverr:Fiverr Clone Admin Area"></a></div>        <a href="users.php">	<h2>Biverr:Fiverr Clone Admin Area</h2></a>
            <div id="topmenu">
            	<ul>
                	<!--<li><a href="index.html">Dashboard</a></li>
                    <li><a href="#">Orders</a></li>-->
                	<li class="<?php echo $class1;?>"><a href="users.php">All Users</a></li>
                    <li class="<?php echo $class2;?>"><a href="orders.php">Order</a></li>
					<li class="<?php echo $class3;?>"><a href="catagory.php">Category</a></li>
					<li class="<?php echo $class4;?>"><a href="transaction.php">Transaction</a></li>
					<li class="<?php echo $class5;?>"><a href="gigs.php">Gigs</a></li>
					<li class="<?php echo $class6;?>"><a href="admin_users.php">Admin Users</a></li>
					<li class="<?php echo $class7;?>"><a href="paypal_desc.php">Paypal Id</a></li>
					<li class="<?php echo $class9;?>"><a href="cms.php">CMS</a></li>
					<li class="<?php echo $class8;?>"><a href="recommend.php">Recommend</a></li>
					<!--<li class="<?php echo $class11;?>"><a href="review_list.php">Review</a></li>-->
					<li class="<?php echo $class10;?>"><a href="change_pass.php">Change Password</a></li>
					
                  <!--  <li><a href="#">CMS</a></li>
                    <li><a href="#">Statistics</a></li>
                    <li><a href="#">Settings</a></li>-->
              </ul>
          </div>
      </div>
	  <div style="color:white;font-size:large;cursor:pointer;padding-left:800px;"><span onclick="javascript:location.href='logout.php'"><img src="img/logout.png" />Logout</span></div>