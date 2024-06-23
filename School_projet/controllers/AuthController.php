<?php
// controllers/AuthController.php

require_once __DIR__ . '/../models/Participant.php';

class AuthController {
    private $participantModel;

    public function __construct() {
        $pdo = getPDO();
        $this->participantModel = new Participant($pdo);
    }

    public function login() {
        $error_message = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (!empty($email) && !empty($password)) {
                try {
                    $participant = $this->participantModel->getParticipantByEmailAndPassword($email, $password);
                    if ($participant) {
                        // Redirige en fonction du rôle
                        switch ($participant['role']) {
                            case 'admin':
                                header('Location: /admin_page.php');
                                break;
                            case 'user':
                                header('Location: /user_page.php');
                                break;
                            case 'moderator':
                                header('Location: /moderator_page.php');
                                break;
                            default:
                                $error_message = "Rôle inconnu.";
                        }
                        exit();
                    } else {
                        $error_message = "Email ou mot de passe incorrect. Veuillez réessayer.";
                    }
                } catch (Exception $e) {
                    $error_message = "Erreur lors de la connexion : " . $e->getMessage();
                }
            } else {
                $error_message = "Veuillez remplir tous les champs.";
            }
        }

        include __DIR__ . '/../views/login.php';
    }
}
?>
