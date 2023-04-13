<?php

    // Se connecter à la base de données grâce à PDO et aux credentials du fichier .env.

    try {
            
        $bdd = new PDO('mysql:host=localhost;dbname=lucas.briand;charset=utf8', 'root', '');

    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());

    }

    // Préparer la requête SQL pour supprimer la croix.

    $supprimerCroix = $bdd->prepare('DELETE FROM croix WHERE ID = ?');

    $supprimerCroix->execute(array($_POST['Supprimer']));

    // Rediriger vers la page de gestion des croix.

    header('Location: ../../gestioncroix.php');

?>