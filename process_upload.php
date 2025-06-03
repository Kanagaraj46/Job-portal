<?php
include 'db_connect.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'provider') {
    header("Location: index.php");
}

$job_name = $_POST['job_name'];
$company_name = $_POST['company_name'];
$qualification = $_POST['qualification'];
$location = $_POST['location'];
$working_hours = $_POST['working_hours'];
$ctc = $_POST['ctc'];
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO Job_postings (user_id, job_name, company_name, qualification, location, working_hours, ctc) 
        VALUES ('$user_id', '$job_name', '$company_name', '$qualification', '$location', '$working_hours', '$ctc')";

if ($conn->query($sql) === TRUE) {
    echo "Job posted successfully! <a href='index.php'>Back to Home</a>";
} else {
    echo "Error: " . $conn->error;
}
?>
