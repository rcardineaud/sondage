<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RepondantGerer
 *
 * @author rcardineaud
 */



class RepondantGerer {
    private $_db;
    
    //constructeur
    public function __construct($db) {
        $this->setDb($db);
    }
    
    //ajoute un répondant
    public function addRep(Repondant $repondant){
        $radd = $this->_db->prepare('INSERT INTO Repondant 
                                     SET  
                                     Nom_repondant = :Nom_repondant, 
                                     Prenom_repondant = :Prenom_repondant, 
                                     Mail_repondant = :Mail_repondant');
       
        $radd->bindvalue(':Nom_repondant', $repondant->getNom(),PDO::PARAM_STR);
        $radd->bindvalue(':Prenom_repondant', $repondant->getPrenom(),PDO::PARAM_STR);
        $radd->bindvalue(':Mail_repondant', $repondant->getMail(),PDO::PARAM_STR);
       
        $radd->execute();
        
           echo "Le répondant suivant a été créé :";
        
           ?>
           <p>
           Nom : <?php echo $_POST['nom'];?><br/> 
           Prenom : <?php echo $_POST['prenom'];?><br/>
           Mail : <?php echo $_POST['mail'];?><br/>
           Groupe : <?php echo implode(" / ", $_POST['choixGrp']);?>
           </p>     
           <?php
        }
    
    //supprime un répondant
    public function deleteRep(Repondant $repondant){ 
        $rdel = $this->_db->prepare('DELETE FROM Repondant WHERE Nom_repondant = :Nom_repondant');
        
        $rdel->bindvalue(':Nom_repondant', $repondant->getNom(),PDO::PARAM_STR);
        $rdel->execute();
        
    }
    
   //affiche un répondant 
   public function getRep($ID_repondant){ 
         $ID_repondant = (int) $ID_repondant;
 
         $rget = $this->_db->query('SELECT ID_repondant, 
                                   Nom_repondant, 
                                   Prenom_repondant, 
                                   Mail_repondant 
                                   FROM Repondant 
                                   WHERE id = '.$ID_repondant);
         $donnees = $rget->fetch(PDO::FETCH_ASSOC);
 
    return new Repondant($donnees);
    }
    
    //affiche tous les répondants
    public function GetAllRep(){ 
        $resultat=$this->_db->query('SELECT *
                                     FROM Repondant
                                     ');
        // On enregistre le resultat
        $donnees = $resultat->fetchAll();
 
        ?> <table border="1" width="350"><?php
        //On parcourt le resultat ligne par ligne
        foreach($donnees as $row)
        {
        //On affiche le nom, le prenom, le mail et le(s) groupe(s) du client
        ?>
           <tr>
           <td> <?php echo $row['Nom_repondant']; ?></td>
           <td> <?php echo $row['Prenom_repondant']; ?></td>
           <td> <?php echo $row['mail_repondant']; ?> </td>
           </tr>
           
          
         
         
       <?php } ?> 
          </table> 
           
           
           <?php
    }
    
    public function dernierID(){
        $Last_ID= $this->_db->lastInsertId();
        return $Last_ID;
    }
    
     
     public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
    
}

?>
