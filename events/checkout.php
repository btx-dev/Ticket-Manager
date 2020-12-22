<?php 
require 'functions/dbconn.php';
include 'header.php';

$output = '';
$sum = 0;
$cart = $_SESSION['cart'];
//print_r($cart);
$output .= '<div class="w3-container w3-padding">';
$output .= '<h2>Order Details: </h2>';
$output .= '<table id="order-table" style="width:100%" class="w3-table-all center">';
$output .= '<tr>';
$output .= '<th>Id</th>';
$output .= '<th>Reference Id</th>';
$output .= '<th>Event</th>';
$output .= '<th>Date</th>';
$output .= '<th>Venue</th>';
$output .= '<th>Seat No</th>';
$output .= '<th>Print</th>';
$output .= '</tr>';

foreach ($cart as $key => $value) 
{
	$output .= '<tr>';
	$output .= '<td>'.$key.'</td>';
	
	foreach ($value as $row => $data) {	
		if ($row =='EventId') {
			$sql = "SELECT Price FROM event WHERE Id='".$data."'";
			$result = mysqli_query($dbconn,$sql);
			$row = mysqli_fetch_assoc($result);
			$price = $row['Price'];
			$sum = $sum + $price;
		}
		$output .= '<td>'.$data.'</td>';

	}
  if (isset($_POST['paymentconfirmation'])) 
  {
    $output .= '<td><input id="print" type="button" value="Print" class="w3-btn w3-blue w3-round-small"  onclick="window.print();return false;"></td>';
    $_SESSION['cart']="";
  }
  else
  {
    $output .= '<td><input id="print" type="button" value="Print" class="w3-btn w3-blue w3-round-small" disabled></td>';
  }
	$output .= '</tr>';	
}
$output .= '</table></div>';
$output .= '<div class="center w3-container w3-padding w3-margin w3-border">';
if (isset($_POST['paymentconfirmation'])) 
{
  $output .= '<div class="w3-tag w3-xxlarge w3-green">Επιτυχής πληρωμή!</div>';
}
else
{
  $output .= '<h2>Order Total: </h2>';
  $output .= '<h2 class="w3-margin-left">€ '.$sum.'</h2>';
}
$output .= '</div>';
echo $output;

?>
<div class="row w3-padding">
  <div class="col-75">
    <div class="container">
      <form action="checkout.php" method="post">
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" class="pay" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" class="pay" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" class="pay" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" class="pay" id="city" name="city" placeholder="New York">
            <input type="hidden" name="paymentconfirmation" id="paymentconfirmation" value="OK">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" class="pay" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" class="pay" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" class="pay" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" class="pay" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" class="pay" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" class="pay" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" class="pay" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Complete Order" class="btn">
      </form>
    </div>
  </div>
</div>
<?php
require 'footer.php';
?>