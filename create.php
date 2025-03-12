<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>
    <h2>Add New User</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name">
        <br>
        <label>Email:</label>
        <input type="email" name="email">
        <br>
        <button type="submit">Add</button>
    </form>
    <br>
    <a href="index.php">Back</a>
</body>
</html>
