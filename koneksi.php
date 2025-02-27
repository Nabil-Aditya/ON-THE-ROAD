<?php
// Database configuration
$host = 'localhost';   // Nama host atau IP server database
$username = 'root';    // Username MySQL (ganti sesuai kebutuhan)
$password = '';        // Password MySQL (ganti sesuai kebutuhan)
$dbname = 'clubmotor';  // Nama database

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
?>
