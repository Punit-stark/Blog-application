<?php
session_start();
include './config/db.php';

if(!isset($_SESSION['user_id'])){    //foregin key
    header("Location: blog/login.php");
    exit;
}

$name=$_SESSION['name'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome: <?php echo htmlspecialchars($name)?></h1>
    <ul>
        <li><a href="./blog/create.php">create post</a></li>
    </ul>
    <p><a href="./auth/logout.php">Logout</a></p>
</body>
</html>