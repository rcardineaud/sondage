<?php       
require_once 'Class/Repondant.php';
require_once 'Class/RepondantGerer.php';
require_once 'BaseDeDonnees.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        $gerer = new RepondantGerer($db);
        ?>
        <h2>Liste des Répondants</h2>
        <?php
        $gerer->GetAllRep();
        ?>
        <h2>Quel utilisateur souhaitez-vous supprimer</h2>
        <form action="RepondantSupprime.php" method="post">
       <p>   
           Nom : <input type="text" name="Nom_suppression" /><br/>
           Prenom : <input type="text" name="Prenom_suppression" /><br/>
           Mail : <input type="text" name="Mail_suppression" />
       </p>
       <input type="submit" name="supprimer" value="Supprimer">
       <a href="index.php">Retour accueil </a>
       <a href="RepondantSupprimer.php">Rafraichir page</a>
    </body>
</html>
