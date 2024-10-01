<?php
$host = 'localhost';  // Database host (usually localhost)
$user = 'root';       // Database username
$pass = '';           // Database password
$db_name = 'travel_booking';  // Your database name

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>