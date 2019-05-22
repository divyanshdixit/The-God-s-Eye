<?php
require_once("db.php");
// $db_handle = new DBController();

if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM locality WHERE locality_name like '" . $_POST["keyword"] . "%' ORDER BY locality_name LIMIT 0,6";
$result = mysqli_query($conn, $query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["locality_name"]; ?>');"><?php echo $country["locality_name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>