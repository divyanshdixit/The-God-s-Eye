<?php

	// db connection

	$conn = mysqli_connect('localhost', 'divyansh_otp', 'devilme96@', 'otp_sms');

	$msg = "";

	if(isset($_POST['submit'])){
		// get image name 

		$image = $_FILES['image']['name'];

		// get the temp name 

		$image_tmp = $_FILES['image']['tmp_name'];

		// image file directory

		$target = "images/".basename($image);

		// insert query 

		$sql = "INSERT INTO user_image(image,image_tmp) VALUES('$image', '$image_tmp')";

		mysqli_query($conn, $sql);

		if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
			echo "<img src='" . $target . "'>";
			echo  $msg = "Image uploaded successfully";
		}else{
			echo  $msg = "Failed to upload";
		}
	}

	$result = mysqli_query($conn, "SELECT * FROM user_image");

	?>


<!DOCTYPE html>
<html>
<head>
	<title>IMage upload to mysql using php</title>
</head>
<body>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="file" name="image"/>
		<button type="submit" name="submit">Save </button>
	</form>

</body>
</html>

