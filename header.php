
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="navbar">
        <h2>Welcome to Job Portal</h2>
        <a href="index.php">Home</a>
        <a href="logout.php">Logout</a>
        <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'provider') { ?>
            <a href="upload_job.php">Upload Job</a>
        <?php } ?>
    </div>
