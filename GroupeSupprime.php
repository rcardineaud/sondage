<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'Class/Groupe.php';
        include 'Class/GroupeGerer.php';
        include 'BaseDeDonnees.php';
        
        $db = new PDO($dns,$identifiant,$mdp);
        $gererGrp = new GroupeGerer($db);

        //controle que au moins un groupe a été séléctionné
        if(!empty($_POST['choixGrp'])){
            
            $gererGrp->deleteGrp($_POST['choixGrp']);
            echo 'Supression efectuée !';
               
        }else{
            echo 'Vous devez saisir au moins un groupe !';
        }
        ?>
        <br/>
        <a href="index.php">Retour accueil</a>
        <a href="GroupeModification.php">Retour modification</a>
        
    </body>
</html>
