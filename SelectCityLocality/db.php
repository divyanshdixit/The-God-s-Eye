<?php
	
	$hostname = "localhost";
	$username = "divyansh";
	$pass = "divyansh123";
	$dbname = "search_filter";
	$conn = mysqli_connect('localhost', 'divyansh', 'divyansh123', 'search_filter');
	if(!$conn){
		echo "Connection failed";
	}
?>