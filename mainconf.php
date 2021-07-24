<?php
error_reporting(0);
date_default_timezone_set("Asia/Bangkok");
$host = "localhost";
$username = "root";
$password = "";
$db_name = "desapps";
$mysqli = new mysqli($host, $username, $password, $db_name);
if(mysqli_connect_errno()) {
	echo "Error: Tidak dapat terhubung ke database.";
	exit;
}
?>