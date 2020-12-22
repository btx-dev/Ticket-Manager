<?php
include 'header.php';

// Case no SESSION is set.
if (!isset($_SESSION['userid'])) 
{
	exit(header('Location: ./login.php')); 
}
else
{ 
	$row = $sql = $stmt = $result = "";	
	$now = date('Y-m-d\TH:i');
?>

<h2 class="w3-padding">Τις επόμενες ημέρες: </h2>

<!-- Fetching last posted events. -->
<div class="w3-row-padding">
	<?php echo lastposted(); ?>
</div>

<?php } 

function lastposted()
{
	global $dbconn, $row, $sql, $stmt, $result, $now;
	$output = '';
	$sql = "SELECT * FROM event WHERE StartDateTime>='".$now."' ORDER BY StartDateTime ASC LIMIT 6";
	$result = mysqli_query($dbconn, $sql);

	while ($row = mysqli_fetch_assoc($result)) 
	{
		$sql = "SELECT * FROM venue WHERE Id = '".$row['VenueId']."'"; 
		$result1 = mysqli_query($dbconn, $sql); 
		$row1 = mysqli_fetch_array($result1);

		// Get event start date and time.
		$sqlstartdatetime = strtotime($row['StartDateTime']);
		$getstartdate = date('Y-m-d', $sqlstartdatetime);
		$startdate = date("d M Y", $sqlstartdatetime);
		$starttime = date("H:i", $sqlstartdatetime);

		$output .= '<div class="w3-third w3-container w3-margin-bottom">';
		$output .= '<div class="w3-card w3-padding-small">';
		$output .= '<a class="title" href="event.php?eventid='.$row['Id'].'&familyeventid='.$row["FamilyEventId"].'&date='.$getstartdate.'">';
		$output .= '<div class="w3-display-container">';
		$output .= '<img class="w3-image" style="max-height:200px;width:100%;" src="images/'.$row['ImgUrl'].'">';
		$output .= '</div>';
		$output .= '<h4 style="overflow:hidden;white-space:nowrap;"><b>'.$row["Name"].'</b></h4>';
		$output .= '<h5><i class="fa fa-globe" aria-hidden="true"></i> '.$row1["Name"].'</h5>';
		$output .= '<h5><i class="fa fa-calendar" aria-hidden="true"></i> '.$startdate.'</h5>';
		$output .= '<h5><i class="fa fa-clock-o" aria-hidden="true"></i> '.$starttime.'</h5><br/>';
		$output .= '</a></div>';  
		$output .= '</div>';
	}
	return $output;
}
?>

<?php
include 'footer.php';
?>
