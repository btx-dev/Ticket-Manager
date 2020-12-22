<?php
include 'header.php';

if (!isset($_SESSION['username'])) {
	exit(header('Location: /events/index.php')); 
}
else
{
	require 'functions/dbconn.php'; 
	$output = '';
	$sql = "SELECT * FROM users WHERE Id=?";
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
			mysqli_stmt_bind_param($stmt,"s", $_SESSION['userid']);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			// Check if user exists.
			if ($row = mysqli_fetch_assoc($result)) 
			{
?>
<div class="center">

	<form class="userInput" action="functions/profile_update.php" method="post">
		<p class="errorMsg">Για να ενημερώσετε μόνο τις πληροφορίες σας αφήστε τα πεδία αλλαγής κωδικού κενά!</p>
		<?php 
			if (isset($_GET['update']) && $_GET['update']=="success") 
			{
				echo '<p class="successMsg">Info updated successfully. Please relog first!';
			}
		?>
		<table class="table-contents">
		  <tr>
		    <td>Username: </td>
		    <td><input type="text" name="uname" value="<?php echo $row['UserName'] ?>"></td>
		  </tr>
		  <tr>
		  	<td>First Name: </td>
		  	<td><input type="text" name="fname" value="<?php echo $row['FirstName'] ?>"></td>
		  </tr>
		  <tr>
		  	<td>Last Name: </td>
		  	<td><input type="text" name="lname" value="<?php echo $row['LastName'] ?>"></td>
		  </tr>
		  <tr>
		    <td>Email: </td>
		    <td><input type="text" name="mail" value="<?php echo $row['Email'] ?>"></td>
		  </tr>
		  <tr>
		    <td>Change Password: </td>
		    <td><input type="text" name="pwd" placeholder="Type the new password"></td>
		  </tr>
		  <tr>
		    <td>Repeat New Password: </td>
		    <td><input type="text" name="pwd-repeat" placeholder="Repeat the new password"></td>
		  </tr>
		</table><br>
		<button class="w3-btn w3-teal w3-btn w3-padding-large w3-round w3-margin" type="submit" name="profile-submit">Save</button>
	</form>

</div>
<?php 
			} 
		} 

reservationstable();

}

function reservationstable()
{
	global $output, $dbconn;

	$sql = "SELECT * FROM reservation WHERE UserId='".$_SESSION['userid']."'";
	$result = mysqli_query($dbconn, $sql);
	if(mysqli_num_rows($result)==0)
	{
		$output .= "<div class='center'><p class='successMsg'>Ο πίνακας κρατήσεων είναι άδειος. Οι κρατήσεις σας θα εμφανίζονται εδώ.</p></div>";
	}
	else
	{
		$output .= '<div class="w3-container w3-padding">';
		$output .= '<h2>Οι κρατήσεις μου: </h2>';
		$output .= '<table id="reservations-table" style="width:100%" class="w3-table-all center">';
		$output .= '<tr>';
		$output .= '<th>Αριθμός κράτησης</th>';
		$output .= '<th>Αριθμός θέσης</th>';
		$output .= '<th>Ημερομηνία</th>';
		$output .= '<th>Αναγνωριστικό γεγονότος</th>';
		$output .= '<th>Ακύρωση</th>';
		$output .= '<th>Εκτύπωση</th>';
		$output .= '</tr>';
		while ($row = mysqli_fetch_assoc($result))
		{
			$output .= '<tr>';
			$output .= '<td>'.$row['Id'].'</td>';
			$output .= '<td>'.$row['SeatId'].'</td>';
			$output .= '<td>'.$row['EventDate'].'</td>';
			$output .= '<td>'.$row['EventId'].'</td>';

			$output .= '<td><input id="cancel" type="button" value="X" class="w3-btn w3-red w3-round-small w3-margin-left reservation"></td>';
			$output .= '<td><input id="print" type="button" value="Print" class="w3-btn w3-blue w3-round-small"  onclick="window.print();return false;"></td>';
		}
	}
	$output .= '</table></div>';
	echo $output;
}
?>
<script>
$('.reservation').click(function(e){
	if (confirm('Είσαστε σίγουροι οτι θέλετε να ακυρώσετε αυτήν την κράτηση?\nΕίναι πιθανόν να υπάρξουν χρεώσεις!')) {
		var row = $(this).closest("tr")[0]; 
     	var cells = row.cells;

     	var seatid = cells[1].textContent;
		$(this).closest('tr').remove();
		$.ajax({
            url: 'functions/cancel_registration.php',
            type: "POST",
            data: {seatid:seatid},
            success: function (data) {
                alert('Η κράτηση ακυρώθηκε επιτυχώς! '+data);
                location.reload();
            }
        });
   	}
});
</script>
<?php
include 'footer.php';
?>