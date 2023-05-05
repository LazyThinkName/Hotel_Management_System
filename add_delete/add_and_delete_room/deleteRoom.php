<!DOCTYPE html>
<html>
<head>

</head>

<body>
	<form method="post">
		<label for="roomnumber">Room Number:</label>
		<input type="text" name="roomnumber" required>
		<br>
		<input type="submit" name="Delete">
	</form>


	<?php
    //connect to the database
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ID of the room to delete from the form data
    $roomnumber = $_POST['roomnumber'];
    
    // Delete the room from the database
    $sql = "DELETE FROM add_room WHERE roomnumber = $roomnumber";
    
    if (mysqli_query($mysqli, $sql)) {
        echo "Room deleted successfully.";
    } else {
        echo "Error deleting room: " . mysqli_error($mysqli);
    }
}


    ?>
</body>
</html>