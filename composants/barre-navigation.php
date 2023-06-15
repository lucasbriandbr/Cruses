<?php

    //  Si l'on ne se trouve pas sur la page de connexion ou de l'administration, ou qu'on ne se trouve pas dans un des onglets de l'administration, démarrer une session.
    
    if ($_SERVER['PHP_SELF'] != '/briand.lucas/connexion.php' && $_SERVER['PHP_SELF'] != '/briand.lucas/admin.php' && $_SERVER['PHP_SELF'] != '/briand.lucas/gestioncroix.php' && $_SERVER['PHP_SELF'] != '/briand.lucas/gestionproduit.php' && $_SERVER['PHP_SELF'] != '/briand.lucas/gestioncontact.php' && $_SERVER['PHP_SELF'] != '/briand.lucas/inscription.php' && $_SERVER['PHP_SELF'] != '/briand.lucas/wishlist.php') {
        
        session_start();
        
    }

?>

<div class="barre-navigation">

    <div class="logo">

        <a href="/accueil.php"><img id="logo" src="img/1200px-Cross-Pattee-Alisee.svg.png" alt="logo"></a>

    </div>

    <div class="menu">

        <ul class="buttons">

            <li><a href="accueil.php">Accueil</a></li>

            <li><a href="croix.php">Croix</a></li>

            <li><a href="produits.php">Produits</a></li>

            <li><a href="contact.php">Contact</a></li>

            <!-- Si l'utilisateur est connecté, afficher le bouton "admin" à la place de "Connexion" -->

            <?php if (isset($_SESSION['role'])) { 
                
                // Vérifier le rôle de l'utilisateur.

                if ($_SESSION['role'] == 'ADMIN') { ?>

                    <li><a href="admin.php">Admin</a></li>

                <?php } elseif ($_SESSION['role'] == 'GUEST') { ?>

                    <li><a href="wishlist.php">Wishlist</a></li>

                <?php } ?>

            <?php } else { ?>

                <li><a href="connexion.php">Connexion</a></li>

            <?php } ?>

        </ul>

    </div>

</div>