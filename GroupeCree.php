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
        
        $db = new PDO('mysql:host=localhost;dbname=sondage', 'root', '');
        $gererGrp = new GroupeGerer($db);
        $groupe= new Groupe($_POST['libelle_groupe']);
        
        //Lance la méthode add
        $gererGrp->addGrp($groupe);
        ?>
        <h2>Le groupe <?php echo $_POST['libelle_groupe']?> a été créé !</h2>
        
        <a href='index.php'>Retour accueil</>
        
    </body>
</html>
