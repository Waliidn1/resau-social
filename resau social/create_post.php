<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $content = $_POST['content'];
    $image_url = ""; // Ajoutez la logique pour télécharger des images si nécessaire

    // Insertion dans la base de données
    $stmt = $conn->prepare("INSERT INTO posts (user_id, content, image_url) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $content, $image_url);
    $stmt->execute();
    header("Location: news_feed.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Créer une Publication</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Créer une Publication</h2>
    <form method="POST" action="">
        <textarea name="content" placeholder="Écrivez quelque chose..." required></textarea>
        <button type="submit">Publier</button>
    </form>
    <a href="profile.php">Retour au Profil</a>
</body>

</html>