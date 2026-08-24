<?php
require '../includes/auth.php';
require '../includes/db.php';
requireLogin();

$postId = $_GET['id'];

//Fecth post
$stmt = $pdo->prepare("SELECT * FROM posts Where id = ?");
$stmt->execute(([$postId]));
$post = $stmt->fetch();

//permision check
if ($post["user_id"] != $_SESSION["user_id"] && !isAdmin()) {
    die("Acess denied");
}

//Update post
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
    $stmt->execute([$_POST['title'], $_POST['content'], $postId]);
    header("Location: post.php?id=$postId");
}

?>

<form method="post">
    <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required><br>
    <textarea name="content" required><?= htmlspecialchars($post['content']) ?></textarea><br>
    <button type="submit">Update Post</button>
</form>
