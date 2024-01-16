<?php
	header("Content-Security-Policy: default-src 'none'; script-src 'self'; connect-src 'self'; img-src 'self'; style-src 'self';base-uri 'self';form-action 'self'");
?>
<?php
	//Starts session
	session_start();
	//Establishes Database Connection
	require_once 'connection.php';
 
	if(ISSET($_POST['login'])){
		// Setting Variables
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		// This query is used to check if the login credentials are valid. A count is requested where the username and password match what the user inputted.
		$query = "SELECT COUNT(*) as count FROM `users` WHERE `username` = :username AND `password` = :password";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$row = $stmt->fetch();
 
		$count = $row['count'];
		// If the count is greater than 0, then this is classed as a successful login and the user will be brought to the homepage.The count is greater than 0 because when the check was made,it found 1 user with corresponding usernames and passwords.
		if($count > 0){
			header('location:homepage.php');
		}else{
			//This occurs when the count doesn't find any corresponding usernames and passwords that match the user's input. They stay on the login page and will be asked to retry.
			$_SESSION['error'] = "Invalid username or password";
			header('location:login.php');
		}
	}
?>