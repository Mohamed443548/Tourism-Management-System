<?php
include('../config/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO tours (title, description, price) VALUES ('$title', '$description', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Tour package added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Tour</title>
</head>
<body>
    <form method="post" action="">
        Title: <input type="text" name="title" required><br>
        Description: <textarea name="description" required></textarea><br>
        Price: <input type="number" name="price" required><br>
        <button type="submit">Add Tour</button>
    </form>
</body>
</html>
