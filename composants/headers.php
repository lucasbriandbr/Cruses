<?php

    // Démarrer une session.

    session_start();

    // Vérifier si l'utilisateur est connecté.

    if (isset($_SESSION['role'])) {
        
        // Si l'on se trouve sur la page de connexion, rediriger vers les pages en question en fonction du role de l'utilisateur.
        
        if ($_SERVER['PHP_SELF'] == '/briand.lucas/connexion.php' && $_SERVER['PHP_SELF'] == '/briand.lucas/inscription.php') {
            
            if ($_SESSION['role'] == 'ADMIN') {
                
                header('Location: admin.php');
                
            } elseif ($_SESSION['role'] == 'GUEST') {
                
                header('Location: wishlist.php');
                
            }
            
        } else {
            
            // Si l'on se trouve sur la page de l'administration, vérifier si l'utilisateur dispose du role ADMIN.
            
            if ($_SERVER['PHP_SELF'] == '/briand.lucas/admin.php' || $_SERVER['PHP_SELF'] == '/briand.lucas/gestioncroix.php' || $_SERVER['PHP_SELF'] == '/briand.lucas/gestionproduit.php' || $_SERVER['PHP_SELF'] == '/briand.lucas/gestioncontact.php') {
                
                if ($_SESSION['role'] != 'ADMIN') {
                    
                    // Si l'utilisateur ne dispose pas du role ADMIN, rediriger vers la page de connexion.
                    
                    header('Location: wishlist.php');
                    
                }
                
            }
            
        }

    } else {
        
        // Si nous ne sommes pas sur la page de connexion, rediriger vers la page de connexion.

        if ($_SERVER['PHP_SELF'] != '/briand.lucas/connexion.php' && $_SERVER['PHP_SELF'] != '/briand.lucas/inscription.php') {
            
            header('Location: connexion.php');
            
        }
        
    }

?>