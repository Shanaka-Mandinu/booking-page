<?php
include '../conf.php';

$id = $_GET['id'];
$sql = "SELECT * FROM bookings WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Populate form with current data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<section class="booking-form">
    <h2>Update booking details</h2>
    <form method="POST">
        <label for="name">Full Name</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

        <label for="phone">Phone</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>">

        <label for="address">Address</label>
        <input type="text" name="address" value="<?php echo $row['address']; ?>">

        <label for="travelers">Number of Travelers</label>
        <input type="number" name="travelers" value="<?php echo $row['travelers']; ?>">

        <label for="date">Travel Dates</label>
        <input type="date" name="date" value="<?php echo $row['travel_date']; ?>">

        <label for="tour-plan">Tour Package</label>
        <select name="tour-plan">
            <option value="basic" <?php if ($row['tour_plan'] == 'light') echo 'selected'; ?>>Light Plan</option>
            <option value="premium" <?php if ($row['tour_plan'] == 'basic') echo 'selected'; ?>>Basic Plan</option>
            <option value="luxury" <?php if ($row['tour_plan'] == 'premium') echo 'selected'; ?>>Premium Plan</option>
        </select>

        <label for="special-requests">Special Requests</label>
        <textarea name="special-requests"><?php echo $row['special_requests']; ?></textarea>

        <input type="submit" name="update" value="Update Booking">
    </form>
</section>
</body>
</html>


<?php
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $travelers = $_POST['travelers'];
    $travel_date = $_POST['date'];
    $tour_plan = $_POST['tour-plan'];
    $special_requests = $_POST['special-requests'];

    $sql = "UPDATE bookings 
            SET name='$name', email='$email', phone='$phone', address='$address', travelers='$travelers', travel_date='$travel_date', tour_plan='$tour_plan', special_requests='$special_requests' 
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: read.php');
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
