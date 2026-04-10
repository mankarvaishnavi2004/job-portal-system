<?php
include 'db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$location = $_POST['location'];
$salary = $_POST['salary'];

$conn->query("INSERT INTO jobs (title, description, location, salary)
VALUES ('$title','$description','$location','$salary')");

header("Location: dashboard.php");
?>