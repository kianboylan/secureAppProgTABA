<!DOCTYPE html>
<?php 
//starting the session
session_start();
?>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
		<h3>Movie Review Registration</h3>
		<a href="login.php">Log In Here</a>
		<!-- Start of Registration Form -->
			<form method="POST" action="save_user.php">	
				<div class="alert alert-info">Registration</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" required="required"/>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" required="required"/>
				</div>
				<button class="btn btn-primary btn-block" name="register"><span class="glyphicon glyphicon-save"></span> Register</button>
			</form>	
			<!-- End of Registration Form -->
</body>
</html>