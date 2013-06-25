<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GroupeGerer
 *
 * @author rcardineaud
 */
class GroupeGerer {
    private $_db;
    
    public function __construct($db) {
        $this->setDb($db);
    }
    
    
    public function addGrp(Groupe $groupe){
        $gadd= $this->_db->prepare('INSERT INTO Groupe
                                    SET 
                                    libelle_groupe = :libelle_groupe');
        
        $gadd->bindvalue(':libelle_groupe',$groupe->getLibelleGroupe(),PDO::PARAM_STR);
    
    
        $gadd->execute();
    }
    
        public function deleteGrp(Groupe $groupe){
        $rdel = $this->_db->prepare('DELETE FROM Groupe WHERE libelle_groupe = :libelle_groupe');
        
        $rdel->bindvalue(':libelle_groupe', $groupe->getLibelleGroupe(),PDO::PARAM_STR);
        $rdel->execute();
        
    }
        
        public function GetAllGrp(){
        $resultat=$this->_db->query('Select libelle_groupe 
                                    FROM Groupe;');
        // On affiche le resultat
        $donnees = $resultat->fetchAll();
 
        //On parcourt tous les enregistrements
        foreach($donnees as $row)
        {
        //On affiche le libellé des groupes
        echo $row['libelle_groupe'];?><br/>
           <?php

        }
    }
    
        public function ShowGrp($ID_repondant){ //donne le(s) groupe(s) d'un repondant
        
        $ID_repondant = (int) $ID_repondant;
        $rget = $this->_db->query('SELECT libelle_groupe
                                   FROM Groupe
                                   INNER JOIN Repondant ON ID_repondant = ID_repondant
                                   WHERE ID_repondant ='.$ID_repondant);
        
        $donnees = $rget->fetch(PDO::FETCH_ASSOC);
 
        return new Groupe($donnees); 
                
    }
    
        public function ListeDeroulanteGrp(){
        $resultat=$this->_db->query('Select libelle_groupe 
                                     FROM Groupe;');
        // On affiche le resultat
        $donnees = $resultat->fetchAll();
        

        //On parcourt tous les enregistrements
            foreach($donnees as $row)
            {
        //On affiche les libelles des groupes sans une liste déroulante
             ?> 
             <input type="checkbox" name="choixGrp[]" value ="<?php echo $row['libelle_groupe'] ?>"> 
             <?php echo $row['libelle_groupe'];
            
             //On enregistre les donnees dans la BDD (table : appartenance)
            
        }
        }
        
        public function AjoutGroupeRepondant(){
            $IDRep=$this->_db->query('INSERT INTO appartenance
                                        VALUES (');
            

                                    
            /* $IDGrp=$this->_db->query('SELECT ID_groupe
                                      FROM Groupe
                                      WHERE libelle_groupe=($variable)');*/
        }
            
        
        

    
     public function setDb(PDO $db){
         $this->_db = $db;
     }
}

?>
