<?php

$server ='localhost:3308';
$username = 'root';
$password ='';
$dbname = 'tixedu';

$conn1 = mysqli_connect($server, $username, $password, $dbname);

if (mysqli_connect_error())
 
	die("Failed to connect to MySQL:".mysqli_connect_errno());

?>