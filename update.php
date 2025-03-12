<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) die("User not found");

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?= $user['name'] ?>">
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?= $user['email'] ?>">
        <br>
        <button type="submit">Update</button>
    </form>
    <br>
    <a href="index.php">Back</a>
</body>
</html>
