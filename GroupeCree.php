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
        <?php
        $gererGrp = new GroupeGerer($db);
        $groupe= new Groupe($_POST['libelle_groupe']);
        
        //Lance la méthode add
         $gererGrp->addGrp($groupe);
        ?>
        <br/>
        <a href='index.php'>Retour accueil</a>
        <a href='GroupeCreation.php'>Créer un autre groupe</a>
        
    </body>
</html>
