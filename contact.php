<!DOCTYPE html>

<html lang="fr">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>www.cruces.com - nous contacter</title>
        <link rel="stylesheet" href="css/main.css">

    </head>

    <body>
        
        <?php include 'composants/barre-navigation.php'; ?>

        <section>

            <h1>Contact</h1>

            <p>Page avec formulaire de contact</p>

        </section>

        <!-- TODO : Formulaire de contact -->

        <section>
            
            <form action="functions/contact/ajouterContact.php" method="post" id="formulaire-contact">

                <input type="text" name="nom" id="nom" placeholder="Nom" required>

                <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>

                <input type="email" name="email" id="email" placeholder="Email" required>

                <input type="text" name="sujet" id="sujet" placeholder="Sujet" required>

                <textarea name="message" id="message" cols="30" rows="10" placeholder="Message" required></textarea>

                <input type="submit" value="Envoyer">

            </form>

        </section>
        
    </body>

</html>