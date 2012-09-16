<?php
		include_once('config/db_conn.php');
		include_once('db_config/db_gigs.php');
		$id=$_REQUEST['id'];
		$gigs=new gigs();
		$table='ninerr_gigs';
		if($_REQUEST['f']=='N')
		{
			$dataArray=array("gigs_featured"=>"Y");
		}
		else
		{
			$dataArray=array("gigs_featured"=>"N");
		}
		$fldArray=array("id"=>$id);
		$gigs->dataUpdate($table,$dataArray,$fldArray);
		reDirect('user_gigs.php');
	
?>