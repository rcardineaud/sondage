<?php      
require 'Class/Repondant.php';    
require 'Class/RepondantGerer.php';
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
        <?php
       if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail'])){ 
           echo "Vous devez remplir tous les champs";
       } else {
            //on créé un nouveau répondant avec les données entrées par l'utilisateur
            $repondant = new Repondant($_POST['nom'],$_POST['prenom'],$_POST['mail']);
            $db = new PDO($dns,$identifiant,$mdp);
            $gerer = new RepondantGerer($db);
            $gerer->addRep($repondant);  
            
            $gererGrp = new GroupeGerer($db);
            $lastID= $gerer->dernierID();
            $gererGrp->AjoutGroupeRepondant($_POST['choixGrp'], $lastID);   
       }
            ?>
        </p>
            <a href="RepondantCreation.php">Créer un autre répondant</a>
        </p>
    </body>
</html>
