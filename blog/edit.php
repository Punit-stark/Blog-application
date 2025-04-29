<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit;
}

$post_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM posts WHERE id='$post_id' AND user_id='$user_id'";
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_assoc($result);

if(!$post){
    echo "Post not found.";
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if(!empty($title) && !empty($content)){
        $update = "UPDATE posts SET title='$title', content='$content' WHERE id='$post_id' AND user_id='$user_id'";
        if(mysqli_query($conn, $update)){
            header("Location: index.php");
            exit;
        } else {
            echo "Update failed: " . mysqli_error($conn);
        }
    } else {
        echo "All fields are required.";
    }
}
?>

<form method="POST" action="">
    <h2>Edit Post</h2>
    <label>Title:</label><br>
    <input type="text" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required><br><br>

    <label>Content:</label><br>
    <textarea name="content" rows="5" cols="40" required><?php echo htmlspecialchars($post['content']); ?></textarea><br><br>

    <input type="submit" value="Update Post">
</form>
