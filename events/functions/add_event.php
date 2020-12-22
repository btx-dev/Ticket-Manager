<?php
/* 	
Insert new event recort function.
*/
//	Access control. 
if (isset($_POST['add-event-submit'])) 
{
	require 'dbconn.php';

	$uid = $_SESSION["userid"];
	// Get the user input.
	$title = $_POST['title'];
	$description = $_POST['description'];
	$typeid = $_POST['type'];
	$venuid = $_POST['venue'];
	$startdatetime = $_POST['meeting-start-time'];
	$enddatetime = $_POST['meeting-end-time'];
	$startdatetime = str_replace('T', ' ', $startdatetime);
	$startdatetime =  $startdatetime.":00";
	$enddatetime = str_replace('T', ' ', $enddatetime);
	$enddatetime =  $enddatetime.":00";
	$familyevent = $_POST['family-event'];
	$price = $_POST['price'];

	// File upload handler.
	$banner = basename($_FILES['banner']['name']);
	$uploaddir = realpath($_SERVER["DOCUMENT_ROOT"].'/events/images');
	$uploadfile = $uploaddir ."\\". $banner;
	move_uploaded_file($_FILES['banner']['tmp_name'], $uploadfile);

	echo "<p>title:".$title." description: ".$description." type id: ".$typeid." venue id: ".$venuid." start: ".$startdatetime." end: ".$enddatetime." family: ".$familyevent." price: ".$price.""."</p>";
	// Insert Query setup.
	$sql = "INSERT INTO event (Name, Description, ImgUrl, StartDateTime, EndTime, VenueId, EventTypeId, FamilyEventId, Price) VALUES('$title', '$description', '$banner', '$startdatetime', '$enddatetime', '$venuid', '$typeid', $familyevent, '$price')";

	$success = mysqli_query($dbconn,$sql);
	if ($success) 
	{
		exit(header('Location: /events/new_event.php?insert=success')); 
	}
	// Case query was not successful.
	else 
	{
		exit(header('Location: /events/new_event.php?insert=fail')); 
	}
}
else 
{ 
	exit(header('Location: /events/index.php')); 
}
?>