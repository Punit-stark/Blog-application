<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit;
}

$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM posts WHERE user_id='$user_id'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Blog Dashboard</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <div style="max-width: 800px; margin: auto; background: white; padding: 30px; border-radius: 8px;">
        <h1 style="text-align: center; color: #333;">
            Welcome, <?php echo htmlspecialchars($name); ?> 👋
        </h1>
        <h2 style="border-bottom: 2px solid #ccc; padding-bottom: 10px;">Your Blog Posts</h2>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <div style="background-color: #fafafa; border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
                <h3 style="margin: 0; color: #0056b3;"><?php echo htmlspecialchars($row['title']); ?></h3>
                <p style="margin-top: 10px;"><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
                <a href="edit.php?id=<?php echo $row['id']; ?>" style="margin-right: 10px; color: green;">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" style="color: red;" onclick="return confirm('Are you sure you want to delete this post?');">Delete</a>
            </div>
        <?php } ?>
        
        <a href="create.php" style="display: inline-block; margin-top: 20px; padding: 10px 15px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px;">+ Create New Post</a>
        <br><br>
        <a href="../auth/logout.php" style="color: red; text-decoration: none;">Logout</a>
    </div>

</body>
</html>
