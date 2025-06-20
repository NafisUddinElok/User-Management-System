<?php
$conn = mysqli_connect('localhost', 'root', '', 'demo'); // connection to MySQL

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
