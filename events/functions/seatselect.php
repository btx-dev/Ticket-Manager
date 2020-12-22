<?php
session_start();
require 'dbconn.php';

$eventid = $_POST['eventid'];
$output = '';

$sql = "SELECT * FROM event WHERE Id='".$eventid."'";
$result = mysqli_query($dbconn, $sql); 
$row = mysqli_fetch_assoc($result);

$venueid = $row['VenueId'];
$i = 0;

$sql = "SELECT * FROM subarea WHERE VenueId='".$venueid."'";
$result = mysqli_query($dbconn, $sql);  
while($row = mysqli_fetch_assoc($result))  
{
	$sql = "SELECT * FROM seat WHERE SubAreaId = '".$row['Id']."'"; 
	$result1 = mysqli_query($dbconn, $sql); 
	$output .= '<div class="w3-container w3-margin">';
	$output .= '<p>'.$row['AreaName'].' ('.$row['[Desc]'].')</p>';
	$output .= '<div class="w3-container">';
	$output .= '<select id="seat'.$i.'">';
	while($row1 = mysqli_fetch_array($result1))
	{
		if ($row1['Available']==1) {
			$output .= '<option value="'.$row1["Id"].'">'.$row1["Name"].'</option>'; 
		}
	}
	$output .= '</select>';
	$output .= '<button class="w3-btn w3-teal w3-btn w3-padding w3-round w3-margin-left" id="seat-submit" onclick="addtocart('.$i.')">Επιλογή</button>';
	$output .= '</div></div>'; 
	$output .= '<input id="eventid" style="display: none;" value="'.$eventid .'"></input>'; 
	$i++;
}

echo $output;