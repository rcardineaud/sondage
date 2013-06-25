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
    
    
    //Permet d'ajouter un groupe dans la base de données
    public function addGrp(Groupe $groupe){
        $gadd= $this->_db->prepare('INSERT INTO Groupe
                                    SET 
                                    libelle_groupe = :libelle_groupe');
        
        $gadd->bindvalue(':libelle_groupe',$groupe->getLibelleGroupe(),PDO::PARAM_STR);
    
    
        $gadd->execute();
    }
    
        //permet de supprimer un groupe
        public function deleteGrp(Groupe $groupe){ 
        $rdel = $this->_db->prepare('DELETE FROM Groupe 
                                     WHERE libelle_groupe = :libelle_groupe');
        
        $rdel->bindvalue(':libelle_groupe', $groupe->getLibelleGroupe(),PDO::PARAM_STR);
        $rdel->execute();
        
    }
        
        public function GetAllGrp(){
        $resultat=$this->_db->query('Select libelle_groupe 
                                    FROM Groupe;');
        // On enregistre le resultat dans une variable
        $donnees = $resultat->fetchAll();
        
            //On parcourt tous les enregistrements
            foreach($donnees as $row){
            //On affiche le libellé des groupes
            echo $row['libelle_groupe'];?><br/>
            <?php

            }
        }
    
        //donne le(s) groupe(s) d'un repondant
        public function ShowGrp($ID_repondant){ 
        
        $ID_repondant = (int) $ID_repondant;
        $rget = $this->_db->query('SELECT libelle_groupe
                                   FROM Groupe
                                   INNER JOIN Repondant ON ID_repondant = ID_repondant
                                   WHERE ID_repondant ='.$ID_repondant);
        
        $donnees = $rget->fetch(PDO::FETCH_ASSOC);
 
        return new Groupe($donnees); 
                
        }
    
        
        public function CheckBoxGrp(){
        $resultat=$this->_db->query('Select ID_groupe,libelle_groupe 
                                     FROM Groupe;');
        // On affiche le resultat
        $donnees = $resultat->fetchAll();
        

        //On parcourt tous les enregistrements
            foreach($donnees as $row)
            {
        //On affiche les libelles des groupes sans une liste déroulante
             ?> 
             <input type="checkbox" name="choixGrp[]" onclick="compteur();" value ="<?php echo $row['ID_groupe'] ?>"> 
             <?php echo $row['libelle_groupe'];

        }
        }
        
        //Compte le nombre de groupes séléctionnés
        public function Compteur(){
            $nb = count($_POST['choixGrp']);
            echo "Vous avez séléctionné ".$nb, " groupes. ";
        }
        
        
        
        //On enregistre les donnees dans la BDD (table : appartenance)
        public function AjoutGroupeRepondant($tab_ID_groupe, $ID_repondant){  
                                   
           foreach($tab_ID_groupe as $element){
                          
            $num_ID=(int)$element;
            $rajout = $this->_db->prepare("INSERT INTO appartient(ID_groupe,
                                                                 ID_repondant) 
                                           VALUES (:ID_groupe, 
                                                    :ID_rep);");
           
            $rajout->bindValue(':ID_groupe', $num_ID, PDO::PARAM_INT);
            $rajout->bindValue(':ID_rep', $ID_repondant, PDO::PARAM_INT);

            
            $rajout->execute();
           
            }
            
            
        }
            
    
     public function setDb(PDO $db){
         $this->_db = $db;
     }
}

?>
