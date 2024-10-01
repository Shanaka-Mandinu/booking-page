<?php
include '../conf.php';

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
    <link rel="stylesheet" type="text/css" href="read.css"> <!-- Link to your CSS file -->
</head>
<body>

<?php
if($result->num_rows > 0){
    echo "<table>
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
    echo "<p>No bookings found.</p>";
}
?>

</body>
</html>