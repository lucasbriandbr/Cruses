<!DOCTYPE html>

<html lang="fr">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>www.cruces.com - espace administrateur</title>
        <link rel="stylesheet" href="css/main.css">

    </head>

    <body>
        
        <?php include 'composants/barre-navigation.php'; ?>

        <section>

            <h1>Admin</h1>

            <p>Page servant d'administration</p>

            <!-- bouton de déconnexion -->
            
            <form action="connexion.php" method="post" id="formulaire-deconnexion">
            
                <input type="submit" name="Déconnexion" onclick="disconnect()" />

                <!-- TODO : ajouter un script js pour déconnecter l'utilisateur la fonction a débutté dans la page connexion -->

            </form>

        </section>
        
    </body>

</html>