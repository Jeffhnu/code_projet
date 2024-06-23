<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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
        input[type="email"],
        input[type="password"] {
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
<h2 style="text-align: center;">Formulaire de Connexion</h2>
    <form method="POST" action="index.php?action=login">
        <label for="email">Email :</label>
        <input type="email" placeholder="Entrer votre Email" id="email" name="email" required/><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" placeholder="Entrer votre mot de passe" id="password" name="password" required/><br><br>

        <input type="submit" value="Se connecter" name="ok"/>
    </form>

    <?php
    // Affichage du message d'erreur
    if(isset($error_message) && !empty($error_message)) {
        echo "<p class='error'>$error_message</p>";
    }
    ?>
</body>
</html>
