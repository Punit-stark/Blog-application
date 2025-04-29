<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['user_id'])){
    echo "You must be logged in to create a post";
    exit;
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title=trim($_POST['title']);
    $content=trim($_POST['content']);
    $user_id=$_SESSION['user_id'];     //foregin key
    if(!empty($title) && !empty($content)){
        $query="INSERT INTO posts(title,content,user_id) VALUES('$title','$content','$user_id')";
        if(mysqli_query($conn,$query)){
            header("Location: index.php");
        }
        else{
            echo"unable to create".mysqli_error($conn);
        }
    }
    else{
        echo "all fields are required";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
<form method="POST" action="">
    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>
    
    <label>Content:</label><br>
    <textarea name="content" rows="5" cols="40" required></textarea><br><br>
    
    <input type="submit" value="Create Post">
</form>
<a href="index.php">Back to Posts</a>
</body>
</html>