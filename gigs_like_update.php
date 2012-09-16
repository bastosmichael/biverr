<?php
session_start();
include_once('config/db_conn.php');
		include_once('db_config/db_gigs.php');
		include_once('db_config/db_user.php');
		$user=new user();		
		$gigs_obj=new gigs();
		$gigs=array();
	
		if($_REQUEST['val']=='n')
		{
			$gigs['gigs_like']= 'Unlike'; 
			?>
			<img src="images/unlike.gif"  title="Unlike" onclick="like_click('y',<?php echo $_REQUEST['id'];?>)" id="like" />
			<?php 
		}
		elseif($_REQUEST['val']=='y')
		{
			$gigs['gigs_like']= 'Like'; 
			?>
			<img src="images/like.gif"  title="Like" onclick="like_click('n',<?php echo $_REQUEST['id'];?>)" id="like" />
			<?php 
		}
	$gigs['gigs_like_user_id']= $_SESSION['user_id']; 
	$fldArray=array();
	$fldArray['id']=$_REQUEST['id'];
	
	$rs_gigs_edit=$gigs_obj->dataUpdate('ninerr_gigs',$gigs,$fldArray);
		
		
    //echo $_REQUEST['val'];

?>