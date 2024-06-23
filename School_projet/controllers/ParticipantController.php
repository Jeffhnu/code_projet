<?php
// controllers/ParticipantController.php

require_once __DIR__ . '/../models/Participant.php';

class ParticipantController {
    private $participantModel;

    public function __construct() {
        $pdo = getPDO();
        $this->participantModel = new Participant($pdo);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $phonenumber = $_POST['phonenumber'];
            $motDePasse = $_POST['motDePasse'];
            $role = $_POST['role'];

            try {
                $this->participantModel->create($nom, $prenom, $email, $phonenumber, $motDePasse, $role);
                header('Location: index.php?action=login');
                exit();
            } catch (Exception $e) {
                echo "Erreur lors de l'inscription : " . $e->getMessage();
            }
        } else {
            include __DIR__ . '/../views/inscription.php';
        }
    }
}
?>
