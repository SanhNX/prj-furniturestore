<?php

$username = 'root';
$password = 'root';
$hostname = 'localhost';
$db = 'furniture_store';

$dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect to MySQL");


mysql_select_db($db);
mysql_query("SET NAMES 'utf8'", $dbhandle);



?>