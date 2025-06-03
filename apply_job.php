<?php
include 'db_connect.php';


session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'seeker') {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$job_id = $_POST['job_id'];
$resume = "uploads/" . basename($_FILES['resume']['name']);
move_uploaded_file($_FILES['resume']['tmp_name'], $resume);

$sql = "INSERT INTO applications (user_id, job_id, resume) VALUES ('$user_id', '$job_id', '$resume')";

if ($conn->query($sql) === TRUE) {
    echo "Applied successfully! <a href='index.php'>Back to Home</a>";
} else {
    echo "Error: " . $conn->error;
}
?>
