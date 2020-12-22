<?php 
require 'functions/dbconn.php';
include 'header.php';

$output = '';
$sum = 0;

userstable();
reservationstable();

$output .= '</table></div>';
echo $output;
?>
<script>
$('.user').click(function(e){
	if (confirm('Είσαστε σίγουροι οτι θέλετε να διαγράψετε αυτόν τον χρήστη?')) {
		var row = $(this).closest("tr")[0]; 
     	var cells = row.cells;

     	var userid = cells[0].textContent;
		$(this).closest('tr').remove();
		$.ajax({
            url: 'functions/delete_user.php',
            type: "POST",
            data: {userid:userid},
            success: function (data) {
                alert('Ο χρήστης διαγράφηκε επιτυχώς! '+data);
                location.reload();
            }
        });
   	}
});
$('.reservation').click(function(e){
	if (confirm('Είσαστε σίγουροι οτι θέλετε να ακυρώσετε αυτήν την κράτηση?')) {
		var row = $(this).closest("tr")[0]; 
     	var cells = row.cells;

     	var seatid = cells[2].textContent;
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
function userstable()
{
	global $output, $dbconn;
	$output .= '<div class="w3-container w3-padding">';
	$output .= '<h2>Εγγεγραμμένοι Χρήστες: </h2>';
	$output .= '<table id="users-table" style="width:100%" class="w3-table-all center">';
	$output .= '<tr>';
	$output .= '<th>Id</th>';
	$output .= '<th>Username</th>';
	$output .= '<th>Email</th>';
	$output .= '<th>FName</th>';
	$output .= '<th>LName</th>';
	$output .= '<th>Mail Confirmation</th>';
	$output .= '<th>Delete User</th>';
	$output .= '</tr>';

	$sql = "SELECT * FROM users";
	$result = mysqli_query($dbconn, $sql);
	while ($row = mysqli_fetch_assoc($result))
	{
		$output .= '<tr>';
		$output .= '<td>'.$row['Id'].'</td>';
		$output .= '<td>'.$row['UserName'].'</td>';
		$output .= '<td>'.$row['Email'].'</td>';
		$output .= '<td>'.$row['FirstName'].'</td>';
		$output .= '<td>'.$row['LastName'].'</td>';
		if ($row['EmailConfirmed'] == 0) {
			$output .= '<td><input type="button" class="w3-red w3-round-small w3-margin-left" value="FALSE" disabled></td>';
		}
		else
		{
			$output .= '<td><input type="button" class="w3-green w3-round-small w3-margin-left" value="TRUE" disabled></td>';
		}
		$output .= '<td><input id="cancel" type="button" value="X" class="w3-btn w3-red w3-round-small w3-margin-left user"></td>';
	}
	$output .= '</table></div>';
}

function reservationstable()
{
	global $output, $dbconn;
	$output .= '<div class="w3-container w3-padding">';
	$output .= '<h2>Κρατήσεις: </h2>';
	$output .= '<table id="reservations-table" style="width:100%" class="w3-table-all center">';
	$output .= '<tr>';
	$output .= '<th>Ticket Id</th>';
	$output .= '<th>User Id</th>';
	$output .= '<th>Seat Id</th>';
	$output .= '<th>Event Date</th>';
	$output .= '<th>Event Id</th>';
	$output .= '<th>Cancel Reservation</th>';
	$output .= '</tr>';

	$sql = "SELECT * FROM reservation";
	$result = mysqli_query($dbconn, $sql);

	while ($row = mysqli_fetch_assoc($result))
	{
		$output .= '<tr>';
		$output .= '<td>'.$row['Id'].'</td>';
		$output .= '<td>'.$row['UserId'].'</td>';
		$output .= '<td>'.$row['SeatId'].'</td>';
		$output .= '<td>'.$row['EventDate'].'</td>';
		$output .= '<td>'.$row['EventId'].'</td>';

		$output .= '<td><input id="cancel" type="button" value="X" class="w3-btn w3-red w3-round-small w3-margin-left reservation"></td>';
	}
	$output .= '</table></div>';
}

?>