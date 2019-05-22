<?php
session_start();
 require('db.php');

$localityId = $_POST['id'];


$sql = " SELECT * FROM btm_user_table LEFT JOIN locality ON btm_user_table.locality_id = locality.locality_id WHERE locality_id = '$localityId' "; 
if($sql){
echo "ok";
}else{
	echo "nopt ok";
}

$result = mysqli_query($conn, $sql);

echo $result;



	echo '<div class="container">
			<div class="row">

				<div class="col-md-12">

					<div class="Heading pb-20 text-center">
						<h1> Welcome ' . $_SESSION['username'] . ' </h1>
						<p> Hope you will get the maximum benifits from us. </p>
					</div>
				</div>
				</div>
					<div class="cook-content">
					<div class="row">';
						while($row = mysqli_fetch_assoc($result)){
						if(!empty($row)){

								echo  '<div class="col-md-4 col-sm-4 col-xs-12">
											<div class="box-shad"> 
												<h2>' . $row['user_name']  . '</h2>
												<p> ' . $row['user_details'] . '</p>
											 </div>
										</div>';
							}else{
								echo "No results";
							}
						}
							echo '	</div>
						</div>
				</div>';

?>