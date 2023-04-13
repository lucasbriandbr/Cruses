<?php

    // Se connecter à la base de données grâce à PDO et aux credentials du fichier .env.

    try {
            
        $bdd = new PDO('mysql:host=localhost;dbname=lucas.briand;charset=utf8', 'root', '');

    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());

    }
    
    // Préparer la requête SQL pour récupérer les croix.
    
    $recupererProduits = $bdd->prepare('SELECT NAME, LINK, ID FROM produits');

    $recupererProduits->execute();

    // Afficher les produits.

    while ($produits = $recupererProduits->fetch()) {

        echo '<form class="produit" action="functions/produits/supprimerProduits.php" method="post" id="formulaire-supression-produits">';

            echo '<img src="' . $produits['LINK'] . '" alt="Image du produit" class="crossimage">';

            echo '<h3>' . $produits['NAME'] . '</h3>';

            echo '<label for="supprimerbutton">Supprimer</label>';

            echo '<input type="submit" value="' . $produits['ID'] . '" id="supprimerbutton" name="Supprimer" hidden/>';

        echo '</form>';

    }

?>