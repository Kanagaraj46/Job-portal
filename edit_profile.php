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


    <title>Edit Profile</title>
</head>
<body>
<?php include 'header.php'; ?>
    <h2>Edit Profile</h2>
    <form action="process_edit_profile.php" method="POST">
        <input type="text" name="name" value="<?= $user['name']; ?>" required> <br>
        <input type="email" name="email" value="<?= $user['email']; ?>" required> <br>
        <input type="text" name="qualification" value="<?= $user['qualification']; ?>"> <br>
        <input type="text" name="college" value="<?= $user['college']; ?>"> <br>
        <input type="text" name="location" value="<?= $user['location']; ?>"> <br>
        <input type="number" name="experience" value="<?= $user['experience']; ?>"> <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
