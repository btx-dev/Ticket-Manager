<?php
/* 	
Logout function.
Logs the user out and destroys the session.
*/
session_start();
session_unset();
session_destroy();

exit(header('Location: ../login.php?error=logout-success'));

?>