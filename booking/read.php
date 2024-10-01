<?php
include '';

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

if($result->num_rows>0){
    echo "<table border='1'>
        "
}

?>