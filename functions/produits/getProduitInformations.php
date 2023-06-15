<?php

    // Se connecter à la base de données grâce à PDO et aux credentials du fichier .env.

    try {
            
        $bdd = new PDO('mysql:host=localhost;dbname=lucas.briand;charset=utf8', 'root', '');

    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());

    }

    // Si l'url contient un id, alors on affiche les informations des produits. Sinon, on n'affiche rien.

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
                        
                        <form action="functions/produits/ajouterProduitToWishlist.php" method="post">

                            <input type="hidden" name="Ajouter" value="' . $produits['ID'] . '">

                            <input type="submit" value="Ajouter à la wishlist">

                        </form>

                    </div>

                </div>

            </section>

        ';

        // On prépare une nouvelle requête pour vérifier si le produit est contenu dans la wishlist.

        $requete = $bdd->prepare('SELECT WISHLIST FROM utilisateurs WHERE ID = :id');

        // On exécute la requête.

        $requete->execute(array(

            'id' => $_SESSION['id']

        ));

        // On récupère les informations de l'utilisateur.

        $user = $requete->fetch();

        // On vérifie si le id du produit est contenu dans la liste de wishlist

        $wishlist = explode(',', $user['WISHLIST']);

        if (in_array($_GET['id'], $wishlist)) {

            echo 'Il est dans la wishlist';

        } else {

            echo 'Il n\'est pas dans la wishlist';

        }

    } else {

        echo '';

    }

?>