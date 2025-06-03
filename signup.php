<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="/jobportal/css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">


</head>
<body>
    <h2>Signup</h2>
    <form action="process_signup.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="photo" required> <br>
        <input type="text" name="name" placeholder="Full Name" required> <br>
        <input type="email" name="email" placeholder="Email" required> <br>
        <input type="password" name="password" placeholder="Password" required> <br>
        <input type="text" name="qualification" placeholder="Qualification"> <br>
        <input type="text" name="college" placeholder="College"> <br>
        <input type="text" name="location" placeholder="Location"> <br>
        <input type="number" name="experience" placeholder="Experience (in years)"> <br>
        <select name="user_type">
            <option value="seeker">Job Seeker</option>
            <option value="provider">Job Provider</option>
        </select> <br>
        <button type="submit">Signup</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>
