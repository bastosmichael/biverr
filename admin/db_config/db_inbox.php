<?php
class inbox{
/*-----------Full table  list-----------*/
	function inbox_list()
	{
	$sql="select * from ninerr_inbox ";
	$rs=mysql_query($sql);
	return $rs;
	}
/* End of Full table  list*/

/*----------- Unique table  list-----------*/

	function uniq_inbox_list($name,$value)
	{
	$sql="select * from ninerr_inbox where ".$name."='".$value."' ";
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

}
?>