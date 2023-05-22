<?php
session_start();
// Retrieve the username from the query parameters or session variable
if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $_SESSION['username'] = $username;
} else if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    // Username not found in the query parameters or session, handle the case accordingly
    // For example, redirect the user to the login page
    header("location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/homepageDesign.css">
	<title>Hotel Management System</title>
</head>
<body>
		<div class = "topnav">
			<a href="../add_delete/add_and_delete_room/index.php?=<?php echo urlencode($username); ?>"> <img src = "../src/addBooking.png" class="icon">Room Details</a>
			<a href="#roomCheck"><img src = "../src/list.png" class="icon">Room Check</a>
			<a href="#bookingDetails"><img src = "../src/manageBooking.png" class="icon">Booking Details</a>
			<a href="#profit"><img src = "../src/profit.png" class="icon">Profit</a>
			<a href="#reportedIssue"><img src = "../src/report.png" class="icon">Reported Issue</a>
			<a href="logout.php"><img src = "../src/logOut.png" class="icon">Log Out</a>
		</div>
	<script>
        // Retrieve the username from the query parameters
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const username = urlParams.get('username');

        // Use the username as needed
        console.log('Username:', username);
        // You can update the UI or perform other actions based on the username
    </script>
</body>
</html>