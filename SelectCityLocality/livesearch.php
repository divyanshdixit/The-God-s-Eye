<?php

   require('db.php');

   $sql = "SELECT * FROM locality
         WHERE city_id LIKE '%".$_POST['id']."%'"; 

   $result = mysqli_query($conn, $sql);

   while($row = mysqli_fetch_object($result)){
   		
   		printf("<option value='".$row->locality_id . "'>" . $row->locality_name . "</option>");

   }
 // echo json_encode($html);
 //   		exit;
?>