<?php
// index.php

// Inclure les contrôleurs
require_once __DIR__ . '/controllers/ParticipantController.php';
require_once __DIR__ . '/controllers/AuthController.php';

// Déterminer l'action à effectuer
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'register':
        $controller = new ParticipantController();
        $controller->register();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    default:
        include __DIR__ . '/views/inscription.php';
        break;
}
?>


