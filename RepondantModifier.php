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
         require 'Class/Repondant.php';    //appelle des classes
         require 'Class/RepondantGerer.php';
         require 'BaseDeDonnees.php';
         
        $db = new PDO($dns, $identifiant, $mdp);
        $gerer = new RepondantGerer($db);
        ?>
        
        <h2>Liste des Répondants</h2>
        <?php
        $gerer->GetAllRep();
        ?>
        
  
       <h2>Quel utilisateur souhaitez-vous supprimer</h2>
       <form action="RepondantModification.php" method="post">
           
       <p>   
             Nom : <input type="text" name="Nom_suppression" /><br/>
             Prenom : <input type="text" name="Prenom_suppression" /><br/>
             Mail : <input type="text" name="Mail_suppression" />
       </p>
       
      <input type="submit" name="supprimer" value="Supprimer">
       <input type="submit" name="modifierGrp" value="Modifier groupe"><br/>
       
       <a href="index.php">Retour accueil </a>
       <a href="RepondantSupprimer.php">Rafraichir page</a>
        
       <!-- <select name="test" onChange="location.href=''+this.options[this.selectedIndex].value;" method="post">
           <option value="/RepondantActions/supprimer">Supprimer</option>
           <option value="page2">Lien2</option>
       </select>
       
       
        <?php 
       $repondant = new Repondant($_POST['Nom_suppression'], 
                                   $_POST['Prenom_suppression'],
                                   $_POST['Mail_suppression']);
        
        $gerer->deleteRep($repondant);
  
        ?>
        
        -->
    </body>
</html>
