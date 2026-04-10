<?php
$conn = new mysqli("localhost", "root", "", "job_portal");

$result = $conn->query("SELECT * FROM jobs");

session_start();

if(!isset($_SESSION['user'])){
    header("Location: index.html");
    exit();
}

include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CSS/style.css">
    <title>Job Dashboard</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: #f4f6f9;
        }

        .navbar {
            background: #007bff;
            color: white;
            padding: 15px;
            text-align: right;
        }

        .container {
            width: 90%;
            margin: 30px auto;
        }

        .search-box {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-box input {
            padding: 10px;
            width: 300px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .search-box button {
            padding: 10px 15px;
            background: black;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .jobs {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .card h3 {
            margin: 0;
            color: #333;
        }

        .card p {
            margin: 8px 0;
            color: #555;
        }

        .apply-btn {
            margin-top: 10px;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .apply-btn:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

<nav class="navbar p-3">
    <div class="container-fluid">
        <span class="navbar-brand text-white">Job Portal</span>

        <div>
            <span class="text-white me-3">
                Welcome, <?php echo $_SESSION['user']; ?>
            </span>

            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</nav>


<div class="container">

    <div class="search-box">
        <input type="text" placeholder="Search jobs...">
        <button>Search</button>
    </div>

   <div class="jobs">
    <?php while($row = $result->fetch_assoc()) { ?>
        <div class="card">
            <h3><?php echo $row['title']; ?></h3>
            <p><b>Company:</b> <?php echo $row['description']; ?></p>
            <p><b>Location:</b> <?php echo $row['location']; ?></p>
            <p><b>Salary:</b> <?php echo $row['salary']; ?></p>

            <!-- SAME BUTTON FOR ALL JOBS -->
            <button class="apply-btn"
                data-job="<?php echo $row['title']; ?>"
                data-company="<?php echo $row['description']; ?>"
                data-location="<?php echo $row['location']; ?>"
                data-salary="<?php echo $row['salary']; ?>">
                Apply
            </button>
        </div>
    <?php } ?>
</div>
</div>

<script>
document.querySelectorAll('.apply-btn').forEach(button => {
    button.addEventListener('click', function() {
        let job = this.dataset.job;
        let company = this.dataset.company;
        let location = this.dataset.location;
        let salary = this.dataset.salary;

        window.location.href = `apply.php?job=${job}&company=${company}&location=${location}&salary=${salary}`;
    });
});
</script>

</body>
</html>
