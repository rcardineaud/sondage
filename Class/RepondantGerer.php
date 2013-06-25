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
    
    public function __construct($db) {
        $this->setDb($db);
    }
    
    public function addRep(Repondant $repondant){ //ajoute un répondant
        $radd = $this->_db->prepare('INSERT INTO Repondant 
                                     SET  
                                     Nom_repondant = :Nom_repondant, 
                                     Prenom_repondant = :Prenom_repondant, 
                                     Mail_repondant = :Mail_repondant');
       
        $radd->bindvalue(':Nom_repondant', $repondant->getNom(),PDO::PARAM_STR);
        $radd->bindvalue(':Prenom_repondant', $repondant->getPrenom(),PDO::PARAM_STR);
        $radd->bindvalue(':Mail_repondant', $repondant->getMail(),PDO::PARAM_STR);
       
        $radd->execute();
    }
    
    public function deleteRep(Repondant $repondant){ //supprime un répondant
        $rdel = $this->_db->prepare('DELETE FROM Repondant WHERE Nom_repondant = :Nom_repondant');
        
        $rdel->bindvalue(':Nom_repondant', $repondant->getNom(),PDO::PARAM_STR);
        $rdel->execute();
        
    }
    
   public function getRep($ID_repondant){ //affiche un répondant
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
    
    public function GetAllRep(){ //affiche tous les répondants
        $resultat=$this->_db->query('SELECT Nom_repondant, 
                                     Prenom_repondant, 
                                     mail_repondant, 
                                     libelle_groupe
                                     FROM Repondant rep
                                     INNER JOIN appartient grp 
                                        ON rep.ID_repondant = grp.ID_repondant
                                     INNER JOIN Groupe app 
                                        ON grp.ID_groupe = app.ID_groupe');
        // On enregistre le resultat
        $donnees = $resultat->fetchAll();
 
        //On parcourt tous les enregistrements
        foreach($donnees as $row)
        {
        //On affiche l'id, le nom, le mail et le(s) groupe(s) du client
        ?>
          <table>
              
           <tr>
           <td> <?php echo $row['Nom_repondant']; ?></td>
           <td> <?php echo $row['Prenom_repondant']; ?></td>
           <td> <?php echo $row['mail_repondant']; ?> </td>
           <td> <?php echo $row['libelle_groupe']; ?> </td>
           </tr>
           
          </table>
         <?php
        }
    }
    
     
     public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
    
}

?>
