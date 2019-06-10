<?php

session_start();

$hostname = 'localhost';
$username = 'divyansh_otp';
$password = 'devilme96@';
$dbname = 'otp_sms';

$conn = mysqli_connect($hostname, $username, $password, $dbname);

$rno = $_SESSION['otp'];
$urno = $_POST['otpvalue'];

if(!strcmp($rno, $urno)){
	$name = $_SESSION['name'];
	$email = $_SESSION['email'];
	$phone = $_SESSION['contact'];


	$sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone') ";

	if(mysqli_query($conn, $sql)){

		$authkey = "280332AghXeRfcMGC5cfe0148";

		// Mobile numbers 

		$mobileNumber = $_POST['contact'];

		// sender id while using route 4 should be 6 char long

		$senderId = "611332";

		$message = urlencode("Thank you registering with us number.");

		// Define route

		$route = "route=4";

		// prepare post parameteres

		$postData = array(
			'authkey' => $authkey,
			'mobiles' => $mobileNumber,
			'message' => $message,
			'sender' => $senderId,
			'route' => $route
		);

		// api url

		$url = "https://control.msg91.com/api/sendhttp.php";

		// init resource 

		$ch = curl_init();

		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $postData
			// CURLOPT_FOLLOWLOCATION => true
		));

		// ignore ssl certifcate verification

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		// GET RESPONSE

		$output = curl_exec($ch);

		// print error if any

		if(curl_errno($ch)){
			echo 'error: ' . curl_error($ch);
		}

		curl_close($ch);

		header('location:success.php');
	}else{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

}else{
	echo "failure";
	return false;
}
?>