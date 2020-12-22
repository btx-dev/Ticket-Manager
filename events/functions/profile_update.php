<?php
/* 	
Update profile function.
Updates the record in users table.
*/
session_start();
// Access control.
if (isset($_POST['profile-submit'])) {

	require 'dbconn.php';

	global $dbconn;
	$uname = $_POST['uname'];
	$fname = $_POST['fname'];
	$mail = $_POST['mail'];
	$password = $_POST['pwd'];
	$repeat_password = $_POST['pwd-repeat'];

	if ($password=="" && $repeat_password=="") 
	{
		$sql = "UPDATE users SET UserName=?, FirstName=?, Email=? WHERE Id=".$_SESSION['userid']."";
		$stmt = mysqli_stmt_init($dbconn);
		// Check the connection to database.
		if (!mysqli_stmt_prepare($stmt, $sql)) 
		{
			errorRedirect('sqlerror');
		}
		// Case no connection error.
		else 
		{
			// Query the database for the credentials provided.
			mysqli_stmt_bind_param($stmt,"sss", $uname, $fname, $mail);
			mysqli_stmt_execute($stmt);
			exit(header('Location: /events/profile.php?update=success')); 
		}
	}
	/* Debbuging
	echo '<div>'.$username.' '.$fname.' '.$mail.' '.$password.'</div>';
	*/
}
function errorRedirect($errorType)
{
	exit(header('Location: /events/profile.php?error='.$errorType)); 
}
?>