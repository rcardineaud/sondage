<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require 'Class/Groupe.php';    //appelle des classes
        require 'Class/GroupeGerer.php';
        require 'BaseDeDonnees.php';
        
        $db = new PDO($dns, $identifiant, $mdp);
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
