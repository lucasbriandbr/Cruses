<?php

    // Se connecter à la base de données grâce à PDO et aux credentials du fichier .env.

    try {
            
        $bdd = new PDO('mysql:host=localhost;dbname=lucas.briand;charset=utf8', 'root', '');

    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());

    }

    // Si l'url contient un id, alors on affiche les informations de la croix. Sinon, on n'affiche rien.

    if (isset($_GET['id'])) {
        
        // on prépare la requête

        $requete = $bdd->prepare('SELECT * FROM croix WHERE ID = :id');

        // on exécute la requête

        $requete->execute(array(

            'id' => $_GET['id']

        ));

        // on récupère les informations de la croix

        $croix = $requete->fetch();

        // on affiche les informations de la croix

        echo '

            <section>
            
                <a href="croix.php">Fermer</a>
                
                <div class="descriptionbloc">

                    <img src="' . $croix['LINK'] . '" alt="' . $croix['NAME'] . '" class="imagedescription">
                    
                    <div>

                        <h2>' . $croix['NAME'] . '</h2>
                        
                        <p>' . $croix['DESCRIPTION'] . '</p>

                    </div>

                </div>

            </section>

        ';

    } else {

        echo '';

    }

?>