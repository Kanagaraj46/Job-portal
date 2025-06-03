<?php
include 'db_connect.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="/jobportal/css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<title>Job Portal</title>
</head>
<body>
    <div class="navbar">
        <h2>Welcome to Job Portal</h2>
        <a href="profile.php">Profile</a> <a href="logout.php">Logout</a>
        <?php if ($_SESSION['user_type'] == 'provider') { ?>
            <a href="upload_job.php">Upload Job</a>
        <?php } ?>
    </div>

    <h3>Available Jobs</h3>
    
    <?php
    $jobs = $conn->query("SELECT jp.*, u.photo FROM job_postings jp 
                          JOIN user_details u ON jp.user_id = u.user_id"); // Join to get profile pic
    while ($row = $jobs->fetch_assoc()) {
        echo "<div class='job-card'>
                
                <img src='uploads/{$row['photo']}' alt='Profile' class='job-profile-pic'>
                <div class='job-info'>
                    <h4>{$row['job_name']} at {$row['company_name']}</h4>
                    <p>{$row['location']} | {$row['qualification']}</p>
                    <a href='job_details.php?job_id={$row['job_id']}'>View & Apply</a>
                </div>
              </div>";
    }
    ?>
</body>

</html>
