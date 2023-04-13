<?php

    // Se connecter à la base de données grâce à PDO et aux credentials du fichier .env.

    try {
            
        $bdd = new PDO('mysql:host=localhost;dbname=lucas.briand;charset=utf8', 'root', '');

    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());

    }
    
    // Préparer la requête SQL pour récupérer les croix.
    
    $recupererCroix = $bdd->prepare('SELECT NAME, LINK, ID FROM croix');

    $recupererCroix->execute();

    // Afficher les croix.

    while ($croix = $recupererCroix->fetch()) {

        echo '<form class="produit" action="functions/croix/supprimerCroix.php" method="post" id="formulaire-supression-croix">';

            echo '<img src="' . $croix['LINK'] . '" alt="Image de la croix" class="crossimage">';

            echo '<h3>' . $croix['NAME'] . '</h3>';

            echo '<label for="supprimerbutton">Supprimer</label>';

            echo '<input type="submit" value="' . $croix['ID'] . '" id="supprimerbutton" name="Supprimer" hidden/>';

        echo '</form>';

    }

?>