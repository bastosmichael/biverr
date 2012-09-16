<?php
session_start();
echo $_SESSION['security_number'];
exit;
header('location: index.php');
?>