<?php 
require 'Class/GroupeGerer.php'; 
require 'BaseDeDonnees.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Creation d'un nouveau Répondant</h1>
       <form action="RepondantCree.php" method="post">

         <p> Nom : <input type="text" name="nom" maxlength="40"/><br>
          Prenom :<input type="text" name="prenom" maxlength="35"/><br>
          Adresse mail : <input type="text" name="mail" maxlength="50"/><br>
          Groupe : 
          <?php 
          $gererGrp = new GroupeGerer($db);
          $gererGrp->CheckBoxGrp();

          ?><br>

          
           <input type="submit" value="Valider" /><br>
           <a href="index.php">Retour accueil</a>

    </body>
</html>
