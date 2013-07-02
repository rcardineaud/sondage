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
    public function __construct($db)
    {
        $this->setDb($db);
    }
    
        /**
     * Permet d'ajouter un repondant dans la base de données
     * 
     * @param Repondant $repondant
     * 
     */
    public function addRep(Repondant $repondant)
    {
        
        //controle les doublons
          $rdoublon= $this->_db->prepare('SELECT Mail_repondant
                                          FROM Repondant
                                          WHERE Mail_repondant = :Mail_repondant');
          $rdoublon->bindvalue(':Mail_repondant', $repondant->getMail(),PDO::PARAM_STR);
          $rdoublon->execute();
          
          // on vérifie si une ligne est retourné
          $num_rows = $rdoublon->fetchColumn();

          // si oui, alors on n'insere pas
          if($num_rows==TRUE) { 
              echo 'Un répondant possèdant la même adresse mail existe déjà';
          } 
          // si non, on insère
            else {
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
    }
    
     /**
     * Permet de supprimer un repondant present dans la base de données
     * 
     * @param Repondant $repondant
     * 
     */
    public function deleteRep(Repondant $repondant)
    { 
        $rdel = $this->_db->prepare('DELETE FROM Repondant 
                                     WHERE Nom_repondant = :Nom_repondant');
        
        $rdel->bindvalue(':Nom_repondant', $repondant->getNom(),PDO::PARAM_STR);
        $rdel->execute(); 
    }
    
     /**
     * Permet de recuperer les donnees d'un repondant present dans la BDD
     * 
     * @param String $ID_repondant
     * 
     * @return Repondant
     */
   public function getRep($ID_repondant)
   { 
       //transforme l'ID string en un ID integer
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
    
        /**
     * Permet d'afficher tous les repondants present dans la BDD
     * 
     * @return tableau des repondants
     *
     */
    public function GetAllRep()
    { 
        $resultat=$this->_db->query('SELECT *
                                     FROM Repondant');
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
           <td> <?php echo $row['Mail_repondant']; ?> </td>
           </tr>   
       <?php } ?> 
          </table> 
           <?php
    }
    
    
        /**
     * Permet de retourner le dernier ID_repondant créé
     * 
     * @return integer $Last_ID
     *
     */
    public function dernierID()
    {
        $Last_ID= $this->_db->lastInsertId();
        return $Last_ID;
    }
    
     
     public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
    
}

?>
