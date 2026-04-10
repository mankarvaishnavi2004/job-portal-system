<?php 
session_start();
include "db.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    $row = mysqli_fetch_assoc($result);

    if($row){
        $_SESSION['user'] = $username;
        $_SESSION['role'] = $row['role'];   // ✅ ADD THIS

        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid Login');</script>";
    }
}
?>