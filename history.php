<?php
session_start();
include "db.php";

$user = $_SESSION['user'];

$query = "SELECT jobs.title, jobs.company 
          FROM applications 
          JOIN jobs ON applications.job_id = jobs.id 
          WHERE applications.username='$user'";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Applications</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <h2>My Applications</h2>

    <table class="table">
        <tr>
            <th>Job Title</th>
            <th>Company</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['company']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>