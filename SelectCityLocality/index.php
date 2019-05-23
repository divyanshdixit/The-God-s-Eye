<!DOCTYPE html>
<html>
<head>
    <title>PHP - How to make dependent dropdown list using jquery Ajax?</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <style>
    .pb-20{
padding-bottom: 200px;
}
.box-shad {
    box-shadow: 2px 2px 2px 2px burlywood;
    padding: 16px 20px;
}
.cook-content .col-md-4.col-sm-4.col-xs-12 {
    margin-bottom: 15px;
}
.box-shad h2 {
    margin-top: 0;
}
/*.box-shad:before {
    content: "\f004";
    position: absolute;
    top: 5%;
    right: 3%;
    background-color: transparent;
    cursor: pointer;
    font-size:20px;
    font-family: 'Font Awesome\ 5 Free';
}
*/
.Whitewishlist {
    color: red;
    font-size: 20px;
    display: inline-block;
    float: right;
    cursor:pointer;
}
.Redwishlist {
    color: red;
    font-size: 20px;
    display: inline-block;
    opacity: 0;
    float: right;
    cursor:pointer;
}
</style>
</head>
<body>

<div class="container">
    <div class="card panel-default">
      <div class="card-header">Select State and get bellow Related City</div>
      <div class="card-body">
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
                <select name="city" class="form-control" style="">
                	<option value="">--Select City First--</option>
                </select>
            </div>

      </div>
    </div>
</div>

<div class="container">

	<div class="row">
		<div class="col-md-12">

			<div class="content-show" id="local-content">

			

			</div>

		</div>
	</div>

	</div>


<script>


	$("select[name='city']").change(function(){

		var localId = $(this).val();
		// alert(localId); // 1
		if(localId){
			$.ajax({
				url: "localSearch.php",
				type:"POST",
				data: {'id':localId},
				success: function(data){
					// alert(data);
					if(data!=""){
                	$('#local-content').html(data);
                }else{
                	$('#local-content').html("No");
                }
				}
			});
		}else{
     		
		}
	});



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

<!-- 
<script type="text/javascript">
$(document).ready(function(){
    $(window).scroll(function(){
        var lastID = $('.load-more').attr('lastID');
        if(($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)){
            $.ajax({
                type:'POST',
                url:'localSearch.php',
                data:'id='+lastID,
                beforeSend:function(){
                    $('.load-more').show();
                },
                success:function(html){
                    $('.load-more').remove();
                    $('#postList').append(html);
                }
            });
        }
    });
});
</script> -->

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</body>
</html>