<?php
include 'db_connect.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$user_id = $_SESSION['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$qualification = $_POST['qualification'];
$college = $_POST['college'];
$location = $_POST['location'];
$experience = $_POST['experience'];

$sql = "UPDATE User_details SET name='$name', email='$email', qualification='$qualification', college='$college', location='$location', experience='$experience' WHERE user_id='$user_id'";

if ($conn->query($sql) === TRUE) {
    echo "Profile updated successfully! <a href='profile.php'>Back to Profile</a>";
} else {
    echo "Error updating profile: " . $conn->error;
}
?>
