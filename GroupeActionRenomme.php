<?php     
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
        <?php
        $gererGrp = new GroupeGerer($db);

        $tab_Lib_Grp = $_POST['new_libelle_groupe'] ;
        $tab_ID_Grp = ($_POST['table_ID']);
        $i=0;
        
        while($tab_Lib_Grp[$i]==!NULL){
            $gererGrp->renameGrp($tab_Lib_Grp[$i], (int)$tab_ID_Grp[$i]);  
            $i=$i+1;
        }
        ?>
    </body>
</html>