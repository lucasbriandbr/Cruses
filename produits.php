<!DOCTYPE html>

<html lang="fr">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>cruces - les produits</title>
        <link rel="stylesheet" href="css/main.css">

    </head>

    <body>
        
        <?php include 'composants/barre-navigation.php'; ?>

        <?php include 'functions/produits/getProduitInformations.php'; ?>

        <section>

            <h1>Produits</h1>

            <p>Page présentant les différents types de produits</p>
            
            <!-- Afficher les différents types de produits -->

            <div class="collection">
                    
                <?php include 'functions/produits/getProduits.php'; ?>

            </div>

        </section>

    </body>

</html>