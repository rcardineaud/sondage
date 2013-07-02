<?php         
require_once 'Class/Groupe.php';
require_once 'Class/GroupeGerer.php';
require_once 'BaseDeDonnees.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h2>Liste des Groupes</h2>
        <form action="GroupeSupprime.php" method="post" name="supprimer">
  
        <?php
        $gererGrp = new GroupeGerer($db);       
        $gererGrp->CheckBoxGrp();
        ?>

         <br>
         <input type="submit" value="supprimer"><br>
         <input type="submit" value="renommer"><br> 

         <a href="index.php">Retour accueil</a>
         <a href="GroupeModification.php">Rafraichir page</a>
    </body>
</html>
