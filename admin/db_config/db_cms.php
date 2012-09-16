<?php
class cms{
/*-----------Full table  list-----------*/
	function cms_list()
	{
	$sql="select * from ninerr_cms ";
	$rs=mysql_query($sql);
	return $rs;
	}
/* End of Full table  list*/

/*----------- Unique table  list-----------*/

	function uniq_cms_list($name,$value)
	{
	$sql="select * from ninerr_cms where ".$name."='".$value."' ";
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