<?php
class review{

	
	function review_list()
	{
	$sql="select * from ninerr_review ";
	$rs=mysql_query($sql);
	return $rs;
	}
	function uniq_review_list($name,$value)
	{
	$sql="select * from ninerr_review where ".$name."='".$value."' ";
	$rs=mysql_query($sql);
	return $rs;
	}
	
	


}


?>