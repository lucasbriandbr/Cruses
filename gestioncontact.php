<?php include 'composants/headers.php'; ?>

<!DOCTYPE html>

<html lang="fr">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>www.cruces.com - espace administrateur - gestion des contacts</title>
        <link rel="stylesheet" href="css/main.css">

    </head>

    <body>
        
        <?php include 'composants/barre-navigation.php'; ?>

        <section>

            <!-- Bouton de retour -->

            <a href="admin.php" class="bouton-retour">Retour</a>

            <h1>Gestion des prises de contact</h1>

            <p>TODO : Afficher les prises de contact ci-dessous : </p>

        </section>

        <section>

            <!-- Section d'affichage des contacts -->

            <h2>Afficher les contacts</h2>

            <div class="liste">
                    
                <?php include 'functions/contact/getContactAdmin.php';?>

            </div>

        </section>
        
    </body>

</html>