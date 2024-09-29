<?php
$conn = new mysqli("localhost", "root", "", "handyman_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $service_needed = $conn->real_escape_string($_POST['service_needed']);
    $preferred_date = $conn->real_escape_string($_POST['preferred_date']);
    $preferred_time = $conn->real_escape_string($_POST['preferred_time']);
    $message = $conn->real_escape_string($_POST['message']);

  
    $sql = "INSERT INTO bookings (name, email, phone, address, service_needed, preferred_date, preferred_time, message)
            VALUES ('$name', '$email', '$phone', '$address', '$service_needed', '$preferred_date', '$preferred_time', '$message')";


    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Booking successfully made!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Handyman</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Book a Handyman</h1>
    </header>

    <form action="booking.php" method="POST">
        <label for="name">Full Name:</label>
        <input type="text" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required>
        
        <label for="address">Address:</label>
        <textarea name="address" required></textarea>
        
        <label for="service_needed">Service Needed:</label>
        <select name="service_needed" required>
            <option value="Electrical">Electrical</option>
            <option value="Plumbing">Plumbing</option>
            <option value="Home Equipment">Home Equipment</option>
            <option value="General Maintenance">General Maintenance</option>
        </select>
        
        <label for="preferred_date">Preferred Date:</label>
        <input type="date" name="preferred_date" required>
        
        <label for="preferred_time">Preferred Time:</label>
        <input type="time" name="preferred_time" required>
        
        <label for="message">Message:</label>
        <textarea name="message" required></textarea>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>

