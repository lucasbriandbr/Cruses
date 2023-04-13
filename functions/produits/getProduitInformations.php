<?php

    // Se connecter à la base de données grâce à PDO et aux credentials du fichier .env.

    try {
            
        $bdd = new PDO('mysql:host=localhost;dbname=lucas.briand;charset=utf8', 'root', '');

    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());

    }

    // Si l'url contient un id, alors on affiche les informations de la produits. Sinon, on n'affiche rien.

    if (isset($_GET['id'])) {
        
        // on prépare la requête

        $requete = $bdd->prepare('SELECT * FROM produits WHERE ID = :id');

        // on exécute la requête

        $requete->execute(array(

            'id' => $_GET['id']

        ));

        // on récupère les informations de la produits

        $produits = $requete->fetch();

        // on affiche les informations de la produits

        echo '

            <section>
            
                <a href="produits.php">Fermer</a>
                
                <div class="descriptionbloc">

                    <img src="' . $produits['LINK'] . '" alt="' . $produits['NAME'] . '" class="imagedescription">
                    
                    <div>

                        <h2>' . $produits['NAME'] . '</h2>
                        
                        <p>' . $produits['DESCRIPTION'] . '</p>

                        <p>' . $produits['PRICE'] . ' € par pièce</p>

                    </div>

                </div>

            </section>

        ';

    } else {

        echo '';

    }

?>