<?php
include 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "UPDATE doctors SET name='$name', specialty='$specialty', phone='$phone', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $sql = "SELECT * FROM doctors WHERE id=$id";
    $result = $conn->query($sql);
    $doctor = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Doctor</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Doctor</h2>
        <form action="edit.php?id=<?php echo $id; ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $doctor['name']; ?>" required>

            <label for="specialty">Specialty:</label>
            <input type="text" id="specialty" name="specialty" value="<?php echo $doctor['specialty']; ?>" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $doctor['phone']; ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $doctor['email']; ?>">

            <button type="submit">Update Doctor</button>
        </form>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
