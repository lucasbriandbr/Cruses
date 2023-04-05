<?php

    // Démarrer une session.

    session_start();

    echo 'Bonjour ' . $_SESSION['email'] . '.';

    // Vérifier si l'utilisateur est connecté.

    if (isset($_SESSION['email'])) {
        
        // Si l'on ne se trouve pas sur la page d'administration, rediriger vers la page d'administration.

        if ($_SERVER['PHP_SELF'] != '/admin.php') {
            
            header('Location: admin.php');
            
        }

    } else {
            
        // rediriger vers la page de connexion.

        header('Location: connexion.php');
        
    }

?>