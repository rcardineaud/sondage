<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Creation d'un nouveau Répondant</h1>
       <form action="RepondantCree.php" method="post">

         <p> Nom : <input type="text" name="nom" /><br/>
          Prenom :<input type="text" name="prenom" /><br/>
          Adresse mail : <input type="text" name="mail" /><br/>
          Groupe : 
          <?php 
          require 'Class/GroupeGerer.php'; 
          $db = new PDO('mysql:host=localhost;dbname=sondage', 'root', '');
          $gererGrp = new GroupeGerer($db);
          $gererGrp->ListeDeroulanteGrp();

          ?><br/>

                   
          
          
          
           <input type="submit" value="Valider" /><br/>
           <a href="index.php">Retour accueil</a>

    </body>
</html>
