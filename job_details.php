<?php
include 'db_connect.php';


session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$job_id = $_GET['job_id'];
$job = $conn->query("SELECT * FROM job_postings WHERE job_id='$job_id'")->fetch_assoc();
$provider = $conn->query("SELECT * FROM user_details WHERE user_id='{$job['user_id']}'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<title>Job Details</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class = "job-box">
    <h2><?= $job['job_name']; ?> at <?= $job['company_name']; ?></h2>
    <p><strong>Qualification:</strong> <?= $job['qualification']; ?></p>
    <p><strong>Location:</strong> <?= $job['location']; ?></p>
    <p><strong>Working Hours:</strong> <?= $job['working_hours']; ?></p>
    <p><strong>CTC:s</strong> <?= $job['CTC']; ?></p>

    <!-- Job Provider Details -->
    <h3>Job Posted By:</h3>
    <img src="<?= $provider['photo']; ?>" alt="Provider Image" style="width: 60px; height: 60px; border-radius: 50%;">
    <p><strong>Name:</strong> <?= $provider['name']; ?></p>
    <p><strong>Email:</strong> <?= $provider['email']; ?></p>
</div>
    <?php if ($_SESSION['user_type'] == 'seeker') { ?>
        <form action="apply_job.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="job_id" value="<?= $job_id; ?>">
            <input type="file" name="resume" required> <br>
            <button type="submit">Apply Now</button>
        </form>
    <?php } ?>
</body>
</html>
