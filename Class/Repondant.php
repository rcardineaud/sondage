<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Personnage
 *
 * @author rcardineaud
 */

 

 class Repondant
        {

            public $_nom;
            public $_prenom;
            public $_mail;
            
            public function __construct($nom,$prenom,$mail) {
                $this->setnom($nom);
                $this->setprenom($prenom);
                $this->setMail($mail);
                
            }
            
 
            //setters
            
              public function setnom($nom){
                $this->_nom = $nom;
              }
              
              public function setprenom($prenom){
                $this->_prenom = $prenom;
              }
              
              public function setmail($mail){
                $this->_mail = $mail;
            }
            
                       //Getters
            
           public function getIDRepondant()
            {
                   return $this->_ID_repondant;
            }
            
             public function getNom()
            {
                   return $this->_nom;
            }
            
             public function getPrenom()
            {
                   return $this->_prenom;
            }
            
             public function getMail()
            {
                   return $this->_mail;
            }

        }



?>
