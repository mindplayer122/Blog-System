<?php
require '../includes/db.php';
require '../includes/auth.php';
requireLogin();

$postId = $_GET['id'];

// Fetch post
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$postId]);
$post = $stmt->fetch();

// Permission check
if ($post['user_id'] != $_SESSION['user_id'] && !isAdmin()) {
    die('Access denied');
}

// Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->execute([$postId]);
    header('Location: index.php');
}
?>

<form method="post">
    <p>Are you sure you want to delete this post?</p>
    <button type="submit">Yes, delete</button>
    <a href="post.php?id=<?= $postId ?>">Cancel</a>
</form>
