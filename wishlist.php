<?php include 'composants/headers.php'; ?>

<!DOCTYPE html>

<html lang="fr">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>www.cruces.com - wishlist</title>
        <link rel="stylesheet" href="css/main.css">

    </head>

    <body>
        
        <?php include 'composants/barre-navigation.php'; ?>

        <section>

            <!-- bouton de déconnexion -->
            
            <form action="functions/disconnect.php" method="post" id="formulaire-deconnexion">
            
                <input type="submit" value="Déconnexion" id="deconnexionbutton" name="Déconnexion"/>

                <!-- TODO : ajouter un script js pour déconnecter l'utilisateur la fonction a débutté dans la page connexion -->

            </form>

            <h1>Wishlist</h1>

            <!-- Liens menant à diffférentes pages d'administration : -->
            
            <div class="buttonsadmin">
                
                Affichage de la Wishlist 

            </div>

        </section>
        
    </body>

</html>