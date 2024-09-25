<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC");
$stmt->execute();
$posts = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Fil d'Actualités</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Fil d'Actualités</h2>
    <?php while ($post = $posts->fetch_assoc()): ?>
        <div class="post">
            <h3><?php echo $post['username']; ?></h3>
            <p><?php echo $post['content']; ?></p>
            <p><small>Publié le <?php echo $post['created_at']; ?></small></p>
        </div>
    <?php endwhile; ?>
    <a href="create_post.php">Créer une Publication</a>
    <a href="profile.php">Mon Profil</a>
    <a href="logout.php">Se déconnecter</a>
</body>

</html>