<?php
	header("Content-Security-Policy: default-src 'none'; script-src 'self'; connect-src 'self'; img-src 'self'; style-src 'self';base-uri 'self';form-action 'self'");
?>
<?php
	
	//Starts the session
	session_start();
 
	//Connects to the database
	require_once 'connection.php';
 
	if(ISSET($_POST['register'])){
		// Set up the variables that will be filled in
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		
		$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
		// This query inserts the user's registration details into the relevant fields in the 'users' table
		$query = "INSERT INTO `users` (username, password) VALUES(:username, :password)";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $hashedPassword);
 
		// This checks if the registration was a success
		if($stmt->execute()){
			//Redirects the user to the login page upon successful registration
			header('location:login.php');
		}
 
	}
?>