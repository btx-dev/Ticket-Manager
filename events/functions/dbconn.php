<?php

// Connection to the database ticket-manager (MySQL).
$host = "localhost";
$user = "DATABASE_USERNAME_HERE";
$pass = "DATABASE_PASSWORD_HERE";
$dbname = "ticket-manager";

$dbconn = mysqli_connect($host, $user, $pass, $dbname);

// Case connection fails.
if (!$dbconn) {
	die("Connection failed: ".mysqli_connect_error());
}
?>