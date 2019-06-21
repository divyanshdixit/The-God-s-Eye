
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login for hire </title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

	<?php
	// connection to database
			$servername = "localhost";
			$uname = "divyansh_search";
			$serverpass = "devilme96@";
			$dbname =  "search";

			$conn = mysqli_connect($servername, $uname, $serverpass, $dbname);

		if(isset($_POST['submit'])){
			if(!empty($_POST['username'])){	
				$username = $_POST['username'];
					$_SESSION['username'] = $username;
					if(!empty($_POST['pass'])){
						$pass = $_POST['pass'];
					}else{
						$passerror = "Password is required";
					}
			}else{
				$nameerror = "Username is required";
			}

			if(!empty($username) && !empty($pass)){
				$checkquery = "SELECT * FROM signupusers WHERE username = '" .$username. "' AND password = '" . $pass . "'";
				$result = mysqli_query($conn, $checkquery);
				if(mysqli_num_rows($result)>0){
					echo "<div class='alert-success text-center'>" .$_SESSION['username'] . " Successfully logged in. </div>";
				}else{
					echo "<div class='alert-danger'> <b> Error: </b> Invalid username or password.</div>";
				}
			}
		}
		?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="loginform">
			
		<label for="username">Username: </label>
		<input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; } ?>"/>
		<span class="error alert-danger"><?php if(isset($nameerror)){ echo $nameerror ; } ?></span>

		<label for="pass">Password: </label>
		<input type="text" name="pass" placeholder="Password" />
		<span class="error alert-danger"><?php if(isset($passerror)){ echo $passerror ; } ?></span>

		<input type="submit" name="submit" value="Submit">

	</form>