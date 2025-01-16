<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
    $terms = isset($_POST['terms']);

    // Validate the input
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
    } elseif (!$terms) {
        echo "You must accept the terms of service!";
    } else {
        echo "Registration successful!<br>";
        echo "Name: $name<br>";
        echo "Email: $email<br>";
    }
} else {
    echo "Invalid request method.";
}
?>
