<?php
include 'dbconn.php'; // Include the database connection
require 'vendor/autoload.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
    $terms = isset($_POST['terms']);

    // Validate the input
    if ($password !== $confirm_password) {
        echo "Passwords do not match!<br>";
    } elseif (!$terms) {
        echo "You must accept the terms of service!<br>";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if the email already exists in the database
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Email already in use. Please choose a different one.";
        } else {
            // Insert the new user into the database
            $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $email, $hashedPassword);

            if ($stmt->execute()) {
                echo "Registration successful!<br>";
                echo "Name: $name<br>";
                echo "Email: $email<br>";
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        $stmt->close();
    }
} else {
    echo "Invalid request method.";
}
?>
