<?php
include '../config/db.php';
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=trim($_POST['name']);
    $pass=trim($_POST['password']);

    if(!empty($name) && !empty($pass)){
        $query="SELECT * FROM users where name='$name'";
        $result=mysqli_query($conn,$query);
        $user=mysqli_fetch_assoc($result);

        //password verify
        if($user['password']==$pass){
            $_SESSION['user_id']=$user['id'];
            $_SESSION['name']=$user['name'];
            header("Location: ../dashboard.php");
            exit;
        }
        else{
            echo "invalid name and password";
        }
    }
    else{
        echo "both fields are required";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login User</h1>
    <form action="" method="POST">
        <input type="text" name='name' placeholder="enter your name">
        <input type="password" name='password' placeholder="enter your password">
        <button type="submit">Login</button>
    </form>
    <p><a href="../auth/register.php">Don't have account</a></p>
</body>
</html>