<?php include 'composants/headers.php'; ?>

<!DOCTYPE html>

<html lang="fr">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>www.cruces.com - connexion</title>
        <link rel="stylesheet" href="css/main.css">

    </head>

    <body>
        
        <?php include 'composants/barre-navigation.php'; ?>

        <section>

            <h1>Connexion</h1>

            <p>Page avec formulaire de connexion</p>
            
            <form action="connexion.php" method="post" id="formulaire-connexion">

                <!-- <label for="email">Email</label> -->
                <input type="email" name="email" id="email" placeholder="Email" required>

                <!-- <label for="password">Mot de passe</label> -->
                <input type="password" name="password" id="password" placeholder="Mot de passe" required>

                <input type="submit" value="Se connecter">

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

                        // Vérifier si l'utilisateur existe dans la base de données.

                        $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = :email AND password = :password');
                        $req->execute(array(
                            'email' => $email,
                            'password' => $password
                        ));

                        $resultat = $req->fetch();

                        if ($resultat) {

                            echo 'Vous êtes connecté.';
                            
                            // Ouvrir une session avec les données de l'utilisateur.

                            $_SESSION['id'] = $resultat['ID'];
                            $_SESSION['email'] = $resultat['EMAIL'];
                            $_SESSION['prenom'] = $resultat['PRENOM'];
                            $_SESSION['role'] = $resultat['ROLE'];
                            $_SESSION['wishlist'] = $resultat['WISHLIST'];
                            
                            // Rediriger l'utilisateur vers la page d'administration si il dispose du role ADMIN sinon vers la page de WISHLIST si il est GUEST.

                            if ($_SESSION['role'] == 'ADMIN') {

                                header('Location: admin.php');

                            } elseif ($_SESSION['role'] == 'GUEST') {

                                header('Location: wishlist.php');

                            }

                        } else {

                            echo '<p>Mauvais identifiant ou mot de passe.</p>';

                        }

                    }

                }

            ?>

        </section>
        
    </body>

</html>