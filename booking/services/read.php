<?php
include '../../conf.php';

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
    <link rel="stylesheet" href="../styles/read.css">
    <link rel="stylesheet" href="../styles/loading-animation.css">
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
                    <div style='display:flex; justify-content:space-around;'>
                        <a href='javascript:void(0);' onclick='showLoadingAndNavigate(".$row['id'].")' class='edit'>Edit</a> | 
                        <a href='javascript:void(0);' onclick='showLoadingAndNavigate(".$row['id'].")' class='edit'>Edit</a> | 
                        <a href='javascript:void(0);' onclick='showDeletePopup(".$row['id'].")' class='delete'>Delete</a>
                    </div>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No bookings found.</p>";
}
?>

<!-- Loading Spinner with Background Overlay -->

<div id="loadingOverlay" class="overlay">
    <div class="dot-spinner">
        <div class="dot-spinner__dot"></div>
        <div class="dot-spinner__dot"></div>
        <div class="dot-spinner__dot"></div>
        <div class="dot-spinner__dot"></div>
        <div class="dot-spinner__dot"></div>
        <div class="dot-spinner__dot"></div>
        <div class="dot-spinner__dot"></div>
        <div class="dot-spinner__dot"></div>
    </div>
</div>

<!-- Custom Popup Modal -->

<div id="deletePopup" class="modal">
    <div class="modal-content">
        <p>Are you sure you want to delete this record?</p>
        <div style='display: flex; justify-content: space-around;'>
            <button onclick="confirmDelete()">Yes, Delete</button>
            <button onclick="closePopup()">Cancel</button>
        </div>
    </div>
</div>

<script>
    let deleteId = null;

    function showDeletePopup(id) {
        deleteId = id;
        document.getElementById('deletePopup').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('deletePopup').style.display = 'none';
        deleteId = null;
    }

    function confirmDelete() {
        if(deleteId !== null) {
            window.location.href = 'delete.php?id=' + deleteId;
        }
    }

    function showLoadingAndNavigate(id) {
        document.getElementById('loadingOverlay').style.display = 'flex';
        setTimeout(function() {
            
            window.location.href = 'update.php?id=' + id;
        }, 500);
    }
</script>

</body>
</html>