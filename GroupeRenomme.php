<?php      
require_once 'Class/Groupe.php';
require_once 'Class/GroupeGerer.php';
require_once 'BaseDeDonnees.php';
?>
        
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
        <form action="GroupeActionRenomme.php" method="post">
        <?php
        $gererGrp = new GroupeGerer($db);
        
        //on verifie que l'utilisateur a coché au moins 1 groupe
        if(!empty($_POST['choixGrp'])){
        //boucle foreach permettant la saisi des nouveaux libellés pour CHAQUE
            foreach ($_POST['choixGrp'] as $element) {
                ?>
                <input type="hidden" name="table_ID[]" value="<?php echo $element; ?>">      
                Nouveau libellé : <input type="text" name="new_libelle_groupe[]"> 
                <?php
            }

        } else {
            echo 'Vous devez choisir au minimum un groupe !';
        } ?>
        <input type="submit" value="modifier"><br>
    </body>
</html>
