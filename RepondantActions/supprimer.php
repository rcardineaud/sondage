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
        require '/Class/Repondant.php';    //appelle des classes
        require '/Class/RepondantGerer.php';
        
        $repondant = new Repondant($_POST['Nom_suppression'], 
                                   $_POST['Prenom_suppression'],
                                   $_POST['Mail_suppression']);
        
        $gerer->deleteRep($repondant);
  
        ?>
    </body>
</html>
