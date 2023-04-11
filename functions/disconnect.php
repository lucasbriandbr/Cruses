<?php

    // Démarrer une session.

    session_start();

    // Vérifier si l'utilisateur est connecté.

    if (isset($_SESSION['id'])) {
        
        // Si l'utilisateur est connecté, déconnecter l'utilisateur.

        session_destroy();

    }
    
    // Rediriger l'utilisateur vers la page de connexion.

    header('Location: ../connexion.php');

?>

