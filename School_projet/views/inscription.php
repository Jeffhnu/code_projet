<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        /* Style général du formulaire */
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        /* Style des champs de saisie */
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        /* Style du bouton */
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        body {
            background-color: #bebebe;
        }
    </style>
</head>
<body>
<h2 style="text-align: center;">Formulaire d'inscription</h2>
<form action="index.php?action=register" method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br><br>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required><br><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="phonenumber">Numéro de téléphone :</label>
    <input type="text" id="phonenumber" name="phonenumber" required><br><br>

    <label for="motDePasse">Mot de passe :</label>
    <input type="password" id="motDePasse" name="motDePasse" required><br><br>

    <label for="role">Rôle :</label>
    <select id="role" name="role" required>
        <option value="user">Utilisateur</option>
        <option value="admin">Admin</option>
        <option value="moderator">Modérateur</option>
    </select><br><br>
    <input type="submit" value="Envoyer">
</form>
<button onclick="Seconnecter()" style="background-color:#007bff; color:#fff; width: 10%; padding: 10px; border: none; border-radius: 3px; cursor: pointer; transition: background-color 0.3s;">Se connecter</button>

<script>
    function Seconnecter() {
        window.location.href = "index.php?action=login";
    }
</script>
</body>
</html>
