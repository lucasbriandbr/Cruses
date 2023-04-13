<?php

    // Se connecter à la base de données grâce à PDO et aux credentials du fichier .env.

    try {
            
        $bdd = new PDO('mysql:host=localhost;dbname=lucas.briand;charset=utf8', 'root', '');

    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());

    }
    
    // Préparer la requête SQL pour récupérer le nom, l'image, l'id des produits.
    
    $recupererProduits = $bdd->prepare('SELECT NAME, LINK, ID FROM produits');

    $recupererProduits->execute();

    // Afficher les produits.

    while ($produits = $recupererProduits->fetch()) {

        echo '<div class="produit">';

            echo '<img src="' . $produits['LINK'] . '" alt="Image du produit" class="crossimage">';

            echo '<h3>' . $produits['NAME'] . '</h3>';

            echo '<a href="produits.php?id=' . $produits['ID'] . '">En savoir plus</a>';

        echo '</div>';

    }

?>