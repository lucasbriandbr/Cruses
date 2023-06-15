<?php

    // Se connecter à la base de données grâce à PDO et aux credentials du fichier .env.

    try {
            
        $bdd = new PDO('mysql:host=localhost;dbname=lucas.briand;charset=utf8', 'root', '');

    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());

    }

    // Préparer la requête SQL pour ajouter le produit à la wishlist, sous forme de liste.
    
    $ajouterProduit = $bdd->prepare('UPDATE utilisateurs SET WISHLIST = CONCAT(WISHLIST, ?) WHERE ID = ?');

    $ajouterProduit->execute(array($_POST['Ajouter'], $_SESSION['id']));

    // Rediriger vers la page de gestion des croix.

    header('Location: ../../wishlist.php');

?>