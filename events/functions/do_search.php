<?php
require 'dbconn.php';

/* Variable declaration */
global $dbconn;
$output = ''; 
$filteredarray = array();
$now = date('Y-m-d\TH:i');

/* Get City Id if is set. Else set to empty String */
if (isset($_POST['cityid']) && $_POST['cityid'] != '')
{ 
 	$cityid = $_POST['cityid'];
}
else
{
	$cityid = '';
}
/* Get Event Type Id if is set. Else set to empty String */
if (isset($_POST['typeid']) && $_POST['typeid'] != '')
{
	$typeid= $_POST['typeid'];
	$typecount = count($typeid);
}
else
{
	$typeid = '';
}
if (isset($_POST['startdate']) && $_POST['startdate'] != '') 
{
	// Get event start date and time.
	$startdate = $_POST['startdate'];
}
else
{
	$startdate = '';
}

// Filter search.
// case 0 - 0 - 0
if ($cityid == '' && empty($typeid) && $startdate == '') {
	$sql = "SELECT * FROM event WHERE StartDateTime>='".$now."' LIMIT 50";
	$result = mysqli_query($dbconn, $sql);
		if (!$result) 
		{
	    printf("Error: %s\n", mysqli_error($dbconn));
	    exit();
		}
	while ($row = mysqli_fetch_array($result)) 
	{
		$filteredarray[] = $row;
	}
	prepareoutput($filteredarray);
	echo $output;
}
// case 0 - 0 - 1
if ($cityid == '' && empty($typeid) && $startdate != '') {
	$sql = "SELECT * FROM event WHERE StartDateTime>='".$startdate."' LIMIT 50";
	$result = mysqli_query($dbconn, $sql);
	if (!$result) 
		{
	    printf("Error: %s\n", mysqli_error($dbconn));
	    exit();
		}
	while ($row = mysqli_fetch_array($result)) 
	{
		$filteredarray[] = $row;
	}
	prepareoutput($filteredarray);
	echo $output;
}
//case 0 - 1 - 0
if ($cityid == '' && !empty($typeid) && $startdate == '') {
	foreach ($typeid as $key => $value) {
		if ($typecount < 2) {
			$sql = "SELECT * FROM event WHERE (EventTypeId = '".$value."' AND StartDateTime >= '".$now."') LIMIT 50";
		}
		elseif ($typecount < 4) {
			$sql = "SELECT * FROM event WHERE (EventTypeId = '".$value."' AND StartDateTime >= '".$now."') LIMIT 18";
		}
		else {
			$sql = "SELECT * FROM event WHERE (EventTypeId = '".$value."' AND StartDateTime >= '".$now."') LIMIT 8";
		}
		$result = mysqli_query($dbconn, $sql);
		while ($row = mysqli_fetch_array($result)) 
		{
			$filteredarray[] = $row;
		}
	}
	prepareoutput($filteredarray);
	echo $output;
}

//case 0 - 1 - 1
if ($cityid == '' && !empty($typeid) && $startdate != '') {

	foreach ($typeid as $key => $value) {
		if ($typecount < 2) {
			$sql = "SELECT * FROM event WHERE (EventTypeId = '".$value."' AND StartDateTime >= '".$startdate."') LIMIT 50";
		}
		elseif ($typecount < 4) {
			$sql = "SELECT * FROM event WHERE (EventTypeId = '".$value."' AND StartDateTime >= '".$startdate."') LIMIT 18";
		}
		else {
			$sql = "SELECT * FROM event WHERE (EventTypeId = '".$value."' AND StartDateTime >= '".$startdate."') LIMIT 8";
		}
		$result = mysqli_query($dbconn, $sql);
		while ($row = mysqli_fetch_array($result)) 
		{
			$filteredarray[] = $row;
		}
	}
	prepareoutput($filteredarray);
	echo $output;
}

//case 1 - 0 - 0
if ($cityid != '' && empty($typeid) && $startdate =='') {
	$sql = "SELECT * FROM venue WHERE CityId = '".$cityid."'"; 
	$result = mysqli_query($dbconn, $sql);  
	while($row = mysqli_fetch_array($result))  
	{
		$sql = "SELECT * FROM event WHERE (VenueId ='".$row['Id']."' AND StartDateTime >= '".$now."') LIMIT 50";
		$result1 = mysqli_query($dbconn, $sql);
		while ($row1 = mysqli_fetch_array($result1)) 
		{
			$filteredarray[] = $row1;
		}	
	}  
	prepareoutput($filteredarray);
	echo $output;
}
//case 1 - 0 - 1
if ($cityid != '' && empty($typeid) && $startdate !='') {
	$sql = "SELECT * FROM venue WHERE CityId = '".$cityid."'"; 
	$result = mysqli_query($dbconn, $sql);  
	while($row = mysqli_fetch_array($result))  
	{
		$sql = "SELECT * FROM event WHERE (VenueId ='".$row['Id']."' AND StartDateTime >= '".$startdate."') LIMIT 50";
		$result1 = mysqli_query($dbconn, $sql);
		while ($row1 = mysqli_fetch_array($result1)) 
		{
			$filteredarray[] = $row1;
		}	
	}  
	prepareoutput($filteredarray);
	echo $output;
}
// case 1 - 1 - 0
if ($cityid != '' && !empty($typeid) && $startdate =='') 
{
	$sql = "SELECT * FROM venue WHERE CityId = '".$cityid."'"; 
	$result = mysqli_query($dbconn, $sql);  
	while($row = mysqli_fetch_array($result))  
	{
		$venueid = $row['Id'];

		foreach ($typeid as $key => $value) 
		{
			if ($typecount < 2) {
				$sql = "SELECT * FROM event WHERE (VenueId ='".$venueid."' AND EventTypeId = '".$value."' AND StartDateTime >= '".$now."') LIMIT 50";
			}
			elseif ($typecount < 4) {
				$sql = "SELECT * FROM event WHERE (VenueId ='".$venueid."' AND EventTypeId = '".$value."' AND StartDateTime >= '".$now."') LIMIT 18";
			}
			else {
				$sql = "SELECT * FROM event WHERE (VenueId ='".$venueid."' AND EventTypeId = '".$value."' AND StartDateTime >= '".$now."') LIMIT 8";
			}
			$result1 = mysqli_query($dbconn, $sql); 
			while ($row1 = mysqli_fetch_array($result1)) 
			{
				$filteredarray[] = $row1;
			}
		}	
	}
	prepareoutput($filteredarray);
	echo $output;
}
// case 1 - 1 - 1
if ($cityid != '' && !empty($typeid) && $startdate !='') 
{
	$sql = "SELECT * FROM venue WHERE CityId = '".$cityid."'"; 
	$result = mysqli_query($dbconn, $sql);  
	while($row = mysqli_fetch_array($result))  
	{
		$venueid = $row['Id'];
		foreach ($typeid as $key => $value) 
		{
			if ($typecount < 2) {
				$sql = "SELECT * FROM event WHERE (VenueId ='".$venueid."' AND EventTypeId = '".$value."' AND StartDateTime >= '".$startdate."') LIMIT 50";
			}
			elseif ($typecount < 4) {
				$sql = "SELECT * FROM event WHERE (VenueId ='".$venueid."' AND EventTypeId = '".$value."' AND StartDateTime >= '".$startdate."') LIMIT 18";
			}
			else {
				$sql = "SELECT * FROM event WHERE (VenueId ='".$venueid."' AND EventTypeId = '".$value."' AND StartDateTime >= '".$startdate."') LIMIT 8";
			}
			$result1 = mysqli_query($dbconn, $sql); 
			while ($row1 = mysqli_fetch_array($result1)) 
			{
				$filteredarray[] = $row1;
			}
		}	
	}
	prepareoutput($filteredarray);
	echo $output;

}

function prepareoutput($filteredarray)
{
	if (empty($filteredarray)) 
	{
		output("");
	}
	else
	{
		usort($filteredarray, 'orderbydate');
		foreach ($filteredarray as $data) 
		{
			output($data);
		}	
	}
}

function orderbydate($a, $b) 
{
	return $a['StartDateTime'] <=> $b['StartDateTime'];
}

function output($qrow)
{
	global $output, $dbconn;
	if (empty($qrow)) 
	{
		//$output .= '<div class="w3-third w3-container w3-margin-bottom">';
		$output .= '<div class="center w3-padding">';
		$output .= '<p class="w3-teal w3-xxlarge">Sorry!<br/>';
		$output .= 'No results maching your criteria...</p>';
		$output .= '</div>';
	}
	else
	{	
		$sql = "SELECT * FROM venue WHERE Id = '".$qrow['VenueId']."'"; 
		$result1 = mysqli_query($dbconn, $sql); 
		if (!$result1) 
		{
	    printf("Error: %s\n", mysqli_error($dbconn));
	    exit();
		} 
		$row1 = mysqli_fetch_array($result1);

		// Get event start date and time.
		$sqlstartdatetime = strtotime($qrow['StartDateTime']);
		$startdate = date("d M Y", $sqlstartdatetime);
		$getstartdate = date('Y-m-d', $sqlstartdatetime);
		$starttime = date("H:i", $sqlstartdatetime);

		$output .= '<div class="w3-third w3-container w3-margin-bottom">';
		$output .= '<div class="w3-card w3-padding-small">';
		$output .= '<a class="title" href="event.php?eventid='.$qrow['Id'].'&familyeventid='.$qrow["FamilyEventId"].'&date='.$getstartdate.'">';
		$output .= '<div class="w3-display-container">';
		$output .= '<img class="w3-image" style="max-height:200px;width:100%;" src="./images/'.$qrow['ImgUrl'].'">';
		$output .= '</div>';
		$output .= '<h4 style="overflow:hidden;white-space:nowrap;"><b>'.$qrow["Name"].'</b></h4>';
		$output .= '<h5> <i class="fa fa-globe" aria-hidden="true"></i> '.$row1["Name"].'</h5>';
		$output .= '<h5><i class="fa fa-calendar" aria-hidden="true"></i> '.$startdate.'</h5>';
		$output .= '<h5><i class="fa fa-clock-o" aria-hidden="true"></i> '.$starttime.'</h5><br/>';
		$output .= '</a></div>';  
		$output .= '</div>';
	}
}
//print_r($typeid);