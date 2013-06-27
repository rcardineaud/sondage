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
        
        var_dump($_POST['choixGrp']);

        $gererGrp->deleteGrp($_POST['choixGrp']);


        ?>
    </body>
</html>
