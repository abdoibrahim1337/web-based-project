<?php
$host = "localhost";
$port = "3307";
$username = "root";
$password = "";
$database = "registration_db";

$conn = new mysqli($host, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed");
}

if (isset($_POST['user_name'])) {
    $user_name = $_POST['user_name'];
    $sql = "SELECT * FROM users WHERE user_name = '$user_name'";
    $result = $conn->query($sql);
    echo $result->num_rows > 0 ? "taken" : "available";
}

$conn->close();
?>
