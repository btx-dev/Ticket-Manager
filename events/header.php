<?php 
require 'functions/dbconn.php';
session_start();
$page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
	<title>Ticket Manager</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="icon" href="images/logo.png">
	<link href="style/eventsStyle.css" rel="stylesheet" type="text/css" />
	<link href="style/w3.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<meta property="og:url"           content="http://localhost/events/event.php" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Ticket Manager" />
	<meta property="og:description"   content="Application for registering for an event." />
	<meta property="og:image"         content="images/banner.jpg" />
</head>
<body>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="sidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="images/logo.png" style="width:45%;" class="w3-round">
    <h4><b>Ticket Manager</b></h4>
    <p class="w3-text-grey">Template by W3.CSS</p>
  </div>
  <div class="w3-bar-block">
    <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding <?php if($page=='index.php'){echo 'w3-teal';} ?>"><i class="fa fa-home fa-fw w3-margin-right"></i>Αρχική</a> 
    <a href="select.php" id="select.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding <?php if($page=='select.php'){echo 'w3-teal';} ?>"><i class="fa fa-calendar fa-fw w3-margin-right"></i>Αναζήτηση</a>
<?php 
    if (isset($_SESSION['userid']) && $_SESSION['userid'] == '1') 
    {
       $addevent = '<a href="new_event.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding ';
       $adminpanel = '<a href="dashboard.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding ';
       if($page =='new_event.php')
        {
          $addevent .= 'w3-teal"><i class="fa fa-plus fa-fw w3-margin-right"></i>Προσθήκη</a>';
          $adminpanel .= '"><i class="fa fa-heartbeat fa-fw w3-margin-right"></i>Dashboard</a>';   
        } 
        elseif($page =='dashboard.php')
        {
          $addevent .= '"><i class="fa fa-plus fa-fw w3-margin-right"></i>Προσθήκη</a>';
          $adminpanel .= 'w3-teal"><i class="fa fa-heartbeat fa-fw w3-margin-right"></i>Dashboard</a>';
        }
        else
        {
          $addevent .= '"><i class="fa fa-plus fa-fw w3-margin-right"></i>Προσθήκη</a>';
          $adminpanel .= '"><i class="fa fa-heartbeat fa-fw w3-margin-right"></i>Dashboard</a>';
        }
        echo $adminpanel.$addevent;
    }
?>
    <a href="cart.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding <?php if($page=='cart.php'){echo 'w3-teal';} ?>"><i class="fa fa-shopping-cart fa-fw w3-margin-right"></i>Καλάθι</a>

<?php
    if (isset($_SESSION['userid'])) 
    { 
      $sql = "SELECT UserName FROM users WHERE Id=?";
      $stmt = mysqli_stmt_init($dbconn);
      // Check the connection to database.
      if (!mysqli_stmt_prepare($stmt, $sql)) 
      {
        exit(header('Location: /logout.php?error=sqlerror')); 
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
          <a href="profile.php" id="profile.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding <?php if($page=='profile.php'){echo 'w3-teal';} ?>"><i class="fa fa-user fa-fw w3-margin-right"></i> <?php echo $row['UserName'];?></a>
          <a href="./functions/logout.php"  onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out fa-fw w3-margin-right"></i> Έξοδος</a>
<?php
        }
      }
    }
    else
    { 
?>
      <a href="signup.php" id="signup.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding <?php if($page=='signup.php'){echo 'w3-teal';} ?>"><i class="fa fa-user-plus fa-fw w3-margin-right"></i> Εγγραφή</a>
      <a href="login.php" id="login.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding <?php if($page=='login.php'){echo 'w3-teal';} ?>"><i class="fa fa-sign-in fa-fw w3-margin-right"></i> Είσοδος</a>
<?php
    } 
?>
</div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="overlay"></div>

<!-- !PAGE CONTENT! -->
<div id="w3-main" class="w3-main" style="margin-left:300px">

<!-- Header -->
<header id="portfolio">
  <a href="index.php"><img src="images/logo.png" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
  <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
  <div class="w3-container">
  <h1><b>Ticket Manager</b></h1>
  <div class="w3-section w3-bottombar w3-padding-16"></div>
  </div>
</header>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("sidebar").style.display = "block";
    document.getElementById("overlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("sidebar").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}
</script>