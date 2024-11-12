<?php
include("C:/Users/337314/OneDrive - Milton Keynes College O365/PHP");
require 'config.php';
if(isset($_POST["submit"])){
    $username = $_POST["Username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' ");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or Email Has already Taken');</script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUES('', '$username', '$email', '$password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Registration successfull');</script>";
        }
        else{
            echo
            "<script> alert('Password Does not match');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username:">
            </div>

            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>

            <div class="form-group">
                <input type="Password" class="form-control" name="Password" placeholder="Password:">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="confirm_password" placeholder="Confirm password:">
            </div>

            <div class="form-group">
                <input type="submit"  class="btn btn-primary"  value="Register" name="submit">
            </div>

        </form>

        <a href="login.php">Login</a>
    </div>
</body>
</html>