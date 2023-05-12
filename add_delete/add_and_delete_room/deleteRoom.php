<!DOCTYPE html>
<html>
<head>

</head>

<body>
	<form method="post">
        <a href="index.php">Back</a>
        <br>
		<label for="roomnumber">Room Number:</label>
		<input type="text" name="roomnumber" required>
		<br>
		<input type="submit" name="Delete">
	</form>

</body>
</html>
<?php
    //connect to the database
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the ID of the room to delete from the form data
    $roomnumber = $_POST['roomnumber'];
    
    // Delete the room from the database
    
    $sql = "SELECT * FROM room WHERE roomnumber = '$roomnumber'";
    $result = mysqli_query($mysqli, $sql);
    
    if (mysqli_num_rows($result)>0) {
        $sql = "DELETE FROM room WHERE roomnumber = '$roomnumber'";
        mysqli_query($mysqli, $sql);
        echo "Room deleted successfully.";
    } else {
        echo "Room " . $roomnumber." not found";
    }
}


    ?>