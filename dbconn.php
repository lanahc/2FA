<?php
require 'vendor/autoload.php';
// Database connection details
$host = "localhost"; // Database host
$user = "root";      // Database username
$pass = "";          // Database password (use your own password if set)
$dbname = "user_management"; // Database name

// Create a connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully to the database.";
}
?>
