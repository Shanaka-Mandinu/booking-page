<?php
    include '../conf.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $travelers = $_POST['travelers'];
        $tour_date = $_POST['tour_date'];
        $tour_plan = $_POST['tour_plan'];
        $special_requests = $_POST['special_requests'];

        $popupMessage = "";
        $popupType = "";
    
        $sql = "INSERT INTO bookings (name, email,phone,address,travelers, travel_date, tour_plan,special_requests) 
                VALUES ('$name', '$email','$phone','$address','$travelers', '$tour_date', '$tour_plan','$special_requests')";
    
        if ($conn->query($sql) === true) {
            $popupMessage = "Your booking has been confirmed successfully!";
            $popupType = "success";
        } else {
            $popupMessage = "Error: " . $stmt->error;
            $popupType = "error";
        }
        $conn->close();

        header("Location:tour-booking.php?popupMessage=" . urlencode($popupMessage) . "&popupType=" . $popupType);
        exit();
    }
?>