<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hotel_management";
	$conn = new mysqli("$server", "$username", "$password", "$dbname");
	if($conn->connect_error){
		die("Connection Failed: ".$conn->connect_error);
	}
	$username =$password = "";
	$username_err = $password_err = $login_err = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$username = ($_POST["username"]);
		$password = ($_POST["password"]);
		if ()
?>