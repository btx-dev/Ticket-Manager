<?php 
include 'header.php';

if (!isset($_SESSION['userid'])) 
{
	exit(header('Location: /events/login.php')); 
}
else
{
$date = date('Y-m-d\TH:i');
$time = time();
?>
<div class="center">
	<form enctype="multipart/form-data" class="userInput" action="/events/functions/add_event.php" method="post">
		<h3>Create Event</h3>
		<div class="tooltip w3-margin-bottom">
			<p class="tooltiptext">Title</p>
			<input type="text" name="title" placeholder="Title">
		</div><br>
		<div class="tooltip w3-margin-bottom">
			<p class="tooltiptext">Description</p>
			<textarea type="text" name="description" placeholder="Description"></textarea>
		</div><br>
		<div class="tooltip w3-margin-bottom">
			<p class="tooltiptext">Type</p>
			<span class="pretext">Select Type</span><br>
			<select name="type" id="type">  
				<option value="">Select Type</option>  
				<?php echo filltypes(); ?>  
			</select>
		</div><br/>
		<div class="tooltip w3-margin-bottom">
			<p class="tooltiptext">Venue</p>
			<span class="pretext">Select Venue</span><br>
			<select name="venue" id="venue">  
				<option value="">Select Venue</option>  
				<?php echo fillvenues(); ?>  
			</select>
		</div><br/>
		<div class="tooltip w3-margin-bottom">
			<span class="pretext">Starting Date and Time</span><br>
			<input type="datetime-local" id="meeting-start-time" name="meeting-start-time" <?php echo 'min="'.$date.'"' ?> max="2022-06-14T00:00">
			<p class="tooltiptext">Starting Date and Time</p>
		</div><br>
		<div class="tooltip w3-margin-bottom">
			<span class="pretext">Ending Date and Time</span><br>
			<input type="datetime-local" id="meeting-end-time" name="meeting-end-time" <?php echo 'min="'.$date.'"' ?> max="2022-06-14T00:00">
			<p class="tooltiptext">Ending Date and Time</p>
		</div><br>
		<div class="tooltip w3-margin-bottom">
			<p class="tooltiptext">Price</p>
			<input type="text" name="price" placeholder="Price (use 0 for free)">
		</div><br>
		<div class="tooltip w3-margin-bottom">
			<p class="tooltiptext">Family Event</p>
			<input type="text" name="family-event" placeholder="Family Event">
		</div><br>
		<div class="tooltip w3-margin-bottom">
			<p class="tooltiptext">Banner</p>
			<span class="pretext">Banner</span><br>
			<span class="pretext">(Suggested size: 1280 x 300)</span><br>
			<input type="file" id="banner" name="banner" accept="image/png, image/jpeg"><br>
		</div><br>
		<button class="w3-btn w3-teal w3-btn w3-padding-large w3-round w3-margin-bottom" type="submit" name="add-event-submit">Create</button>

	</form>
</div>
<?php
}

function fillvenues()  
{  
	global $dbconn;
	$output = '';  
	$sql = "SELECT * FROM venue";  
	$result = mysqli_query($dbconn, $sql);  
	while($row = mysqli_fetch_array($result))  
	{  
		$output .= '<option value="'.$row["Id"].'">'.$row["Name"].'</option>';  
	}  
	return $output;  
}
function filltypes()  
{  
	global $dbconn;
	$output = '';  
	$sql = "SELECT * FROM eventtype";  
	$result = mysqli_query($dbconn, $sql);  
	while($row = mysqli_fetch_array($result))  
	{  
		$output .= '<option value="'.$row["Id"].'">'.$row["Name"].'</option>';  
	}  
	return $output;  
} 

include 'footer.php';
?>