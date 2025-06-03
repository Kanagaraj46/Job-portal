<?php
include 'db_connect.php';


session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'provider') {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <title>Post a Job</title>
</head>
<body>
<?php include 'header.php'; ?>
    <h2>Post a Job</h2>
    <form action="process_upload.php" method="POST">
        <input type="text" name="job_name" placeholder="Job Name" required> <br>
        <input type="text" name="company_name" placeholder="Company Name" required> <br>
        <input type="text" name="qualification" placeholder="Required Qualification" required> <br>
        <input type="text" name="location" placeholder="Job Location" required> <br>
        <input type="text" name="working_hours" placeholder="Working Hours" required> <br>
        <input type="text" name="ctc" placeholder="CTC (Salary)" required> <br>
        <button type="submit">Post Job</button>
    </form>
</body>
</html>
