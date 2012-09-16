<?php
class trans{

function sum_trans($name,$where_val)
	{
	$sql="SELECT SUM(".$name.") as sum FROM  `ninerr_user_transaction` where cleader_fund ='' and user_id='".$where_val."'";
	$rs=mysql_query($sql);
	return $rs;
	}
function sum_trans1($name,$where_val)
	{
	$sql="SELECT SUM(".$name.") as sum FROM  `ninerr_user_transaction` where  user_id='".$where_val."'";
	$rs=mysql_query($sql);
	return $rs;
	}

/*----------- Uniq table  list-----------*/

	function uniq_trans_list($name,$value)
	{
	$sql="select * from ninerr_user_transaction where ".$name."='".$value."' and withdraw_request='pending' ";
	$rs=mysql_query($sql);
	return $rs;
	}
	
/* End of Uniq table  list*/
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
}
?>