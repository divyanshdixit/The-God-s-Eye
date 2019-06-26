<?php
session_start();
$_SESSION['username'] = "Divyansh";
 require('db.php');

$localityId = $_POST['id'];


$sql = " SELECT users.user_name,user_details,user_id from user_table as users left join locality as loc on users.locality_id=loc.locality_id where loc.locality_id=$localityId"; 

$result = mysqli_query($conn, $sql);
$i=0;

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
											<div class="box-shad" data-toggle="modal" data-target="#exampleModal"> 
												<h2>' .$row['user_name']  . '</h2>
												<p> ' . $row['user_details'] . '</p>
												<form action="" method="post">
												<button type="submit" name="cook"'.$i.' value="cook"'.$i.'>Hire Now </button>
												</form>
											 </div>
										</div>
										<div class="load-more" lastID="' . $row['user_id'] . '" style="display: none;">
									        <img src="loading.gif"/>
									    </div>';
							}else{
								echo "No results";
							}
							$i++;
						}
							echo '  </div>
						</div>
				</div>';

?>
