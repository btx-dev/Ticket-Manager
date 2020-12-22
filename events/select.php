<?php
include 'header.php';
if (!isset($_SESSION['userid'])) 
{
	exit(header('Location: ./login.php')); 
}
else
{
	$date = date('Y-m-d');
	$now = date('Y-m-d\TH:i');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<div class="w3-row-padding w3-margin-bottom"> 
	<div class="w3-container w3-margin-bottom center"> 
		<h2 class="w3-padding">Επιλογές Αναζήτησης: </h2>
	  	<select data-placeholder="Επιλέξτε κατηγορίες..." multiple class="chosen-select" name="typeid[]" id="typeid">
			<option value="" disabled>Οποιαδήποτε κατηγορία</option>  
				<?php echo filltypes(); ?>
		</select>
		<select name="city" id="city">  
			<option value="">Οποιαδήποτε πόλη</option>  
			<?php echo fillcities(); ?>  
		</select>
		<input type="date" name="startdate" id="startdate" <?php echo 'min="'.$date.'"' ?> max="2022-06-14T00:00">
		<button class="w3-btn w3-teal w3-btn w3-padding-small w3-round" id="resetdate" onclick="resetdate()"><i class="fa fa-repeat" aria-hidden="true"></i></button>
		<button class="w3-btn w3-teal w3-btn w3-padding-small w3-round" id="search">Go <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
	</div>
</div>
<div class="w3-container w3-margin-bottom" id="filterresults">  
</div> 
<script type="text/javascript">
$(".chosen-select").chosen({
	no_results_text: "Oops, nothing found!"
});
</script>
<script>
$('#search').click(function(){  
	var typeid = $('#typeid').val();
	var cityid = $('#city').val();
	var startdate = $('#startdate').val(); 
	$.ajax({  
	    url:"functions/do_search.php",  
	    method:"POST",  
	    data:{cityid:cityid, typeid:typeid, startdate:startdate},  
	    success:function(data){  
	         $('#filterresults').html(data);  
	    }  
	});  
});
function resetdate()
{
	document.getElementById("startdate").value="";
};
</script>  
<?php
}

function fillcities()  
{  
	global $dbconn;
	$output = '';  
	$sql = "SELECT * FROM city";  
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