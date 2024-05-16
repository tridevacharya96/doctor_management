<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "INSERT INTO doctors (name, specialty, phone, email) VALUES ('$name', '$specialty', '$phone', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Doctor</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Add Doctor</h2>
        <form action="add.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="specialty">Specialty:</label>
            <input type="text" id="specialty" name="specialty" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email">

            <button type="submit">Add Doctor</button>
        </form>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
