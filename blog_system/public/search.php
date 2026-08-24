<?php
require '../includes/db.php';

$term = '%' . $_GET['q'] . '%';

$stmt = $pdo->prepare("
    SELECT * FROM posts
    WHERE title LIKE ? OR content LIKE ?
");
$stmt->execute([$term, $term]);
$posts = $stmt->fetchAll();
?>

<h2>Search Results</h2>

<?php foreach ($posts as $post): ?>
    <h3><?= htmlspecialchars($post['title']) ?></h3>
    <a href="post.php?id=<?= $post['id'] ?>">Read</a>
<?php endforeach; ?>
