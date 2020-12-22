<?php 
session_start();
require 'dbconn.php';

if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];

    $sql = "DELETE FROM users WHERE Id='".$userid."'";
    $result = mysqli_query($dbconn,$sql);
}
else
{
    exit(header('Location: /events/login.php'));
}