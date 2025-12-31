<?php
$conn = mysqli_connect("localhost", "root", "", "film");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>