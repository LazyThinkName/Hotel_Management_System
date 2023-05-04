<!DOCTYPE html>
<html>
<head>
	<link href="mycss.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="table">		
	<a href="addRoom.php"><button>+Add Room</button></a><br><br>
	<table>
		<tr>
			<th>No.</th>
			<th>Room Type</th>
			<th>Room Number</th>
			<th>Details</th>
			<th>Price</th>
			<th>Units</th>
		</tr>
		<?php
			//connect to database
			$server = "localhost";
			$username = "root";
			$password = "";
			$dbname = "room";

			//create connection
			$mysqli = mysqli_connect($server, $username, $password, $dbname);

			//check connection
			if (!$mysqli) {
			  die("Connection failed: " . mysqli_connect_error());
			}

			//get all data from add_room table
			$query = "SELECT * FROM add_room";
			$result = mysqli_query($mysqli, $query);
			$no = 1;
			//display each row of data
			if (mysqli_num_rows($result) > 0) {
			  while($row = mysqli_fetch_assoc($result)) {
			    echo "<tr><td>" . $no . "</td><td>" . $row["roomtype"] . "</td><td>" . $row["roomnumber"] . "</td><td>" . $row["details"] . "</td><td>" . $row["price"] . "</td><td>" . $row["unit"] . "</td></tr>";
			    $no = $no + 1;
			  }
			}
			//close connection
			$mysqli->close();
		?>
	</table>
	</div>
</body>
</html>