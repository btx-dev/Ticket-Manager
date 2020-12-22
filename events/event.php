<?php 
include 'header.php';
$output = '';
$now = date('Y-m-d\TH:i');
if (!isset($_SESSION['userid'])) 
{
	exit(header('Location: /events/index.php'));
}
elseif (isset($_SESSION['userid']) && isset($_GET['familyeventid']) && isset($_GET['date'])) 
{	
	require 'functions/dbconn.php';
	$eventid = $_GET['eventid'];
	$familyeventid = $_GET['familyeventid'];
	$selecteddate = $_GET['date'];
	$sql = "SELECT * FROM FamilyEvent WHERE Id='".$familyeventid."'";
	$result = mysqli_query($dbconn,$sql);
	$row = mysqli_fetch_assoc($result);

	makeheader($row);

	$sql = "SELECT * FROM event WHERE (FamilyEventId='".$familyeventid."' AND StartDateTime >='".$selecteddate."') ORDER BY StartDateTime ASC LIMIT 50";
	$result = mysqli_query($dbconn,$sql);

	$output .= '<table id="cart-table" style="width:100%" class="w3-table-all center">';
	$output .= '<tr>';
	$output .= '<th>Id</th>';
	$output .= '<th>Ημερομηνία</th>';
	$output .= '<th>Όνομα</th>';
	$output .= '<th>Τοποθεσία</th>';
	$output .= '<th>Τιμή (€)</th>';
	$output .= '<th> </th>';
	$output .= '</tr>';
	while ($row = mysqli_fetch_assoc($result)) 
	{
		$events[] = $row;
	}
	foreach ($events as $data) {
		output($data);
	}
	$output .= '</table>';
	echo $output;
}
?>
<div id="myModal" class="modal">
</div>
<script>
$('.w3-green').click(function(e){

	var row = $(this).closest("tr")[0]; 
 	var cells = row.cells;

 	var eventid = cells[0].textContent; 
 	var date = cells[1].textContent;
 	var eventname = cells[2].textContent;
 	var venue = cells[3].textContent;

 	makemodal(eventid, date, eventname, venue);

	// Get the modal
	var modal = document.getElementById("myModal");
 	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	modal.style.display = "block";

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	  modal.style.display = "none";
	  location.reload();
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	  if (event.target == modal) {
	    modal.style.display = "none";
	    location.reload();
	  }
	}
});
</script>
<script>
function makemodal($eventid, $date, $eventname, $venue)
{
	var eventid = $eventid;
	var date = $date;
	var eventname = $eventname;
	var venue = $venue;
	var exmodal = document.getElementById('myModal');
	var modaldiv = document.getElementById('w3-main');
	modaldiv.removeChild(exmodal);
	var modal = '<div id="myModal" class="modal"><div class="modal-content">';
	modal += '<div class="modal-header">';
	modal += '<span class="close">&times;</span><h2>Επιλογή θέσης</h2>';
	modal += '</div><div class="modal-body"><p>'+eventid+' - '+eventname+' - '+date+' - '+venue+'</p>';

	$.ajax({
        url: 'functions/seatselect.php',
        type: "POST",
        data: {eventid:eventid},
        async:false,
        success: function (data) {
        	modal +=data;
        }
    });
	modal += '</div><div class="modal-footer"><h3>Για οποιοδήποτε πρόβλημα με την κρατησή σας επικοινωνίστε στο email: support@ticketmanager.com</h3>';
	modal += '</div></div>';
 	document.body.innerHTML += modal;
}
</script>
<script>
function addtocart(i)
{
	var seatid = $('#seat'+i).val();
	var eventid = $('#eventid').val();  
	$.ajax({  
	    url:"functions/do_register.php",  
	    method:"POST",  
	    data:{seatid:seatid,eventid:eventid},  
	    success:function(data){  
	         alert("Η κράτηση θέσης ήταν επιτυχής. Επισκευτείτε το καλάθι για να ολοκληρώσετε την αγορά σας.");
	         location.reload();  
	    }  
	});
}
</script>
<?php
function makeheader($qrow)
{
	global $output, $familyeventid, $selecteddate, $dbconn;
	$output .= '<div class="center w3-container w3-margin">';
	$output .= '<h1> '.$qrow['Name'].' </h1>';
	$output .= '<img class="w3-image" style="max-height:260px;" src="images/'.$qrow['ImgUrl'].'">';
	$output .= '</div>';
	$outputdate = date('d-m-Y', strtotime($selecteddate));
	$output .= '<div class="center w3-container w3-margin">';
	$output .= '<h5>Βλέπετε αποτελέσματα για '.$outputdate.' και μετά.</h5>';
	$output .= '</div>';
}

function output($qrow)
{
	global $output, $eventid, $familyeventid, $dbconn, $selecteddate;
	$sqlstartdatetime = strtotime($qrow['StartDateTime']);
	$startdate = date("D d M Y", $sqlstartdatetime);
	$starttime = date("H:i", $sqlstartdatetime);
	$rowdate = date('Y-m-d', $sqlstartdatetime);

	if ($rowdate == $selecteddate && $qrow['Id'] == $eventid) 
	{
		$output .= '<tr style="border:2px solid black">';
	}
	else
	{
		$output .= '<tr>';
	}
	
	$output .= '<td>'.$qrow['Id'].'</td>';
	$sql = "SELECT Name FROM venue WHERE Id='".$qrow['VenueId']."'";
	$result1 = mysqli_query($dbconn, $sql);
	$row1 = mysqli_fetch_assoc($result1);

	$output .= '<td>'.$startdate.' ';
	$output .= ''.$starttime.'</td>';
	$output .= '<td>'.$qrow['Name'].'</td>';
	$output .= '<td>'.$row1['Name'].'</td>';
	if ($qrow['Price'] > 0) 
	{
		$output .= '<td>'.$qrow['Price'].'</td>';
	}
	else
	{
		$output .= '<td>Free</td>';
	}

	$output .= '<td><input id="seatreservation" type="button" value="ΚΡΑΤΗΣΗ"  class="w3-btn w3-green w3-btn w3-round-small w3-margin-left"></input></td>';
	$output .= '</tr>';		
}

include 'footer.php';
?>