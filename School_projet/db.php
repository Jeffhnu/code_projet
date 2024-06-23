<?php
// db.php

function getPDO() {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=school_projet', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        exit();
    }
}
?>
