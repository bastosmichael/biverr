<?php
class catagory{

	
	function catagory_list()
	{
	$sql="select * from ninerr_catagory ";
	$rs=mysql_query($sql);
	return $rs;
	}
	function uniq_catagory_list($name,$value)
	{
	$sql="select * from ninerr_catagory where ".$name."='".$value."' ";
	$rs=mysql_query($sql);
	return $rs;
	}
	
	function edit_catagory_list($id)
	{
	$sql="select * from ninerr_catagory where  catagory_id ='".$id."'";
	$rs=mysql_query($sql);
	return $rs;
	}

	
	function delete_list($id)
	{
	$sql="DELETE FROM `ninerr_catagory` WHERE id='".$id."'";
	$rs=mysql_query($sql);
	return $rs;
	}








}


?>