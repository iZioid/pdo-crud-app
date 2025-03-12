<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
?>
