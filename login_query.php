<?php
	//starting the session
	session_start();
	//including the database connection
	require_once 'conn.php';
 
	if(ISSET($_POST['login'])){
		// Setting variables
		$username = $_POST['username'];
		$password = $_POST['password'];
 
		// Select Query for counting the row that has the same value of the given username and password. This query is for checking if the access is valid or not.
		$query = "SELECT COUNT(*) as count FROM `member` WHERE `username` = :username AND `password` = :password";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$row = $stmt->fetch();
 
		$count = $row['count'];

		//If there is matching usernames and passwords present in the database table, the count will be greater than 0 so this will allow the user to log in 
		if($count > 0){
			header('location:home.php');
		//But if there is nothing in the table, then the user will not be granted access and will be told that the username or password are incorrect
		}else{
			$_SESSION['error'] = "Invalid username or password";
			header('location:login.php');
		}
	}
?>
