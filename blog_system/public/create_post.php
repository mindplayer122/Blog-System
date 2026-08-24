<?php
require '../includes/db.php';
require '../includes/auth.php';

requireLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("
        INSERT INTO posts (user_id, title, content)
        VALUES (?, ?, ?)
    ");

    $stmt->execute([
        $_SESSION['user_id'],
        $_POST['title'],
        $_POST['content']
    ]);

    header('Location: index.php');
    exit;
}
?>

<h1>Create Post</h1>

<form method="post">
    <label>
        Title:
        <input type="text" name="title" required>
    </label>

    <br><br>

    <label>
        Content:
        <textarea name="content" required></textarea>
    </label>

    <br><br>

    <button type="submit">Create Post</button>
</form>