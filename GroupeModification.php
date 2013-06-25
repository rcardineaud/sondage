<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
        <h2>Liste des Groupes</h2>
        
        <?php
         require 'Class/Groupe.php';    //appelle des classes
         require 'Class/GroupeGerer.php';
         
        $db = new PDO('mysql:host=localhost;dbname=sondage', 'root', '');
        $gererGrp = new GroupeGerer($db);
               
        $gererGrp->GetAllGrp();

        ?>
        
         <h2>Quel groupe souhaitez-vous supprimer ?</h2>
         
         <form action="GroupeModification.php" method="post">
         <p> Nom du groupe : <input type="text" name="Libelle_groupe_suppression" /><br/>
         <input type="submit" value="supprimer"><br/>
         <a href="index.php">Retour accueil</a>
         <a href="GroupeModification.php">Rafraichir page</a>
        

        <?php 
        $groupe = new Groupe($_POST['Libelle_groupe_suppression']);
        
        $gererGrp->deleteGrp($groupe);
        ?>
        
    </body>
</html>
