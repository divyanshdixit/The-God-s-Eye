<!DOCTYPE html>
<html>
<head>
    <title>PHP - How to make dependent dropdown list using jquery Ajax?</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
</head>
<body>

<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Select State and get bellow Related City</div>
      <div class="panel-body">
            <div class="form-group">
                <label for="title">Select State:</label>
                <select name="state" class="form-control">
                    <option value="">--- Select City ---</option>

                    <?php
                        require('db.php');
                        $sql = "SELECT * FROM cities"; 
                        $result = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_object($result)){
         					printf("<option value='".$row->city_id . "'>" . $row->city_name . "</option>");
                        }
                    ?>
                    
                </select>
            </div>

            <div class="form-group">
                <label for="title">Select City:</label>
                <select name="city" class="form-control" style="width:350px">
                </select>
            </div>

      </div>
    </div>
</div>


<script>
$( "select[name='state']" ).change(function () {
    var cityId = $(this).val();

    if(cityId) {

        $.ajax({
            url: "livesearch.php",
            type:"POST",
            data: {'id':cityId},
            // dataType: 'Json',
            success: function(data) {
            	// alert(data);
                $('select[name="city"]').empty();
                $('select[name="city"]').append(data);
            }
        });

    }else{
      $('select[name="city"]').empty();
    }
});
</script>

</body>
</html>