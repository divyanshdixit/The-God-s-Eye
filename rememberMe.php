<div class="center">
<form action="" method="post" id="login">
	<div class= "error-message"><?php if(isset($message) ) {echo $message ; } </div>
		<h4> Pphp login with remmber me functiin </h4>
		<div class= "field-group">
			<label for="login"> Username </label>
			<input name="username" type="text" value="<?php if( isset ( $_COOKIE['user_login]) ) { echo $_COOKIE['user_login'] ;} ?>" class="input-field">
		</div>
		
		<div class= "field-group">
			<label for="password"> Password </label>
			<input name="password" type="password" value="<?php if( isset ( $_COOKIE['userpassword) ) { echo $_COOKIE['userpassword'] ;} ?>" class="input-field">
		</div>
		
		<div class= "field-group">
			<input name="remember" type="checkbox"  id="remember" <?php if( isset ( $_COOKIE['user_login]) ) { ?> checked <?php } ?> />
		</div>
		
		<label for="remember-me">Remember Me </label>
		
		<div class="field-group">
			<input type="submit" name="login" values="login" class="form-submit-button"/>
		</div>
</form>
</div>

<?php
//Create table 'table user'
id,
username,
userpassword

//database config php file

$conn = mysqli_connect("localhost", "dbusername", "dbpassword", "dbname");

// make php cookies to remember usernanme and password will be stored in $_COOKIE[] array

session_start(); // for session

include('db.php');
if( isset($_POST['login']) ){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	$sql = "SELECT * form  tbluser where username = '$username' and userpassword = '$password' ";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	
	if($row){
		$_SESSION['userid'] = $row['id'];
		//check if remember me clicked 
		
		if(!empty($_POST['remember'])){
		//cookie for username
			setcookie("user_login", $_POST['username'], time()+(10*365*24*60*60));
		//cookie for password
			setcookie("userpassword", $_POST['password'], time()+ (10*365*24*60*60));
		}else{
			if(isset($_COOKIE['user_login'])){
				setcookie('user_login', "");
				if(isset($_COOKIE['userpassword'])){
					setcookie('userpassword', "");
				}
			}
			header('location:welcome.php');
		}else{
			$message = "INVALID LOGIN";
		}
	}
	
	?>
