<?php
	session_start();
	require_once 'connection.php';

	if (isset($_POST['login'])) {
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		// This selects the info from the database and compares it to the user's input
		$query = "SELECT password FROM `users` WHERE `username` = :username";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		//This fetches the next row in a database as it checks for the inputted password
		$row = $stmt->fetch();

		if ($row) {
			// If there is a user with the supplied username, the password is checked 
			$hashedPassword = $row['password'];

			//The password verify method checks the plaintext password, hashes it, and compares it to the other hashed passwords within the database to see if the hashes match.
			//If they do, the user can successfully login
			if (password_verify($password, $hashedPassword)) {
				// User is brought to homepage 
				header('location: homepage.php');
				exit();
			} else {
				// Password does not match
				$_SESSION['error'] = "Invalid password or password";
			}
		} else {
			// No user with the given username
			$_SESSION['error'] = "Invalid username or password";
		}

		// Redirect back to the login page
		header('location: login.php');
		exit();
	}
?>
