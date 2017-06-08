<?php
require_once 'db.php';
$id = $_GET['id'];
$query = "DELETE FROM todo WHERE id = $id";
$results = mysqli_query($link, $query) or die('Delete query error.');
?>