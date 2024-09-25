<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Profil de <?php echo $user['username']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Profil de <?php echo $user['username']; ?></h2>
    <img src="<?php echo $user['profile_picture'] ?: 'https://via.placeholder.com/150'; ?>" alt="Photo de Profil">
    <p>Email: <?php echo $user['email']; ?></p>
    <p>Bio: <?php echo $user['bio']; ?></p>
    <a href="create_post.php">Créer une Publication</a>
    <a href="logout.php">Se déconnecter</a>
</body>

</html>