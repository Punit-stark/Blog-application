<?php
include '../config/db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $pass=trim($_POST['password']);

    if(!empty($name) && !empty($email) && !empty($pass)){
        $query="INSERT INTO users(name,email,password) VALUES('$name','$email','$pass')";
        if(mysqli_query($conn,$query)){
            header("Location: login.php");
            exit;
        }
        else{
            echo "unable to register";
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
    <title>Register</title>
</head>
<body>
    <h1>Register User</h1>
  <form method="POST" action="">

  <input type="text" name='name' required placeholder="enter your name">
  <input type="email" name='email' required placeholder="enter your email">
  <input type="password" name='password' required placeholder="enter your password">
  <button type="submit">Register</button>
  </form>

  <p><a href="../auth/login.php">Already have account</a></p>
   
</body>
</html>