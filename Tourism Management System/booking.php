<?php
include('../config/database.php');

session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tour_id = $_POST['tour_id'];
    $username = $_SESSION['username'];

    $sql = "INSERT INTO bookings (tour_id, username) VALUES ('$tour_id', '$username')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Tour</title>
</head>
<body>
    <form method="post" action="">
        Tour ID: <input type="number" name="tour_id" required><br>
        <button type="submit">Book Tour</button>
    </form>
</body>
</html>
