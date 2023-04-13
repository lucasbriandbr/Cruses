<?php

    // Démarrer une session

    session_start();

    // Vérifier si l'utilisateur est connecté.

    if (isset($_SESSION['id'])) {

        // Si l'utilisateur est connecté, vérifier si l'utilisateur a cliqué sur le bouton "Ajouter".

        if (isset($_POST['Ajouter'])) {

            // Si l'utilisateur a cliqué sur le bouton "Ajouter", vérifier si l'utilisateur a rempli tous les champs.

            if (isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['image']) && isset($_POST['price'])) {

                // Si l'utilisateur a rempli tous les champs, vérifier si l'utilisateur a rempli tous les champs.

                if (!empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['image']) && !empty($_POST['price'])) {
                    
                    // Si l'utilisateur a rempli tous les champs, se connecter à la base de données grâce à PDO et aux credentials du fichier .env.

                    try {
                            
                        $bdd = new PDO('mysql:host=localhost;dbname=lucas.briand;charset=utf8', 'root', '');

                    } catch (Exception $e) {

                        die('Erreur : ' . $e->getMessage());

                    }

                    // Récupérer les données du formulaire.

                    $nom = htmlspecialchars($_POST['nom']);

                    $description = htmlspecialchars($_POST['description']);

                    $image = htmlspecialchars($_POST['image']);

                    $price = htmlspecialchars($_POST['price']);

                    // Vérifier si le produit existe déjà.

                    $verifierProduits = $bdd->prepare('SELECT * FROM produits WHERE NAME = ?');

                    $verifierProduits->execute(array($nom));

                    $produitsExiste = $verifierProduits->rowCount();

                    if ($produitsExiste == 0) {

                        // Si le produit n'existe pas, ajouter le produit dans la base de données.

                        $ajouterProduit = $bdd->prepare('INSERT INTO produits(NAME, DESCRIPTION, LINK, PRICE) VALUES(?, ?, ?, ?)');

                        $ajouterProduit->execute(array($nom, $description, $image, $price));

                        // Rediriger l'utilisateur vers la page de gestion des produits.

                        header('Location: ../../gestionproduit.php');

                    } else {

                        // Si le produit existe déjà, afficher un message d'erreur.

                        echo 'Le produit existe déjà';

                    }

                } else {

                    // Si l'utilisateur n'a pas rempli tous les champs, afficher un message d'erreur.

                    echo 'Veuillez remplir tous les champs 2';

                }

            } else {

                // Si l'utilisateur n'a pas rempli tous les champs, afficher un message d'erreur.

                echo 'Veuillez remplir tous les champs 1';

            }

        }

    } else {

        // Si l'utilisateur n'est pas connecté, rediriger l'utilisateur vers la page de connexion.

        header('Location: ../connexion.php');

    }

?>