<?php
include 'header.php';
?>

<div class="center">
	<!-- User input form. -->
	<form class="userInput" action="./functions/do_login.php" method="post">
		<h1>Είσοδος</h1>	
		<?php 
		// Check url (GET) for errors in user input or connection errors.
		if (isset($_GET['error'])) 
		{
			// Switch the error message.
			switch ($_GET['error']) 
			{
				case 'emptyfields':
					echo '<p class="errorMsg">Συμπληρώστε όλα τα πεδία!</p>';
					break;
				case 'sqlerror':
					echo '<p class="errorMsg">Error connecting to Database!</p>';
					break;
				case 'wrongpwd':
					echo '<p class="errorMsg">Λανθασμένος κωδικός για τον χρήστη: '.$_GET['uname'].' !</p>';
					break;
				case 'nouser':
					echo '<p class="errorMsg">Λανθασμένο όνομα χρήστη!</p>';
					break;
				case 'logout-success':
					echo '<p class="successMsg">Επιτυχής αποσύνδεση!</p>';
					break;
				case 'mailnotconfirmed':
					echo '<p class="errorMsg">Παρακαλώ επιβεβαιώστε το email σας!</p>';
					break;
				default:
					break;
			}
		}
		// Case signup occured.
		elseif (isset($_GET['signup']) && $_GET['signup'] == 'success') 
		{
		 	echo '<p class="successMsg">Επιτυχής εγγραφή!</p>
		 		<p class="successMsg">Παρακαλώ ελέγξτε το email σας για μήνυμα επιβεβαίωσης, έπειτα συνδεθείτε με το Username: <b>'.$_GET['uname'].
		 		'</b> ή το Email: <b>'.$_GET['mail'].'</b></p>';
		} 
		else 
		{
			echo '<p class="successMsg">Πραγματοποιήστε είσοδο ή εγγραφή για να συνεχίσετε.</p>';
		}
		?>

		<!-- Check if an input is already sent to fill in the mailuname text. -->
		<div class="tooltip">
			<p class="tooltiptext">Όνομα χρήστη / Email</p>
			<input type="text" name="mailuname" placeholder="Όνομα χρήστη/Email"
			<?php if (isset($_GET['uname'])) 
			{
				echo 'value="'.$_GET['uname'].'"';
			} ?>>
		</div><br>
		<div class="tooltip">
			<p class="tooltiptext">Κωδικός πρόσβασης</p>
			<input type="password" name="password" placeholder="Κωδικός">
		</div><br>
		<button class="w3-btn w3-teal w3-btn w3-padding-large w3-round w3-margin" type="submit" name="login-submit">Είσοδος</button>
		<!-- Signup prompt. -->
		<p class="result w3-margin">Δεν έχετε λογαριασμό; <a class="links" href="signup.php" >Εγγραφή</a>.</p>	
	</form>
	<!-- Trigger/Open The Modal --> 
	<p>Χρησιμοποιώντας την υπηρεσία μας συμφωνείτε με τους <a class="links" id="tos"><u>όρους χρήσης</u></a> μας.</p>
	<br>
	<!-- The Modal -->
	<div id="myModal" class="modal">

	  <!-- Modal content -->
	  <div class="modal-content">
	    <div class="modal-header">
	      <span class="close">&times;</span>
	      <h2>Ticket Manager Ltd</h2>
	    </div>
	    <div class="modal-body">
	      	<h2>Ασφάλεια & Προσωπικά Δεδομένα</h2>
			<p>Όλες οι πληροφορίες, οι οποίες σχετίζονται με προσωπικά δεδομένα των χρηστών,
			διασφαλίζονται ως απόρρητες με την τήρηση της κείμενης νομοθεσίας για τη
			διασφάλιση των προσωπικών δεδομένων. Η ασφάλεια του Ηλεκτρονικού
			καταστήματος επιτυγχάνεται με τις ακόλουθες διαδικασίες:</p>
			<h2>Αναγνώριση Πελάτη:</h2>
			<p>Οι κωδικοί που χρησιμοποιούνται για την αναγνώριση του χρήστη/πελάτη είναι δύο:</p>
			Α) ο Κωδικός Εισόδου (Username) και<br/>
			Β) ο Μυστικός Κωδικός Ασφαλείας (Password),
			<p>Κάθε φορά που ο χρήστης/πελάτης τους καταχωρεί αποκτά πρόσβαση με απόλυτη
			ασφάλεια στα προσωπικά του στοιχεία. Του δίνεται η δυνατότητα να μεταβάλλει τον
			Μυστικό Κωδικό Ασφαλείας (password) όσο συχνά επιθυμεί. Ο μόνος που έχει
			πρόσβαση στα στοιχεία του είναι ο ίδιος μέσω των ανωτέρω κωδικών και είναι
			αποκλειστικά υπεύθυνος για την διατήρηση της μυστικότητάς του από τρίτους. Σε
			περίπτωση απώλειάς του ή διαρροής θα πρέπει να μας το γνωστοποιήσει, διαφορετικά
			δεν ευθυνόμαστε για τη χρήση του μυστικού κωδικού από μη εξουσιοδοτημένο
			πρόσωπο. Το ηλεκτρονικό μας κατάστημα με κανέναν τρόπο δεν αποκαλύπτει ή
			δημοσιοποιεί τα προσωπικά δεδομένα και τις πληροφορίες των χρηστών/πελατών. Τα
			προσωπικά δεδομένα χρησιμοποιούνται αποκλειστικά για την καλή εκτέλεση των
			συναλλαγών.</p>
	    </div>
	    <div class="modal-footer">
	      <h3>Για οποιαδήποτε απορία επικοινωνίστε στο email: info@ticketmanager.com</h3>
	    </div>
	  </div>
	</div>
	<script>
	// Get the modal
	var modal = document.getElementById("myModal");

	// Get the button that opens the modal
	var tos = document.getElementById("tos");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	tos.onclick = function() {
	  modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
	    modal.style.display = "none";
	  }
	}
	</script>
</div>
<?php 
include 'footer.php';
?>