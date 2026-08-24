<?php
require '../includes/db.php';
require '../includes/auth.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $_POST['title'], $_POST['content']]);
    header('Location: index.php');
}
?>

<form method="post">
    Title: <input type="text" name="title" required><br>
    Content:<br>
    <textarea name="content" required></textarea><br>
    <button type="submit">Create Post</button>
</form>
