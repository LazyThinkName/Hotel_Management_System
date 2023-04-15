<?php
	$localhost = "localhost";
	$username = "root";
	$passwrd = "";
	$dbname = "signupdatabase";
	$connect = new mysqli($localhost, $username, $passwrd, $dbname);

	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$phoneno = $_POST['phoneno'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repeatpassword = $_POST['repeatpassword'];
	if($password === $repeatpassword ){
		$query = "INSERT INTO STORE VALUES('$fullname', '$username', '$phoneno', '$email', '$password', '$repeatpassword')";
		$data = mysqli_query($connect, $query);
		echo("Successfully signed up");
		$connect -> close();
	}
	else{
		echo"Password do not match, try again";
	}
?>
