<?php
// Include database connection file
include 'dbconn.php';

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    // Validate the input
    if (empty($email) || empty($password)) {
        echo "Both email and password are required!<br>";
    } else {
        // Prepare SQL query to check if the email exists in the database
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user exists
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            // Verify the password using password_verify() for hashed password
            if (password_verify($password, $user['password'])) {
                // Store user information in session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];

                // Redirect to the dashboard after successful login
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Invalid password!<br>";
            }
        } else {
            echo "No user found with that email address!<br>";
        }

        $stmt->close();
    }
} else {
    echo "Invalid request method.<br>";
}
?>
