<?php
$server = "localhost:3307";   //mention port if change
$username = "root";
$password = ""; // empty string
$dbname = "blog_db";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
