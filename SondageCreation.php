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
         <h1>Creation d'un nouveau Sondage</h1>
         <form action="RepondantCree.php" method="post">

         <p> Titre : <input type="text" name="nom" /><br/>
          ... :<input type="text" name="prenom" /><br/>
          ... : <input type="text" name="mail" /><br/>
          ... : 
          <?php 
          require 'Class/GroupeGerer.php'; 
          require 'BaseDeDonnees.php';
          $db = new PDO($dns, $identifiant, $mdp);
          $gererGrp = new GroupeGerer($db);
          $gererGrp->ListeDeroulanteGrp();

          ?><br/>
    </body>
</html>
