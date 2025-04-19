<?php
session_start();

$host = "localhost";
$port = "3307";
$username = "root";
$password = "";
$database = "registration_db";

$conn = new mysqli($host, $username, $password, $database, $port);
if ($conn->connect_error) {
    $_SESSION['status'] = "Database connection failed!";
    $_SESSION['status_type'] = "error";
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $user_name = $_POST['user_name'];
    $phone     = $_POST['phone'];
    $whatsapp  = $_POST['whatsapp'];
    $address   = $_POST['address'];
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email     = $_POST['email'];

    $image_name = $_FILES['user_image']['name'];
    $image_tmp  = $_FILES['user_image']['tmp_name'];
    $upload_dir = "uploads/" . $image_name;
    move_uploaded_file($image_tmp, $upload_dir);

    $sql = "INSERT INTO users (full_name, user_name, phone, whatsapp, address, password, email, user_image)
            VALUES ('$full_name', '$user_name', '$phone', '$whatsapp', '$address', '$password', '$email', '$image_name')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['status'] = "Registration successful!";
        $_SESSION['status_type'] = "success";
    } else {
        $_SESSION['status'] = "Error: " . $conn->error;
        $_SESSION['status_type'] = "error";
    }

    $conn->close();
    header("Location: index.php");
    exit();
}
?>
