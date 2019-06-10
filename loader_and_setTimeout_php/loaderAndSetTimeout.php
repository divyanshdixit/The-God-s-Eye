<!DOCTYPE html>
<html>
<head>
	<title>Loader</title>
</head>

	<style type="text/css">
		
		.loader{
			position: absolute;
			left:50%;
			top:50%;
			z-index: 1;
			border:15px solid red;
			border-top: 15px solid #333;
			border-radius: 50%;
			width:120px;
			height: 120px;
			-webkit-animation: spin 2s linear infinite;
			animation: spin 2s linear infinite;

		}
		.loader-content{
			position: absolute;
			top:50%;
			left:50%;
		}
		.container{
			position: ;
		}
		@keyframes spin{
			0% {transform: rotate(0deg);}
			100% {transform: rotate(360deg); }
		}

		/*safari*/

		@-webkit-keyframes spin{
			0% {-webkit-transform: rotate(0deg); }
			100% {-webkit-transform: rotate(360deg); }
		}

	</style>

<body>
		<div class="loader"></div>
		
</body>
</html>

<?php

// thif function will use for setTimeout only for using this function as setInterval delete return false line;

function setTimeout($f, $miliseconds){
	$seconds = (int)$miliseconds/1000;

	while(true){
		$f();
		sleep($seconds);
		return false;
	}
}

setTimeout(function(){
	echo "hello";
},2000);

?>