<?php
include 'db_connect.php';


session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'provider') {
    header("Location: index.php");
}

$job_id = $_GET['job_id'];
$job = $conn->query("SELECT * FROM Job_postings WHERE job_id='$job_id'")->fetch_assoc();
$applicants = $conn->query("SELECT * FROM applications WHERE job_id='$job_id'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <title>Applicants for <?= $job['job_name']; ?></title>
</head>
<body>
<?php include 'header.php'; ?>
  <div class = "applicant-box">
    <h2>Applicants for <?= $job['job_name']; ?></h2>
    <?php while ($row = $applicants->fetch_assoc()) {
        $user = $conn->query("SELECT * FROM User_details WHERE user_id='{$row['user_id']}'")->fetch_assoc();
    ?>
        <p>Name: <?= $user['name']; ?> | Email: <?= $user['email']; ?> | <a href="<?= $row['resume']; ?>" target="_blank">View Resume</a></p>
    <?php } ?>
    </div>
</body>
</html>
