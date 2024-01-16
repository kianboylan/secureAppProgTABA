<?php
	header("Content-Security-Policy: default-src 'none'; script-src 'self'; connect-src 'self'; img-src 'self'; style-src 'self';base-uri 'self';form-action 'self'");
?>
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
	</nav>
		<h3>Movie Review Login</h3>
		<!-- Redirects users to registration page if they aren't already registered -->
		<a href="index.php">Register Here</a>
			<!-- Login Form Starts -->
			<form method="POST" action="login_query.php">	
				<div class="alert alert-info">Login</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" required="required"/>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" required="required"/>
				</div>
				<?php
					//If invalid credentials are entered, this error session is ran and an error message is returned to the user
					if(ISSET($_SESSION['error'])){
				?>
				<!-- Displays said error message-->
					<div class="alert alert-danger"><?php echo $_SESSION['error']?></div>
				<?php
					//Used to destroy the 'error' session. This allows the user to reattempt their registration
					unset($_SESSION['error']);
					}
				?>
				<button class="btn btn-primary btn-block" name="login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
			</form>	
</body>
</html>