<?php
/* 	
Login Function.
Checks the credentials provided.
*/
//	Access control. 
if (isset($_POST['login-submit'])) {

	require 'dbconn.php';

	$mailuname = $_POST['mailuname'];
	$password = $_POST['password'];
	// Check user credentials for empty fields.
	if (empty($mailuname) || empty($password)) 
	{
		$params = 'emptyfields&uname='.$mailuname;
		errorRedirect($params);
	}
	// Case fields are not empty.
	else 
	{
		$sql = "SELECT * FROM users WHERE UserName=? OR Email=?";
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
			mysqli_stmt_bind_param($stmt,"ss", $mailuname, $mailuname);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			// Check if user exists.
			if ($row = mysqli_fetch_assoc($result)) 
			{
				// Check if user has verified his account.
				if ($row['EmailConfirmed'] == 0) 
				{
					$params = 'mailnotconfirmed&uname='.$mailuname;
					errorRedirect($params);
				}
				// Check if the password is correct. Redirect with error.
				$password_check = password_verify($password, $row['PasswordHash']);
				if ($password_check == false) 
				{
					$params = 'wrongpwd&uname='.$mailuname;
					errorRedirect($params);
				}
				// Case password is corerct, start the session. Redirect to homepage.
				else if ($password_check == true) 
				{
					session_start();
					$_SESSION['userid'] = $row['Id'];
					$_SESSION['username'] = $row['UserName'];

					exit(header('Location: ../index.php?login=success')); 
				}
			}
			// Case no user or email found. Redirect with error.
			else 
			{
				errorRedirect("nouser");
			}
		}
	}
}
//Access denied.
else 
{ 
	exit(header('Location: ../index.php')); 
}
// Redirects back to login.php if there is an error in user input. Sets error arguments.
function errorRedirect($errorType)
{
	exit(header('Location: ../login.php?error='.$errorType)); 
}
?>