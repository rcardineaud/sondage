<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

        
        <?php
        require 'Class/Repondant.php';    //appelle des classes
        require 'Class/RepondantGerer.php';
        require 'Class/GroupeGerer.php';
        
        
        //on créé un nouveau répondant avec les données entrées par l'utilisateur
        $repondant = new Repondant($_POST['nom'],$_POST['prenom'],$_POST['mail']);
        
        //Connection à la base de données
        $db = new PDO('mysql:host=localhost;dbname=sondage', 'root', '');
        $gerer = new RepondantGerer($db);
        
        //Actionne la méthode add
        $gerer->addRep($repondant);
        ?>
        
        <h1>L'utilisateur suivant a été créé :</h1>
        <p>
            Nom :    <?php echo $_POST['nom']; ?> <br/>
            Prenom : <?php echo $_POST['prenom']; ?> <br/>
            Mail :   <?php echo $_POST['mail']; ?><br/>
            Groupe : <?php echo implode(" / ", $_POST['choixGrp']);?><br/> 
                        <!-- Affiche la liste des groupes séléctionnés-->
        </p>
            <?php 
            $gererGrp = new GroupeGerer($db);
            $gererGrp->AjoutGroupeRepondant();
            ?>
        
            <a href="RepondantCreation.php">Créer un autre répondant</a>
        </p>
    </body>
</html>
