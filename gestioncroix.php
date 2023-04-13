<?php include 'composants/headers.php'; ?>

<!DOCTYPE html>

<html lang="fr">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>www.cruces.com - espace administrateur - gestion des croix</title>
        <link rel="stylesheet" href="css/main.css">

    </head>

    <body>
        
        <?php include 'composants/barre-navigation.php'; ?>

        <section>

            <!-- Bouton de retour -->

            <a href="admin.php" class="bouton-retour">Retour</a>

            <h1>Gestion des croix</h1>

            <p>TODO : Ajouter une page à fin de modification pour chacune des croix ci-dessous. S'inspirer de la page croix.php et afficher un ID en paramètre GET afin de modifier la description. Afficher les vaeurs dans des inputs de champs pré-remplis.</p>

        </section>

        <section>

            <!-- Section d'affichage des croix -->

            <h2>Afficher les croix</h2>

            <div class="collection">
                    
                <?php include 'functions/croix/getCroixAdmin.php';?>

            </div>

        </section>

        <!-- Section d'ajout des croix -->

        <section>

            <h2>Ajouter une croix</h2>

            <form action="functions/croix/ajouterCroix.php" method="post" id="formulaire-ajout-croix">

                <input placeholder="Nom de la Croix :" type="text" name="nom" id="nom" required>

                <input placeholder="Description de la Croix :" type="text" name="description" id="description" required>

                <input placeholder="Lien de l'image de la Croix :" type="text" name="image" id="image" required>

                <input type="submit" value="Ajouter" id="ajouterbutton" name="Ajouter"/>

            </form>

        </section>
        
    </body>

</html>