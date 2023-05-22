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

$server = "localhost";
$serverUser = "root";
$password = "";
$dbname = "hotel_management";
$conn = new mysqli("$server", "$serverUser", "$password", "$dbname");
if($conn->connect_error){
	die("Connection Failed: ".$conn->connect_error);
}

$query = "SELECT * FROM user Where username = ?";
$stmt = $conn->prepare($query);
if ($stmt) {
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userDetail = $result->fetch_assoc(); // Fetch the user details

    // Use the $result variable as needed
    // It will contain the result set of the executed query

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/homepageDesign.css">
	<style type="text/css">
		.profile-area {
			margin: auto;
			width: 25%;
			border: 3px solid green;
  			display: none; /* Hide the profile area by default */
  			background-color: #f1f1f1;
  			padding: 20px;
  			margin-top: 20px;
		}
	</style>
	<title>Hotel Management System</title>
</head>
<body>
		<div class = "topnav">
			<!-- <a href="homepageU.php"><img src="../src/homepage.png" class="icon">Homepage</a> -->
			<a href="../bookRoom/bookingPage.php?username=<?php echo urlencode($username); ?>"><img src="../src/addBooking.png" class="icon">Book Room</a>
			<a href="#manageBooking"><img src="../src/manageBooking.png" class="icon">Manage My Booking</a>
			<a href="logout.php" style="float: right;"><img src="../src/logOut.png" class="icon">Log Out</a>   
			<a href="#" style="float:right;" onclick="toggleProfileArea();"><img src="../src/userProfile.png" class="icon">View Profile</a>
			<a href="reportIssue.html" class="float"><img src="../src/report.png" class="icon" >Report Issue</a>
		</div>

		<div class="profile-area" id="profileArea">
		<!-- Profile information goes here -->
		<h2>Profile Information</h2>
		<form action="updateProfile.php" method="POST">
			<input type="hidden" name="userID" value = "<?php echo $userDetail["userID"] ?>">
			<p>Username: <input type="text" name="username" value = "<?php echo $userDetail["username"] ?>"></p>
			<p>Full Name: <input type="text" name="fullname" value = "<?php echo $userDetail["fullname"] ?>"></p>
			<p>Email : <input type="email" name="email" value="<?php echo $userDetail["email"] ?>"></p>
			<p>Phone Number : <input type="tel" name="phoneno" value="<?php echo $userDetail["phoneNo"] ?>"></p>
			<!-- Add more profile information as needed -->
			<button onclick="toggleProfileArea()">Cancel</button>
			<button type="submit">Save</button>
		</form>
	</div>
	<script>
        // Retrieve the username from the query parameters
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const username = urlParams.get('username');

        // Use the username as needed
        console.log('Username:', username);
        // You can update the UI or perform other actions based on the username

        function toggleProfileArea() {
			var profileArea = document.getElementById('profileArea');
			if (profileArea.style.display === 'none') {
				profileArea.style.display = 'block';
			} else {
				profileArea.style.display = 'none';
			}
		}

    </script>
</body>
</html>
