<?php
ob_start();
include_once('config_global.php');
include_once('helper.php');
include_once('xss.php');
require_once ('pagination.php');

$conn=@mysql_pconnect(DBHOST,DBUSER,DBPASS)or header("Location: install/install_ninner/");;
@mysql_select_db(DBNAME,$conn)or header("Location: install/install_ninner/");

?>
