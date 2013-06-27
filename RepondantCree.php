<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

        
        <?php
        //On appelle les classes
        require 'Class/Repondant.php';    
        require 'Class/RepondantGerer.php';
        require 'Class/GroupeGerer.php';
        
        
        //on créé un nouveau répondant avec les données entrées par l'utilisateur
        $repondant = new Repondant($_POST['nom'],$_POST['prenom'],$_POST['mail']);
        
        //Connection à la base de données
        $db = new PDO('mysql:host=localhost;dbname=sondage', 'root', '');
        $gerer = new RepondantGerer($db);
        
        //On actionne la méthode add
        $gerer->addRep($repondant);  
        ?>
        
        </p>
            <?php 
            $gererGrp = new GroupeGerer($db);
            $lastID= $gerer->dernierID();
            
            $gererGrp->AjoutGroupeRepondant($_POST['choixGrp'], $lastID);
            $gererGrp->Compteur();
            ?>
        
            <a href="RepondantCreation.php">Créer un autre répondant</a>
        </p>
    </body>
</html>
