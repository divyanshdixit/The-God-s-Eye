<?php
session_start();
$_SESSION['error_message'] = "Registration is not done..";
$_SESSION['success_message'] = "Registration is done..";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign up for hire </title>

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
				if(!empty($_POST['email'])){
					$email = $_POST['email'];
					if(!empty($_POST['pass'])){
						$pass = $_POST['pass'];
					}else{
						$passerror = "Password is required";
					}
				}else{
					$Emailerror = "Email is required";
				}
			}else{
				$nameerror = "Username is required";
			}
			if(isset($username) && isset($email) && isset($pass) ){
				$checkquery = "SELECT * FROM signupusers WHERE username = '" . $username. "'"  ;
				if( $checkresult = mysqli_query($conn, $checkquery) ){
					// print_r($checkresult);
					if(mysqli_num_rows($checkresult) > 0){
						echo "<div class='alert-danger text-center'><b>Error:</b> Duplicate entry</div>";
						// echo $_SESSION['username'];
					}else{
						$query = "INSERT INTO signupusers (username, email, password ) VALUES ('$username', '$email', '$pass') ";
						$result = mysqli_query($conn, $query);
						if($result){
							echo "<div class='alert-success'> " .$_SESSION['success_message']. "</div>";
						}else{
							echo "<div class='alert-danger'>Error: " . mysqli_error($conn) . " " .$_SESSION['error_message'] . "</div>";
						}
					}
				}else{
					echo "ERROR : " . $checkquery . mysqli_error($conn);
				}
			}
			
			// if(empty($username) || empty($email) || empty($pass)){
			// 	echo "<div class='alert-danger'>First fill the form the submit</div>";
			// }
		}
	?>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="signupform">
			
		<label for="username">Username: </label>
		<input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; } ?>"/>
		<span class="error alert-danger"><?php if(isset($nameerror)){ echo $nameerror ; } ?></span>

		<label for="email">Email: </label>
		<input type="email" name="email" placeholder="Email id" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>"/>
		<span class="error alert-danger"><?php if(isset($Emailerror)){ echo $Emailerror ; } ?></span>

		<label for="pass">Password: </label>
		<input type="text" name="pass" placeholder="Password" />
		<span class="error alert-danger"><?php if(isset($passerror)){ echo $passerror ; } ?></span>

		<input type="submit" name="submit" value="Submit">

	</form>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>