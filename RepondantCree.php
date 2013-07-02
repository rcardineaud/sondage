<?php      
require_once 'Class/Repondant.php';    
require_once 'Class/RepondantGerer.php';
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
       if(empty($_POST['nom']) || empty($_POST['prenom'])){ 
           echo "Vous devez remplir tous les champs correctement";
       }
          elseif(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
              echo 'mail incorrecte';
         }else{
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
