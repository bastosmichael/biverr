<?php
class user{

	function user_login($user_primary_email,$user_password)
	{
	$sql="select * from ninerr_user where user_primary_email ='$user_primary_email' and user_password ='".$user_password."'";
	$rs=mysql_query($sql);
	$arr=mysql_fetch_array($rs);
	$count=count($arr);
	return $count;
	}
	function user_list()
	{
	$sql="select * from ninerr_user ";
	$rs=mysql_query($sql);
	return $rs;
	}
	function uniq_user_list($name,$value)
	{
	$sql="select * from ninerr_user where ".$name."='".$value."'";
	$rs=mysql_query($sql);
	return $rs;
	}
	
	
	function delete_list($id)
	{
	$sql="DELETE FROM `ninerr_user` WHERE user_id='".$id."'";
	$rs=mysql_query($sql);
	return $rs;
	}
		function dataInsert($table,$dataArray){
	 $fldArray=$dataArray;
		$i=0;
		$j=0;
		$sql.="insert into `".$table."` (";
		while (list($key1, $value1) = each ($fldArray)) {
			$sql.="`".$key1."`";
			$j++;
			if($j!=count($fldArray)){
			$sql.=",";
			}
			if($j==count($fldArray)){
			$sql.=") VALUES (";
			}
		}
		
			while (list($key1, $value1) = each ($dataArray)) {
			$sql.="'".$value1."'";
			$i++;
			if($i!=count($dataArray)){
				$sql.=",";
			}
			if($i==count($dataArray)){
			$sql.=")";
			}
		}
	mysql_query($sql) or die(CHECK_QUERY.$sql);
	$id=mysql_insert_id();
	return $id;
	}
	
	
	function dataUpdate($table,$dataArray,$fldArray){
	$i=0;
	$j=0;
	$sql.="update ".$table." set ";
	while (list($key1, $value1) = each ($dataArray)) {
		$sql.="".$key1."='".$value1."'";
		$i++;
		if($i!=count($dataArray)){
			$sql.=" , ";
		}
		if($i==count($dataArray)){
		$sql.=" where ";
		}
	}
	while (list($key2, $value2) = each ($fldArray)) {
		$sql.="".$key2."='".$value2."' ";
		$j++;
		if($j!=count($fldArray)){
		$sql.=" and ";
		}
	}
	//echo $sql.'<br>';
	return mysql_query($sql);
}







}


?>