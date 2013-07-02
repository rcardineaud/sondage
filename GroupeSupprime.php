<?php       
require_once 'Class/Groupe.php';
require_once 'Class/GroupeGerer.php';
require_once 'BaseDeDonnees.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        $gererGrp = new GroupeGerer($db);

        //controle que au moins un groupe a été séléctionné
        if(!empty($_POST['choixGrp'])){
            $gererGrp->deleteGrp($_POST['choixGrp']);
            echo 'Supression efectuée !';   
        } else {
            echo 'Vous devez saisir au moins un groupe !';
        }
        ?>
        <br>
        <a href="index.php">Retour accueil</a>
        <a href="GroupeModification.php">Retour modification</a>
        
    </body>
</html>
