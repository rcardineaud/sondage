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
class GroupeGerer 
{
    private $_db;
    
    public function __construct($db) 
    {
        $this->setDb($db);
    }
    
    
        
    /**
     * Permet d'ajouter un groupe dans la base de données
     * 
     * @param Groupe $Groupe
     * 
     * @return type Description
     */
        public function addGrp(Groupe $groupe)
       {
        //Contrôle si le champ est vide
           if(empty($_POST['libelle_groupe'])){ 
               echo "Vous devez saisir un libellé pour le groupe";
               
               } else {
                   
                   $rdoublon = $this->_db->prepare('SELECT libelle_groupe
                                                    FROM Groupe
                                                    WHERE libelle_groupe=:libelle_groupe');
                   
                   $rdoublon->bindvalue(':libelle_groupe',$groupe->getLibelleGroupe(),
                           PDO::PARAM_STR);
                   $rdoublon->execute();
                   
                   // on vérifie si une ligne est retourné
                   $num_rows = $rdoublon->fetchColumn();
                   // si oui, alors on n'insere pas
                   if($num_rows==TRUE) {
                       echo 'Ce groupe existe déjà';
                   } 
                    // si non, on insère
                     else {
                         $gadd= $this->_db->prepare('INSERT INTO Groupe
                                                     SET 
                                                     libelle_groupe = :libelle_groupe');
        
                         $gadd->bindvalue(':libelle_groupe',$groupe->getLibelleGroupe(),
                                 PDO::PARAM_STR);
                
                         $gadd->execute();
            
                         echo "Le groupe ",$_POST['libelle_groupe'],
                            " a été créé avec succès!";
                     }
          
                }
       }
    
            /**
     * Permet de supprimer un groupe dans la base de données
     * 
     * @param String $ID_groupe
     * 
     * @return type Description
     */
        public function deleteGrp($ID_groupe)
        { 
            
            foreach($ID_groupe as $element){
                $num_ID=(int)$element;
            
                //requete de supression du groupe dans la table appartient
                $rdelAppartient = $this->_db->prepare('DELETE FROM Appartient 
                                                       WHERE ID_groupe=:ID_groupe');
                
                //requete de suppression du groupe dans la table Groupe
                $rdelGroupe = $this->_db->prepare('DELETE FROM Groupe 
                                                   WHERE ID_groupe=:ID_groupe');
        
                $rdelAppartient->bindvalue(':ID_groupe', $num_ID, PDO::PARAM_STR);
                $rdelGroupe->bindvalue(':ID_groupe', $num_ID, PDO::PARAM_STR);
                $rdelAppartient->execute();
                $rdelGroupe->execute();
            }
           
        }
    
      /**
     * Permet de retourner tous les groupes présents dans la base de données
     * 
     * @param Aucun
     * 
     * @return type Description
     */
       public function GetAllGrp()
       {
           $resultat=$this->_db->query('SELECT ID_groupe, libelle_groupe 
                                        FROM Groupe
                                        WHERE libelle_groupe !="defaut"');
           //On enregistre le resultat dans une variable
           $donnees = $resultat->fetchAll();
        
            //On parcourt tous les enregistrements
            foreach($donnees as $row){
                //On affiche le libellé des groupes
                echo $row['libelle_groupe'];?><br/>
            <?php

            }
       }
    
        
     /**
     * donne le(s) groupe(s) d'un repondant
     * 
     * @param String $ID_repondant
     * 
     * @return $donnees tableau
     */
        public function ShowGrp($ID_repondant)
        { 
            
            //on transforme l'ID_repondant en un entier
            $ID_repondant = (int) $ID_repondant;
            $rget = $this->_db->query('SELECT libelle_groupe
                                       FROM Groupe
                                       INNER JOIN Repondant ON 
                                       (repondant.ID_repondant = groupe.ID_repondant)
                                       WHERE ID_repondant ='.$ID_repondant);
        
            $donnees = $rget->fetch(PDO::FETCH_ASSOC);
 
            return $donnees; 
                
        }
    
        
        
     /**
     * Affiche tous les groupes avec un format checkbox
     * 
     * @param Aucun
     * 
     * @return type Description
     */
        public function CheckBoxGrp()
        {
            
            //on enregistre dans la variable tous les groupes, sauf celui par défaut    
            $resultat=$this->_db->query('Select ID_groupe,libelle_groupe 
                                         FROM Groupe
                                         WHERE libelle_groupe != "defaut"');
            // On affiche le resultat
            $donnees = $resultat->fetchAll();
        

            //On parcourt tous les enregistrements
            foreach($donnees as $row){
            //On affiche les libelles des groupes dans un checkbox
             ?> 
                <input type="checkbox" name="choixGrp[]" onclick="compteur();" 
                    value ="<?php echo $row['ID_groupe'] ?>"> 
          <?php echo $row['libelle_groupe'];

            }
        }
        
        
     /**
     *Compte le nombre de groupes séléctionnés lors de la création d'un répondant
     * 
     * @param String $ID_repondant
     * 
     * @return type Description
     */
        public function Compteur()
        {
            $nb = count($_POST['choixGrp']);
            echo "Vous avez séléctionné ".$nb, " groupes. ";
        }
        
        
     /**
     *Permet de renommer un groupe
     * 
     * @param String $ID_repondant, Integer $id_groupe
     * 
     * @return type Description
     */
        public function renameGrp($new_libelle_groupe, $id_groupe)
        {

            $rrename= $this->_db->prepare('UPDATE Groupe 
                                           SET libelle_groupe=:libelle_groupe
                                           WHERE ID_groupe=:ID_groupe');
            
            $rrename->bindvalue(':libelle_groupe', $new_libelle_groupe, PDO::PARAM_STR);
            $rrename->bindvalue(':ID_groupe', $id_groupe, PDO::PARAM_INT);
            $rrename->execute();
                    
        }
        
     /**
     *Permet d'afficher un groupe pour un identifiant de groupe donné
     * 
     * @param Integer $ID_groupe
     * 
     * @return String $rnameID
     */
        public function NameID($ID_groupe)
        {
            $rnameID = $this->_db->query('SELECT libelle_groupe
                                          FROM Groupe
                                          WHERE ID_groupe=:ID_groupe');
            $rnameID->bindvalue(':ID_groupe', $ID_groupe, PDO::PARAM_INT);
            return $rnameID;
        }
        
     /**
     * On ajoute un répondant à un ou plusieurs groupe(s)
     * 
     * @param Tableau de string $tab_ID_groupe , Integer $ID_repondant
     * 
     * @return type Description
     */
        public function AjoutGroupeRepondant($tab_ID_groupe, $ID_repondant)
        {  
                                   
            foreach($tab_ID_groupe as $element){
                       
            $num_ID=(int)$element;
            $rajout = $this->_db->prepare("INSERT INTO Appartient(ID_groupe,
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
