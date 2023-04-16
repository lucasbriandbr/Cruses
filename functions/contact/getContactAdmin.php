<?php

    // Se connecter à la base de données grâce à PDO et aux credentials du fichier .env.

    try {
            
        $bdd = new PDO('mysql:host=localhost;dbname=lucas.briand;charset=utf8', 'root', '');

    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());

    }
    
    // Préparer la requête SQL pour récupérer les contacts.
    
    $recupererContact = $bdd->prepare('SELECT NAME, SURNAME, ID, EMAIL, SUBJECT FROM contact');

    $recupererContact->execute();

    // Afficher les contact.

    while ($contact = $recupererContact->fetch()) {

        echo '<form class="produit" action="functions/contact/supprimerContact.php" method="post" id="formulaire-supression-contact">';

            echo '<h3>' . $contact['NAME'] . ' ' . $contact['SURNAME'] . ' - ' . $contact['EMAIL'] . '|' . $contact['SUBJECT'] . '<label for="supprimerbutton">Supprimer</label>' . '</h3>';

            echo '<input type="submit" value="' . $contact['ID'] . '" id="supprimerbutton" name="Supprimer" hidden/>';

        echo '</form>';

    }

?>