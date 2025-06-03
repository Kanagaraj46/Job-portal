<?php
include 'db_connect.php';


session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM User_details WHERE user_id='$user_id'");
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <title>Profile</title>
</head>
<body>
<?php include 'header.php'; ?>
    <div class = "profile-box">
    <h2>Profile</h2>
    <img src="<?= $user['photo']; ?>" width="100"> <br>
    <p>Name: <?= $user['name']; ?></p>
    <p>Email: <?= $user['email']; ?></p>
    <p>Qualification: <?= $user['qualification']; ?></p>
    <p>College: <?= $user['college']; ?></p>
    <p>Location: <?= $user['location']; ?></p>
    <p>Experience: <?= $user['experience']; ?> years</p>

    <button><a href="edit_profile.php">Edit Profile</a></button>
    </div>
    <?php if ($user['user_type'] == 'provider') { ?>
        <h3>Jobs Posted</h3>
        <?php
        $jobs = $conn->query("SELECT * FROM Job_postings WHERE user_id='$user_id'");
        while ($row = $jobs->fetch_assoc()) {
            echo "<p>{$row['job_name']} at {$row['company_name']} <a href='view_applicants.php?job_id={$row['job_id']}'>View Applicants</a></p>";
        }
    } else { ?>
        <h3>Jobs Applied</h3>
        <?php
        $applications = $conn->query("SELECT * FROM applications WHERE user_id='$user_id'");
        while ($row = $applications->fetch_assoc()) {
            $job = $conn->query("SELECT * FROM Job_postings WHERE job_id='{$row['job_id']}'")->fetch_assoc();
            echo "<p>Applied for {$job['job_name']} at {$job['company_name']}</p>";
        }
    } ?>
</body>
</html>
