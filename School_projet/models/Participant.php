<?php
// models/Participant.php
require_once 'db.php';

class Participant {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($nom, $prenom, $email, $phonenumber, $motDePasse, $role) {
        // Trouver l'ID du rôle
        $stmtRole = $this->pdo->prepare("SELECT id_role FROM role WHERE nom_role = :role");
        $stmtRole->execute([':role' => $role]);
        $roleId = $stmtRole->fetchColumn();

        if ($roleId) {
            $stmt = $this->pdo->prepare("INSERT INTO participant (nom, prenom, email, numeros_de_telephone, mot_de_passe, id_role) VALUES (:nom, :prenom, :email, :phonenumber, :motDePasse, :id_role)");
            $stmt->execute(array(
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':email' => $email,
                ':phonenumber' => $phonenumber,
                ':motDePasse' => $motDePasse,
                ':role_id' => $roleId,
            ));
        } else {
            throw new Exception("Rôle non trouvé.");
        }
    }

    public function getParticipantByEmailAndPassword($email, $password) {
        try {
            $stmt = $this->pdo->prepare("SELECT p.*, r.nom AS role FROM participant p JOIN role r ON p.role_id = r.id WHERE p.email = :email AND p.mot_de_passe = :password");
            $stmt->execute([
                ':email' => $email,
                ':password' => $password
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Erreur lors de la récupération des données : " . $e->getMessage());
        }
    }
}

?>

