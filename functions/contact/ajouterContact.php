<?php

    // Démarrer une session

    session_start();

    // Vérifier si l'utilisateur est connecté.
    
    if (isset($_SESSION['id'])) {

        // Récupérer les données du formulaire.

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $sujet = $_POST['sujet'];
        $message = $_POST['message'];

        // Vérifier si les données sont vides.

        if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($sujet) && !empty($message)) {

            // Connexion à la base de données grâce à PDO et aux credentials du fichier .env.

            try {
                    
                $bdd = new PDO('mysql:host=localhost;dbname=lucas.briand;charset=utf8', 'root', '');

            } catch (Exception $e) {

                die('Erreur : ' . $e->getMessage());

            }

            // Ajouter le message dans la base de données.

            $req = $bdd->prepare('INSERT INTO contact (NAME, SURNAME, EMAIL, SUBJECT, MESSAGE) VALUES (:nom, :prenom, :email, :sujet, :message)');
            $req->execute(array(
                'nom' => $nom,
                'prenom' => $prenom,
                'email' => $email,
                'sujet' => $sujet,
                'message' => $message
            ));

            // Rediriger l'utilisateur vers la page de contact.

            header('Location: ../../contact.php');

        }

    } else {

        // Rediriger l'utilisateur vers la page de connexion.

        header('Location: ../../connexion.php');

    }

?>