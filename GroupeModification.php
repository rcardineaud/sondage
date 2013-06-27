<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
        <h2>Liste des Groupes</h2>
        <form action="GroupeSupprime.php" method="post"><br/>
        
        
        <?php
         require 'Class/Groupe.php';    //appelle des classes
         require 'Class/GroupeGerer.php';
         require 'BaseDeDonnees.php';
         
        $db = new PDO($dns,$identifiant,$mdp);
        $gererGrp = new GroupeGerer($db);
               
        $gererGrp->CheckBoxGrp();

        ?>

         
         <br/>
         <input type="submit" value="supprimer"><br/>
         <a href="index.php">Retour accueil</a>
         <a href="GroupeModification.php">Rafraichir page</a>
        
        
    </body>
</html>
