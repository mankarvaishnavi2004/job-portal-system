<?php
session_start();
include "db.php";

$user = $_SESSION['user'];
$job_id = $_GET['id'];

mysqli_query($conn, "INSERT INTO applications (username, job_id) VALUES ('$user', '$job_id')");

header("Location: dashboard.php");
?>