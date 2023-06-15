<?php include 'composants/headers.php'; ?>

<!DOCTYPE html>

<html lang="fr">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>www.cruces.com - inscription</title>
        <link rel="stylesheet" href="css/main.css">

    </head>

    <body>
        
        <?php include 'composants/barre-navigation.php'; ?>

        <section>

            <h1>Inscription</h1>

            <p>Page avec formulaire d'inscription</p>
            
            <form action="inscription.php" method="post" id="formulaire-inscription">

                <!-- <label for="email">Email</label> -->
                <input type="email" name="email" id="email" placeholder="Email" required>

                <!-- <label for="password">Mot de passe</label> -->
                <input type="password" name="password" id="password" placeholder="Mot de passe" required>

                <input type="submit" value="S'inscrire">

            </form>

            <!-- Récupérer les données de connexion en php -->

            <?php

                if (isset($_POST['email']) && isset($_POST['password'])) {

                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    if (!empty($email) && !empty($password)) {

                        // Crypter le mot de passe avec la fonction sha 256.

                        $password = hash('sha256', $password);

                        // Connexion à la base de données grâce à PDO et aux credentials du fichier .env.

                        try {
                                
                            $bdd = new PDO('mysql:host=localhost;dbname=lucas.briand;charset=utf8', 'root', '');

                        } catch (Exception $e) {

                            die('Erreur : ' . $e->getMessage());

                        }

                        // Inscripption de l'utilisateur dans la base de données.

                        $req = $bdd->prepare('INSERT INTO `utilisateurs`(`EMAIL`, `PASSWORD`) VALUES (:email, :password)');
                        $req->execute(array(
                            'email' => $email,
                            'password' => $password,
                        ));

                        // Rediriger l'utilisateur vers la page de connexion.

                        header('Location: connexion.php');

                    }

                }

            ?>

        </section>
        
    </body>

</html>