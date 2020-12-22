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
	$output='';

	if (empty($_SESSION['cart']))
	{
		$output .= '<div class="center w3-padding w3-margin">';
		$output .= '<h2> Δεν έχετε κάνει καμία κράτηση!</h2>';
		$output .= '</div>';
	}
	else
	{
		$cart = $_SESSION['cart'];
		//print_r($cart);
		$output .= '<div class="w3-container w3-padding">';
		$output .= '<h2>Οι κρατήσεις σας: </h2>';
		$output .= '<table id="cart-table" style="width:100%" class="w3-table-all center">';
		$output .= '<tr>';
		$output .= '<th>Cart Id</th>';
		$output .= '<th>Event</th>';
		$output .= '<th>Ημερομηνία</th>';
		$output .= '<th>Τοποθεσία</th>';
		$output .= '<th>Αριθμός θέσης</th>';
		$output .= '<th>Ακύρωση</th>';
		$output .= '</tr>';

		foreach ($cart as $key => $value) 
		{
			$output .= '<tr>';
			$output .= '<td>'.$key.'</td>';
			
			foreach ($value as $row => $data) {	
				if ($row != 'EventId') {
					$output .= '<td>'.$data.'</td>';
				}	
			}
			$output .= '<td><input id="cancel" type="button" value="X" class="w3-btn w3-red w3-round-small w3-margin-left"></td>';
			$output .= '</tr>';	
		}
		$output .= '</tr></table></div><br/>';
		$output .= '<button id="checkout" class="w3-btn w3-teal w3-padding w3-round w3-margin-left">Συνέχεια</button>';
	}
	echo $output;
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('.w3-red').click(function(e){
	if (confirm('Είσαστε σίγουροι οτι θέλετε να ακυρώσετε την κράτηση?')) {
		var row = $(this).closest("tr")[0]; 
     	var cells = row.cells;

     	var seatid = cells[4].textContent;
     	var cartid = cells[0].textContent;
		$(this).closest('tr').remove();
		$.ajax({
            url: 'functions/cancel_registration.php',
            type: "POST",
            data: {seatid:seatid, cartid:cartid},
            success: function (data) {
                alert('Η κράτηση ακυρώθηκε επιτυχώς! '+data);
                location.reload();
            }
        });
   	}
});
$('#checkout').click(function(e){
    window.location.href = 'checkout.php';
});
</script>

<?php
include 'footer.php';
?>