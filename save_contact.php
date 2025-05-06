<?php
// Error reporting on
error_reporting(E_ALL);
ini_set('display_errors', 1);

// MySQL connection setup
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prisha_clinic"; // ✅ Your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data (same name attributes as HTML form)
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Prepare SQL query
$sql = "INSERT INTO contact (name, email, phone, message)
        VALUES ('$name', '$email', '$phone', '$message')";

// Run query
if ($conn->query($sql) === TRUE) {
    echo "Thank you! Your message has been received.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>