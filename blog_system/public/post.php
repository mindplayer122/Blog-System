<?php
require '../includes/db.php';
require '../includes/auth.php';
$id = $_GET['id'];

// Post info
$stmt = $pdo->prepare("SELECT posts.*, users.email FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();

// Comments
$stmt = $pdo->prepare("
    SELECT comments.*, users.email
    FROM comments
    JOIN users ON comments.user_id = users.id
    WHERE post_id = ?
    ORDER BY created_at ASC
");
$stmt->execute([$id]);
$comments = $stmt->fetchAll();

// Add comment
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    requireLogin();
    $stmt = $pdo->prepare("INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?)");
    $stmt->execute([$id, $_SESSION['user_id'], $_POST['content']]);
    header("Location: post.php?id=$id");
}
?>

<h1><?= htmlspecialchars($post['title']) ?></h1>
<p><?= htmlspecialchars($post['content']) ?></p>

<h3>Comments:</h3>
<?php foreach ($comments as $c): ?>
    <p><strong><?= htmlspecialchars($c['email']) ?>:</strong> <?= htmlspecialchars($c['content']) ?></p>
<?php endforeach; ?>

<?php if (isset($_SESSION['user_id'])): ?>
<form method="post">
    <textarea name="content" required></textarea><br>
    <button type="submit">Add Comment</button>
</form>
<?php endif; ?>

<?php if (isset($_SESSION['user_id']) && 
    ($post['user_id'] == $_SESSION['user_id'] || isAdmin())): ?>

    <a href="edit_post.php?id=<?= $post['id'] ?>">Edit</a>
    <a href="delete_post.php?id=<?= $post['id'] ?>">Delete</a>

<?php endif; ?>
