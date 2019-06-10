<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
<form action="otpprocess.php" method="post">
	<input type="text" name="otpvalue"/>
	<input type="submit" value="submit">
</form>
</body>
</html>