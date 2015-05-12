<?php
//get login from local
require_once 'dbcreds.php';
error_reporting(E_ALL ^ E_DEPRECATED);
$db_server = mysql_connect($server, $user,$password);

if (!$db_server) {die("Unable to connect to MySQL: " . mysql_error());}

//Select database in MYSQL
mysql_select_db($database) or die("Unable to select database" . mysql_error());
?>