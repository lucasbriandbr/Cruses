<?php include 'composants/headers.php'; ?>

<!DOCTYPE html>

<html lang="fr">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>www.cruces.com - espace administrateur - gestion des produits</title>
        <link rel="stylesheet" href="css/main.css">

    </head>

    <body>
        
        <?php include 'composants/barre-navigation.php'; ?>

        <section>

            <!-- Bouton de retour -->

            <a href="admin.php" class="bouton-retour">Retour</a>

            <h1>Gestion des produits</h1>

            <p>TODO : Ajouter une page à fin de modification pour chacune des produits ci-dessous. S'inspirer de la page produits.php et afficher un ID en paramètre GET afin de modifier la description. Afficher les valeurs dans des inputs de champs pré-remplis.</p>

        </section>

        <section>

            <!-- Section d'affichage des produits -->

            <h2>Afficher les produits</h2>

            <div class="collection">
                    
                <?php include 'functions/produits/getProduitsAdmin.php';?>

            </div>

        </section>

        <!-- Section d'ajout des produits -->

        <section>

            <h2>Ajouter un produit</h2>

            <form action="functions/produits/ajouterProduits.php" method="post" id="formulaire-ajout-produits">

                <input placeholder="Nom du Produit :" type="text" name="nom" id="nom" required>

                <input placeholder="Description du Produit :" type="text" name="description" id="description" required>

                <input placeholder="Lien de l'image du Produit :" type="text" name="image" id="image" required>

                <input placeholder="Prix du Produit :" type="text" name="price" id="price" required>

                <input type="submit" value="Ajouter" id="ajouterbutton" name="Ajouter"/>

            </form>

        </section>
        
    </body>

</html>