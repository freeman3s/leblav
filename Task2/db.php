<?php
$link = mysqli_connect('localhost', 'root', 'root', 'db');
if (!$link) {
  die('<p style="color:red">'.mysqli_connect_errno().' - '.mysqli_connect_error().'</p>');
}
?>