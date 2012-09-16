<?php
class order_payment{
/*-----------Full table  list-----------*/
	function order_payment_list()
	{
	$sql="select * from ninerr_order_payment ";
	$rs=mysql_query($sql);
	return $rs;
	}
/* End of Full table  list*/

/*----------- Uniq table  list-----------*/

	function uniq_order_payment_list($name,$value)
	{
	$sql="select * from ninerr_order_payment where ".$name."='".$value."' ";
	$rs=mysql_query($sql);
	return $rs;
	}
	
/* End of Uniq table  list*/

/*----------- Uniq table  list double-----------*/

	function uniq_order_payment_list_double($name1,$value1,$name2,$value2)
	{
	$sql="select * from ninerr_order_payment where ".$name1."='".$value1."' and ".$name2."='".$value2."' ";
	$rs=mysql_query($sql);
	return $rs;
	}
	
/* End of Uniq table  list*/
	
/*----------- Search  table  list-----------*/

	function order_payment_search_list($value)
	{
	$sql="SELECT * FROM ninerr_order_payment where order_payment_title LIKE '%".$value."%' or order_payment_description LIKE '%".$value."%' or order_payment_location LIKE '%".$value."%'";
	$rs=mysql_query($sql);
	return $rs;
	}
	
/* End of Search table  list*/



/*-----------Insert  table  list-----------*/

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
	
/* End of Insert table  list*/

/*----------- Update  table  list -----------*/	

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

/* End of table  list*/



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
 
 function delete($id)
{
	echo $sql="DELETE FROM `ninerr_order_payment` WHERE order_id = $id";
	$rs=mysql_query($sql);
	return $rs;
}

}
?>