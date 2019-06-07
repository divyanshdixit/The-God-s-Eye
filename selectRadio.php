<!-- Get the selected values using submit button -->

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<select name="city">
			<option value="kanpur"> Kanpur</option>
			<option value="Lucknow"> Lucknow</option>
			<option value="Mainpuri">Mainpuri</option>
			<option value="Allahabad">Allahabad</option>
		</select>
		<input type="submit" name="citySave" value="Get values">
	</form>


	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<select name="color[]" multiple="multiple">
			<option value="Red"> Red</option>
			<option value="green"> Green</option>
			<option value="blue"> Blue</option>
			<option value="pink"> Pink</option>
			<option value="yellow">Yellow</option>
		</select>
		<input type="submit" name="submit" value="Get values">
	</form>


	<form action="" method="post">
		<input type="radio" name="gender" value="male">Male 
		<input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="not specified">Not Specified

		<input type="submit" name="save" value="get values">
	</form>

</body>
</html>

<?php

// to get the single value from select options

if(isset($_POST['citySave'])){
	$selected_val = $_POST['city']; //storing selected values in variable;
	echo "You have selected: " . $selected_val;
}


// to get the value of multiselect option from select tag

if(isset($_POST['submit'])){
	// as $_POST['color'] have an array of values so we have to use foreach loop to display the value

	echo "Selected values are: ";

	foreach($_POST['color'] as $select){
		echo $select . "<br>";
	}
}

	// To get the radio selected values 

	if(isset($_POST['save'])){
		if(isset($_POST['gender'])){
			echo "You have selected: " . $_POST['gender']; //displaying the selected values
		}
	}

?>