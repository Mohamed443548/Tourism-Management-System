<?php
include('../config/database.php');

session_start();

if (!isset($_SESSION['admin'])) {
    header("location: login.php");
}

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Manage Bookings</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tour ID</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["tour_id"] . "</td>
                        <td>" . $row["username"] . "</td>
                        <td><a href='delete_booking.php?id=" . $row["id"] . "'>Delete</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No bookings found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
