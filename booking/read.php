<?php
include '../conf.php';

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);

if($result->num_rows>0){
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Travelers</th>
            <th>Travel Date</th>
            <th>Tour Plan</th>
            <th>Special Requests</th>
            <th>Actions</th>
        </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['address']."</td>
                <td>".$row['travelers']."</td>
                <td>".$row['travel_date']."</td>
                <td>".$row['tour_plan']."</td>
                <td>".$row['special_requests']."</td>
                <td>
                    <a href='update.php?id=".$row['id']."'>Edit</a> | 
                    <a href='delete.php?id=".$row['id']."'>Delete</a>
                </td>
            </tr>";
        }
        echo "</table>";
} else {
    echo "No bookings found.";   
}

?>