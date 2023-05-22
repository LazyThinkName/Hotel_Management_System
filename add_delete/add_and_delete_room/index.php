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
    header("location: ../../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<link href="mycss.css" rel="stylesheet" type="text/css">
</head>
<body>
	<a href="../../homepage/homepageA.php"><button>Back</button></a>
	<div class="table">		
	<a href="addRoom.php"><button>+Add Room</button></a><br><br>
	<table>
		<tr>
			<th>Room Id.</th>
			<th>Room Type</th>
			<th>Room Number</th>
			<th>Details</th>
			<th>Price</th>
			<th>Units</th>
			<th></th>
		</tr>
		<?php
			//connect to database
			$server = "localhost";
			$username = "root";
			$password = "";
			$dbname = "hotel_management";

			//create connection
			$mysqli = mysqli_connect($server, $username, $password, $dbname);

			//check connection
			if (!$mysqli) {
			  die("Connection failed: " . mysqli_connect_error());
			}

            if (isset($_GET['delete'])) {
			    $roomId = $_GET['delete'];
			    $deleteQuery = "DELETE FROM room WHERE roomID = '$roomId'";
			    if (mysqli_query($mysqli, $deleteQuery)) {
			        echo "Record deleted successfully.";
			    } else {
			        echo "Error deleting record: " . mysqli_error($mysqli);
			    }
            }

			//get all data from add_room table
			$query = "SELECT * FROM room";
			$result = mysqli_query($mysqli, $query);
			//display each row of data
			if (mysqli_num_rows($result) > 0) {
			  while($row = mysqli_fetch_assoc($result)) {
			    echo "<tr><td>" . $row["roomID"] . "</td><td>" . $row["roomType"] . "</td><td>" . $row["roomNumber"] . "</td><td>" . $row["detail"] . "</td><td>" . $row["price"] . "</td><td>" . $row["unit"] . "</td><td>". "<a href = ?delete=".$row["roomID"].">Delete</a>"."</td></tr>";
			  }
			}
			//close connection
			$mysqli->close();
		?>
	</table>
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