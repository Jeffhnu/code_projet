<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'moderator') {
    header('Location: /index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderator Page</title>
</head>
<body>
    <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['user']['prenom']); ?>!</h1>
</body>
</html>
