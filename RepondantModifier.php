<?php       
require 'Class/Repondant.php';
require 'Class/RepondantGerer.php';
require 'BaseDeDonnees.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
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
       <form action="RepondantModification.php" method="post">
           
       <p>   
             Nom : <input type="text" name="Nom_suppression" /><br/>
             Prenom : <input type="text" name="Prenom_suppression" /><br/>
             Mail : <input type="text" name="Mail_suppression" />
       </p>
       
       <input type="submit" name="supprimer" value="Supprimer">
       <input type="submit" name="modifierGrp" value="Modifier groupe"><br/>
       
       <a href="index.php">Retour accueil </a>
       <a href="RepondantSupprimer.php">Rafraichir page</a>
        
        <?php 
        $repondant = new Repondant($_POST['Nom_suppression'], 
                                   $_POST['Prenom_suppression'],
                                   $_POST['Mail_suppression']);
        
        $gerer->deleteRep($repondant);
  
        ?>
        
        -->
    </body>
</html>
