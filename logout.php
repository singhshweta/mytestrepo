<?php 
//require ("core.php");
//echo $http_referer;
ob_start();
session_start();
session_destroy();
header('Location:'.'index.php');
 ?>