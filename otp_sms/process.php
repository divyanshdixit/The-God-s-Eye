<?php

session_start();

// Your authentication key

$authkey = "280332AghXeRfcMGC5cfe0148";

// Mobile numbers 

$mobileNumber = $_POST['contact'];

// sender id while using route 4 should be 6 char long

$senderId = "611332";

// Your message to send 

$randNo = rand(1000, 9999);

$message = urlencode("otp number." . $randNo);

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

if(isset($_POST['submit'])){
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['contact'] = $_POST['contact'];
	$_SESSION['otp'] = $randNo;

	header('location: otp.php');
}

?>