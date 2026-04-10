<?php
$job = $_GET['job'];
$company = $_GET['company'];
$location = $_GET['location'];
$salary = $_GET['salary'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Apply for Job</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
        }
        .form-container {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin: 10px 0;
        }
        button {
            background: blue;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
        }
    </style>
</head>

<body>

<div class="form-container">
    <h2>Apply for <?php echo $job; ?></h2>

    <p><b>Company:</b> <?php echo $company; ?></p>
    <p><b>Location:</b> <?php echo $location; ?></p>
    <p><b>Salary:</b> <?php echo $salary; ?></p>

    <form method="POST" action="submit.php">
        <input type="hidden" name="job" value="<?php echo $job; ?>">
        <input type="hidden" name="company" value="<?php echo $company; ?>">

        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>Upload Resume<br>
        <input type="file" name="resume" required>
        <textarea name="message" placeholder="Why should we hire you?" required></textarea>

        <button type="submit">Submit Application</button>
    </form>
</div>

</body>
</html>