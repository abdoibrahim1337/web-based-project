# web-based-project
# Web-Based User Registration System

This is a PHP-based web application that allows users to register their personal information, including uploading a profile image and validating their WhatsApp number.

## Features

- User registration form
- AJAX username availability check
- WhatsApp number validation via API
- Upload user image
- Stores user info in MySQL database
- Basic styling and accessibility consideration

## Technologies Used

- PHP
- MySQL
- HTML / CSS
- JavaScript (Vanilla + AJAX)
- XAMPP (Apache & MySQL)
- RapidAPI for WhatsApp number validation

## Setup Instructions

1. Clone the repository or copy project files to:
C:\xampp\htdocs\web-based-project

sql

2. Start **XAMPP** and run:
- Apache
- MySQL

3. Create the database:
- Go to `http://localhost/phpmyadmin`
- Create a database called: `registration_db`
- Run the following SQL to create the table:

```sql
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100),
    user_name VARCHAR(50) UNIQUE,
    phone VARCHAR(20),
    whatsapp VARCHAR(20),
    address TEXT,
    password VARCHAR(255),
    email VARCHAR(100),
    user_image VARCHAR(255)
);
Open the project in your browser:

arduino

http://localhost/web-based-project/index.php
Note
You need a valid RapidAPI Key for WhatsApp validation. Add it inside API_Ops.js.

The system checks if the username is already taken via AJAX.

Form will not submit unless all validations are passed.

