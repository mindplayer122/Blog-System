<?php
require '../includes/db.php';

$stmt = $pdo->query("
    SELECT posts.*, users.email
    FROM posts
    JOIN users ON posts.user_id = users.id
    ORDER BY created_at DESC
");

$posts = $stmt->fetchAll();
?>



<?php foreach ($posts as $post): ?>
    <h2><?= htmlspecialchars($post['title']) ?></h2>
    <p>BY <?= htmlspecialchars($post['email'])?> on <?= $post['created_at'] ?></p>
    <a href="post.php?id=<?= $post['id'] ?>">Read More</a>
<?php endforeach; ?>

<form method="get" action="search.php">
    <input type="text" name="q" placeholder="Search posts">
    <button type="submit">Search</button>
</form>

<a href="create_post.php">Create Post</a>