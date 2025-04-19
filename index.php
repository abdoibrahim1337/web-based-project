<?php
session_start();
include 'Header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f3f8;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 450px;
            margin: 60px auto;
            padding: 30px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 26px;
            color: #333;
        }

        .form-container input,
        .form-container button {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .form-container input:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .note {
            font-size: 14px;
            color: #777;
        }

        .status-message {
            max-width: 450px;
            margin: 20px auto;
            padding: 10px;
            border-radius: 8px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<?php if (isset($_SESSION['status'])): ?>
    <div class="status-message"
         style="
            color:<?= $_SESSION['status_type'] === 'success' ? '#155724' : '#721c24' ?>;
            background-color:<?= $_SESSION['status_type'] === 'success' ? '#d4edda' : '#f8d7da' ?>;
            border:1px solid <?= $_SESSION['status_type'] === 'success' ? '#c3e6cb' : '#f5c6cb' ?>;
         ">
        <?= $_SESSION['status'] ?>
    </div>
<?php unset($_SESSION['status']); unset($_SESSION['status_type']); ?>
<?php endif; ?>

<div class="form-container">
    <h2>User Registration</h2>
    <form method="POST" action="DB_Ops.php" enctype="multipart/form-data" id="registrationForm">
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="text" name="user_name" placeholder="Username" required>
        <input type="text" name="phone" placeholder="Phone" required>
        
        <div style="display: flex; gap: 10px;">
            <input type="text" name="whatsapp" id="whatsapp" placeholder="WhatsApp Number" required style="flex: 1;">
            <button type="button" onclick="validateWhatsApp()">Check</button>
        </div>
        <div id="whatsappStatus" style="margin-top:5px; font-size:14px;"></div>

        <input type="email" name="email" placeholder="Email Address" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
        <input type="file" name="user_image" required>
        <input type="submit" value="Register">
        <p class="note">Password must be at least 8 characters, include a number and a special character.</p>
    </form>
</div>

<script src="API_Ops.js"></script>
</body>
</html>

<?php include 'Footer.php'; ?>
