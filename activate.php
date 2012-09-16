<?php
session_start();
//echo $_REQUEST['code'];
			include_once('config/db_conn.php');
			include_once('db_config/db_user.php');
/*			
			$user=new user();
			$rs_uniq_user=$user->uniq_user_list('user_status','Inactive');
			$data_uniq_user=mysql_fetch_array($rs_uniq_user);
			echo $data_uniq_user['user_activation_code'];
			$dataArray['user_status']='Inactive';
			$user->dataInsert('ninerr_user',$dataArray);
*/       
reDirect('index.php');         
?>