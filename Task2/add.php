<?php
require_once 'db.php';
if (isset($_POST['title'])) {
	$title = $_POST['title'];
} else {
	die('Emply Title!');
}
if (isset($_POST['description'])) {
	$description = $_POST['description'];
} else {
	die('Emply Description!');
}
$query = 'SELECT id FROM todo ORDER BY id desc';
$results = mysqli_query($link, $query) or die('Add query error.');
$records_count = $results->fetch_object();
$records_count->id++;
$query = "INSERT INTO todo VALUES($records_count->id, $title, $description)";
mysqli_query($link, $query) or die('Insert error.');
?>