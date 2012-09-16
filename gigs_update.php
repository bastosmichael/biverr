<?php
session_start();
			$gigs_id=$_REQUEST['id'];
			
			include_once('config/db_conn.php');

			include_once('db_config/db_gigs.php');
			$gigs_obj=new gigs();
			if($_REQUEST['action']=='active')
			{
				$gigs=array("gigs_status"=>"Active");
			}
			if($_REQUEST['action']=='suspend')
			{
				$gigs=array("gigs_status"=>"Inactive");
			}
			$fldArray=array("id"=>$gigs_id);
			$gigs_obj->dataUpdate('ninerr_gigs',$gigs,$fldArray);
			reDirect('user_gigs.php?action=success');
?>