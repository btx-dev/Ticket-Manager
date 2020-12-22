<?php 
session_start();
require 'dbconn.php';

$seatid = $_POST['seatid'];

if (isset($_POST['cartid'])) 
{
	$cartrow = $_POST['cartid'];
}
else 
	$cartrow = '0';

$sql = "DELETE FROM reservation WHERE SeatId='".$seatid."'";
$result = mysqli_query($dbconn,$sql);

if (!$result) 
{
	printf("Error: %s\n", mysqli_error($dbconn));
	exit();
}

if (isset($_SESSION['cart'])) 
{
	$cart = $_SESSION['cart'];
	unset($cart[$cartrow]);

	$_SESSION['cart'] = $cart;
}

$sql = "UPDATE seat SET Available = 1 WHERE Id='".$seatid."'";
$result = mysqli_query($dbconn,$sql);
if (!$result) 
{
	printf("Error: %s\n", mysqli_error($dbconn));
	exit();
}
?>