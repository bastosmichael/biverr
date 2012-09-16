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
?>
<div id="header"><div style="float:left"><a href="users.php"><img src="/images/biverr_fiverr_clone.png" alt="Biverr:Fiverr Clone Admin Area"></a></div><h2>Biverr:Fiverr Clone Admin Area</h2>