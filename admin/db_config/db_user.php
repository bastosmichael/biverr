<?php
class user{

	/*-----------Select table  list-----------*/

	function dataSelect($table,$dataArray,$fldArray,$extra,$orderArray,$orderType,$limit,$offset)
	{
	$i=0;
	$j=0;
	$k=0;
	$sql.="select ";
	while (list($key1, $value1) = each ($dataArray)){
		$sql.="".$key1."";
		$i++;
		if($i!=count($dataArray)){
			$sql.=" , ";
		}
	}
	$sql.=" from ".$table."";

	if(count($fldArray)>0){
		$sql.=" where ";
	
	while (list($key2, $value2) = each ($fldArray)){
		$sql.="".$key2."='".$value2."' ";
		$j++;
		if($j!=count($fldArray)){
		$sql.=" and ";
		}
	}
	}
		$sql.=$extra;
	if(count($orderArray)>0){
	$sql.=" order by ";
	while (list($key3, $value3) = each ($orderArray)){
		$sql.="".$key3."";
		$k++;
		if($k!=count($orderArray)){
		$sql.=" , ";
		}
	}
	}
	if($orderType=='desc' || $orderType=='asc'){
	$sql.=" ".$orderType."";
	}
	//echo "<br />".$sql;
	
 $res=mysql_query($sql) or die(CHECK_QUERY.$sql);
	$numrows=mysql_num_rows($res);
	if($numrows > 0){
		if(empty($offset))
		$offset=0;
		if(empty($limit))
		$limit=10;
		$sql.=" limit $offset,$limit";
		$res=mysql_query($sql);								
	}	
	while($row1=mysql_fetch_array($res)){
	$row[]=$row1;
	}
	$result=array($row,$numrows,$offset,$limit);

	//echo "<br />".$sql;

 return $result;}
 
/* End of table  list*/

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


function delete($id)
{
	$sql="DELETE FROM `ninerr_user` WHERE `ninerr_user`.`user_id` = $id";
	$rs=mysql_query($sql);
	return $rs;
}




}


?>