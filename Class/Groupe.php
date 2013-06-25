<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Groupe
 *
 * @author rcardineaud
 */
class Groupe {
  
    public $_libelleGroupe;
    
    public function __construct($libelle){
        $this->setLibelleGroupe($libelle);
    }
    
    //setter
    
    public function setLibelleGroupe($libelle){
        $this->_libelleGroupe = $libelle;
    }
    
    //getter
    public function getLibelleGroupe(){
        return $this->_libelleGroupe;
    }
    
}

?>
