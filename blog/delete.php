<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit;
}

$post_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$query = "DELETE FROM posts WHERE id='$post_id' AND user_id='$user_id'";
if(mysqli_query($conn, $query)){
    header("Location: index.php");
} else {
    echo "Delete failed: " . mysqli_error($conn);
}
?>
