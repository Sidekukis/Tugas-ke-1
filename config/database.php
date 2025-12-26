<?php
$conn = mysqli_connect('localhost', 'root', '', 'tracking_task');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>