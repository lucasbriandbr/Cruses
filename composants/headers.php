<?php

    // Démarrer une session.

    session_start();

    // Vérifier si l'utilisateur est connecté.

    if (isset($_SESSION['id'])) {
        
        // Si l'on ne se trouve pas sur la page d'administration, rediriger vers la page d'administration.

        if ($_SERVER['PHP_SELF'] != '/briand.lucas/admin.php') {
            
            header('Location: admin.php');
            
        }

    } else {
        
        // Si nous ne sommes pas sur la page de connexion, rediriger vers la page de connexion.

        if ($_SERVER['PHP_SELF'] != '/briand.lucas/connexion.php') {
            
            header('Location: connexion.php');
            
        }
        
    }

?>