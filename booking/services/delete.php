<?php
include '../../conf.php';

$id = $_GET['id'];
$sql = "DELETE FROM bookings WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    
    header('Location:read.php');
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>