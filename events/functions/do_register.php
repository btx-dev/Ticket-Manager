<?php
session_start();
require 'dbconn.php';

$seatid = $_POST['seatid'];
$eventid = $_POST['eventid'];
$userid = $_SESSION['userid'];

$sql = "SELECT * FROM event WHERE Id='".$eventid."'";
$result = mysqli_query($dbconn, $sql);
$row = mysqli_fetch_assoc($result);
$eventname = $row['Name'];
$eventdate = $row['StartDateTime'];

$sql = "SELECT * FROM venue WHERE Id='".$row['VenueId']."'";
$result1 = mysqli_query($dbconn, $sql);
$row1 = mysqli_fetch_assoc($result1);
$venuename = $row1['Name'];

$cartArray = array(array('EventId'=>$eventid, 'Event'=>$eventname, 'Date'=>$eventdate, 'Location'=>$venuename, 'SeatId'=>$seatid));

if (empty($_SESSION['cart']))
{
	$_SESSION['cart'] = $cartArray;
}
else
{
	$_SESSION['cart'] = array_merge($_SESSION['cart'], $cartArray);
}

$sql = "UPDATE seat SET Available = 0 WHERE Id='".$seatid."'";
$result = mysqli_query($dbconn,$sql);

$sql = "INSERT INTO reservation (UserId, SeatId, EventDate, Duration, EventId) 
		VALUES ('".$userid."','".$seatid."','".$eventdate."','0','".$eventid."')";
$result = mysqli_query($dbconn,$sql);
?>