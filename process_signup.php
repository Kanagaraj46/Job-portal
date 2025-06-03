<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $qualification = $_POST['qualification'];
    $college = $_POST['college'];
    $location = $_POST['location'];
    $experience = $_POST['experience'];
    $user_type = $_POST['user_type'];

    // Upload photo
    $photo = "uploads/" . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $photo);

    $sql = "INSERT INTO User_details (photo, name, email, password, qualification, college, location, experience, user_type) 
            VALUES ('$photo', '$name', '$email', '$password', '$qualification', '$college', '$location', '$experience', '$user_type')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Signup successful! <a href='login.php'>Login here</a>";
    } else {
        
        header("Location: signup.php");
    }
}
?>
