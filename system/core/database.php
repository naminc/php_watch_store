<?php
error_reporting(0);
date_default_timezone_set('Asia/Ho_Chi_Minh');
ini_set('max_execution_time', 0);

define('ERROR', 'ERROR!');
define('LOCALHOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'ruiz-watch');
define('LAYOUT', './system/views/layouts');

session_start();
require_once 'class.php'; 
$DB = new DB(); 
$settings  = $DB->fetch_assoc("SELECT * FROM `settings` WHERE 1",1); 
require_once 'function.php';  

if(isset($_SESSION['username'])){ 
    $username = $_SESSION['username'];
    $user = $DB->fetch_assoc("SELECT * FROM `users` WHERE `username` = '{$username}'",1); 
}
?>