<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hotel_management";
	$conn = new mysqli("$server", "$username", "$password", "$dbname");
	if($conn->connect_error){
		die("Connection Failed: ".$conn->connect_error);
	}
	$fullname = $username = $email = $phoneno = $password = $repeatpassword = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$fullname = ($_POST["fullname"]);
		$username = ($_POST["username"]);
		$email = ($_POST["email"]);
		$phoneno = ($_POST["phoneno"]);
		$password = ($_POST["password"]);
		$repeatpassword = ($_POST["repeatpassword"]);
		if($fullname != "" && $username != "" && $email != "" && $phoneno != "" && $password != "" && $repeatpassword != ""){
			if(!preg_match("/^[a-zA-Z' -]+$/", $fullname)){
				echo"Invalid name";
			}
			else if(preg_match('/^\w{,5}$/', $username)) { 
				echo"Invalid username";
			}
			else if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)){
				echo"Invalid email";
			}
			else if($_POST["password"] != $_POST["repeatpassword"]){
				echo"Password Not Match";
			}
			else if($_POST["password"] == $_POST["repeatpassword"]){
				if(strlen($_POST["password"]) <= 8){
					echo"Your password must contain at least 8 characters";
				}
				else if(!preg_match("#[A-Z]+#",$password)){
					echo"Your password must contain at least 1 capital letter";
				}
				else if(!preg_match("#[a-z]+#",$password)){
					echo"Your password must contain at least 1 small letter";
				}
				else if(!preg_match("#[0-9]+#",$password)){
					echo"Your password must contain at least 1 number";
				}
				else{
					$query = "INSERT INTO STORE VALUES('$fullname', '$username', '$email', '$phoneno', '$password', '$repeatpassword')";
					$data = mysqli_query($conn, $query);
					header('Location: ../html/homepageU.html');
					exit;

				}
			}
		}
		else{
				echo "All fields are required!";
		}
	}
	$conn->close();
?>
