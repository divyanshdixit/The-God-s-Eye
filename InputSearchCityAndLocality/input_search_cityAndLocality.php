<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>

<div class="frmSearch">

    <select name="city">
        <option value="1">Delhi</option>
        <!-- <option value="2">Bangalore</option> -->
    </select>

    <input type="text" id="search-box" placeholder="Localtiy Name" />
    <div id="suggesstion-box"></div>
</div>

<!-- <form method="post" action="<?php $_SERVER['PHP_SELF']?>"> 
    

</form> -->

<script type="text/javascript">
    
    //ajax call for autocomplete

$(document).ready(function(){
    $("#search-box").on('keyup',function(){

        $.ajax({
        type: "POST",
        url: "localitysearch.php",
        data:'keyword='+$(this).val(),
        success: function(data){
            $("#suggesstion-box").show();
            $("#suggesstion-box").html(data);
            $("#search-box").css("background","#FFF");
        }
        });
    });
});
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}

</script>
</body>
</html>