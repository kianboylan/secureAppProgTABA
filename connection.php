<?php
	header("Content-Security-Policy: default-src 'none'; script-src 'self'; connect-src 'self'; img-src 'self'; style-src 'self';base-uri 'self';form-action 'self'");
?>
<?php
	//This checks to see if the database already exists. If it doesn't then the database will be created
	if(!is_file('user.sqlite3')){
		file_put_contents('user.sqlite3', null);
	}
	// This creates a connection to the database
	$conn = new PDO('sqlite:user.sqlite3');

	//This sets the attributes of the connection. More specifically, if an error is detect in SQLite, PDO will throw an exception and the running of the script will cease.
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//If it doesn't exist already, this query will create a table within the DB with the fields mentioned below
	$query = "CREATE TABLE IF NOT EXISTS users(user_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username TEXT, password TEXT)";
	
	//This executes the queries
	$conn->exec($query);


?>
