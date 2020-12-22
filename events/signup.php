<?php
include 'header.php';
?>
<div class="center">
	<!-- User input form. -->
	<form class="userInput" action="functions/do_signup.php" method="post">
		<h1>Εγγραφή</h1>
		<?php
		// Check url (GET) for errors in user input or connection errors.
		if (isset($_GET['error'])) {
			// Switch the error message.
			switch ($_GET['error']) {
				case 'emptyfields':
					echo '<p class="errorMsg">Συμπληρώστε όλα τα πεδία!</p>';
					break;
				case 'invalidunamemail':
					echo '<p class="errorMsg">Μη έγκυρη μορφή ονόματος χρήστη και ηλεκτρονικού ταχυδρομείου!</p>';
					break;
				case 'invalidmail':
					echo '<p class="errorMsg">Η μορφή email δεν είναι έγκυρη!</p>';
					break;
				case 'invalidusername':
					echo '<p class="errorMsg">Μη έγκυρο όνομα χρήστη! Χρησιμοποιήστε μόνο αλφαριθμητικά!</p>';
					break;
				case 'passwordcheck':
					echo '<p class="errorMsg">Οι κωδικοί πρόσβασης δεν ταιριάζουν!</p>';
					break;
				case 'sqlerror':
					echo '<p class="errorMsg">Σφάλμα σύνδεσης με βάση δεδομένων!</p>';
					break;
				case 'mailtaken':
					echo '<p class="errorMsg">Αυτό το email έχει ήδη εγγραφεί!</p>';
					break;
				case 'usertaken':
					echo '<p class="errorMsg">Το όνομα χρήστη χρησιμοποιείται ήδη!</p>';
					break;
				default:
					break;
			}
		}
		?>
		<!-- Check if a username or email is already sent to fill in the proper fields. -->
		<div class="tooltip">
			<p class="tooltiptext">Όνομα χρήστη. Μόνο λατινικοί χαρακτήρες και αριθμοί</p>
			<input type="text" name="uname" placeholder="Username" 
			<?php if (isset($_GET['uname'])) 
			{
				echo 'value="'.$_GET['uname'].'"';
			} ?>>
		</div><br>
		<div class="tooltip">
			<p class="tooltiptext">Όνομα</p>
			<input type="text" name="fname" placeholder="Όνομα">
		</div><br>
		<div class="tooltip">
			<p class="tooltiptext">Επώνυμο</p>
			<input type="text" name="lname" placeholder="Επώνυμο">
		</div><br>
		<div class="tooltip">
			<p class="tooltiptext">Τηλεφωνικός αριθμός</p>
			<input type="text" name="phone" placeholder="Τηλεφωνικός αριθμός">
		</div><br>
		<div class="tooltip">
			<p class="tooltiptext">Email. <br>Εισάγετε μια έγκυρη διεύθυνση</p>
			<input type="text" name="mail" placeholder="Email"
			<?php if (isset($_GET['mail'])) 
			{
				echo 'value="'.$_GET['mail'].'"';
			} ?>>
		</div><br>
		<div class="tooltip">
			<p class="tooltiptext">Κωδικός πρόσβασης</p>
			<input type="password" name="pwd" placeholder="Κωδικός πρόσβασης">
		</div><br>
		<div class="tooltip">
			<p class="tooltiptext">Επανάληψη κωδικού πρόσβασης</p>
			<input type="password" name="pwd-repeat" placeholder="Επανάληψη κωδικού">
		</div><br/><br/>
		<button class="w3-btn w3-teal w3-btn w3-padding-large w3-round" type="submit" name="signup-submit">Εγγραφή</button>
		<p class="result">Έχετε ήδη λογαριασμό? <a class="links" href="login.php">Συνδεθείτε</a></p>
	</form>
</div>
<?php 
include 'footer.php'; 
?>