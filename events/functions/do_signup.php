<?php
/* 	
Signup function.
Inserts a new record in users table.
*/
// Access control.
if (isset($_POST['signup-submit'])) {

	require 'dbconn.php';
	// Variables initialization.
	$username = $_POST['uname'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$mail = $_POST['mail'];
	$password = $_POST['pwd'];
	$password_repeat = $_POST['pwd-repeat'];

	$normalizeduname = strtolower($username);
	$normalizedmail = strtolower($mail);

	// Empty fields validation - error "emptyfields" - GET uname, mail.
	if (empty($username) || empty($mail) || empty($password) || empty($password_repeat)) 
	{
		$params = 'emptyfields&uname='.$username.'&mail='.$mail;
		errorRedirect($params);
	}
	// Both mail and uname validaton - error "invalidunamemail".
	elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) 
	{
		errorRedirect("invalidunamemail");
	}
	// Email validaton - error "invalidmail" - GET uname.
	elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) 
	{
		$params = 'invalidmail&uname='.$username;
		errorRedirect($params);
	}
	// Username validation - error "invaliduname" - GET mail.
	elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) 
	{
		$params = 'invaliduname&mail='.$mail;
		errorRedirect($params);
	}
	// Password match check - error "passwordcheck" - GET uname, mail.
	elseif ($password !== $password_repeat) 
	{
		$params = 'passwordcheck&uname='.$username.'&mail='.$mail;
		errorRedirect($params);
	}
	// Username & Email check and insert.
	else 
	{
		// Email query check - error "sqlerror".
		$sql = "SELECT NormallizedEmail FROM users WHERE NormallizedEmail=?";
		$stmt = mysqli_stmt_init($dbconn);
		if (!mysqli_stmt_prepare($stmt, $sql)) 
		{
			errorRedirect("sqlerror");
		}
		// Case email exists
		else 
		{
			mysqli_stmt_bind_param($stmt, "s", $normalizedmail);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$result_check = mysqli_stmt_num_rows($stmt);
			// Case email already exists - error "mailtaken" - GET mail.
			if ($result_check>0) 
			{
				$params = 'mailtaken&uname='.$username;
				errorRedirect($params);
			}
			// Case email is unique.
			else 
			{
				// Username query check - error "sqlerror".
				$sql = "SELECT NormallizedUserName FROM users WHERE NormallizedUserName=?";
				$stmt = mysqli_stmt_init($dbconn);
				if (!mysqli_stmt_prepare($stmt, $sql)) 
				{
					errorRedirect("sqlerror");
				}
				// Username query execution.
				else 
				{
					mysqli_stmt_bind_param($stmt, "s", $normalizeduname);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
					$result_check = mysqli_stmt_num_rows($stmt);
					// Case this username already exists - error "usertaken" - GET mail.
					if ($result_check>0) 
					{
						$params = 'usertaken&mail='.$mail;
						errorRedirect($params);
					}
					// Case username is unique.
					else 
					{
						$sql = "INSERT INTO users (Id, UserName, NormallizedUserName, NormallizedEmail, FirstName, LastName, PhoneNumber, Email, PasswordHash) VALUES (?,?,?,?,?,?,?,?,?)";
						$stmt = mysqli_stmt_init($dbconn);
						// Check for sql errors.
						if (!mysqli_stmt_prepare($stmt, $sql)) 
						{
							errorRedirect("sqlerror");
						}
						// Case no sql errors hash password and insert the new user. Redirect to homepage.
						else 
						{
							$hashed_password = password_hash($password, PASSWORD_DEFAULT);
							$result = mysqli_query($dbconn, "SELECT MAX(Id) AS max_id FROM users");
							$row = mysqli_fetch_array($result);
							$insertid = $row["max_id"]+1;

							mysqli_stmt_bind_param($stmt, "sssssssss", $insertid, $username, $normalizeduname, $normalizedmail, $fname, $lname, $phone, $mail, $hashed_password);
							// Insert query check.
							if(!mysqli_stmt_execute($stmt)){
								exit(header('Location: ../signup.php?signup=fail&uname='.$username.'&mail='.$mail));
							}
							exit(header('Location: ../login.php?signup=success&uname='.$username.'&mail='.$mail));
						}
					}
				}
			}
		}
	}
}
// Access denied.
else 
{ 
	exit(header('Location: ../index.php')); 
}
// Redirects back to signup.php if there is an error in user input. Sets error arguments.
function errorRedirect($errorType)
{
	exit(header('Location: ../signup.php?error='.$errorType)); 
}

?>