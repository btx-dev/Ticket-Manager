<?php

// Connection to the database ticket-manager (MySQL).
$host = "localhost";
$dbname = "ticket-manager";

require_once 'database.php';
$user = $DB_USER;
$pass = $DB_PASS;

$dbconn = mysqli_connect($host, $user, $pass, $dbname);

// Case connection fails.
if (!$dbconn) {
	die("Connection failed: ".mysqli_connect_error());
}
?>