<?php
class recommend{

	
	function recommend_list()
	{
	$sql="select * from ninerr_recommend ";
	$rs=mysql_query($sql);
	return $rs;
	}

	
	function delete_list($id)
	{
	$sql="DELETE FROM `ninerr_recommend` WHERE id='".$id."'";
	$rs=mysql_query($sql);
	return $rs;
	}



}


?>