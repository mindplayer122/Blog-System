<?php
require '../includes/db.php';
require '../includes/auth.php';
requireLogin();

$commentId = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM comments WHERE id = ?");
$stmt->execute([$commentId]);
$comment = $stmt->fetch();

if ($comment['user_id'] != $_SESSION['user_id'] && !isAdmin()) {
    die('Access denied');
}

$stmt = $pdo->prepare("DELETE FROM comments WHERE id = ?");
$stmt->execute([$commentId]);

header("Location: post.php?id=" . $comment['post_id']);
