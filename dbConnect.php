<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "catknitting";
$link = mysqli_connect($serverName, $userName, $password) or die ( mysqli_connect_error() );
mysqli_select_db($link, $databaseName);
// mysql_query("set names utf8");
// echo 'aa';