<?php
include_once('db_config/db_catagory.php');
$catagory=new catagory();
$rs=$catagory->catagory_list();
$i=0;			
					
?>
<div class="right_cont">
 
<div class="right_box">
<div class="social_bk">
<!-- AddToAny BEGIN -->
<a class="a2a_dd" href="http://www.addtoany.com/share_save?linkurl=http://<?php echo $_SERVER['HTTP_HOST']?>&amp;linkname="><img src="http://static.addtoany.com/buttons/share_save_256_24.png" width="256" height="24" border="0" alt="Share/Bookmark"/></a>
<script type="text/javascript">
var a2a_config = a2a_config || {};
a2a_config.linkurl = "http://<?php echo $_SERVER['HTTP_HOST']?>";
</script>
<script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->


</div>
<div class="right_box_top">
</div>
<div class="right_box_center">

</div>
<div class="right_box_center">

<ul>

<li><a href="user_gigs.php">My Gigs</a> </li>
<li><a href="manage_order.php">Manage Work </a> </li>
<li><a href="sales_balance.php">Sales Balance </a> </li>
</ul>
</div>
<div class="right_box_bottom">
</div>
</div>


<div class="right_box">
<div class="right_box_top_a">
</div>
<div class="right_box_center_a">




</div>
<div class="right_box_bottom_a">
</div>
</div>
</div>