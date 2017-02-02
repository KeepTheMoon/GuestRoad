<?php
/**
 * Class utilisateur
 */
/**
 * Class qui représente un utilisateur
 * @author baptiste rouger
 * @package modele
 */
class utilisateur{
    /**
     * l'id de l'utilisateur
     * @var int
     */
    private $_id;        /**
     * le nom de l'utilisateur
     * @var string
     */
    private $_nom;
        /**
     * le prénom de l'utilisateur
     * @var string
     */
    private $_prenom;
    /**
     * le mail de l'utilisateur
     * @var string
     */
    private $_mail;
    /**
     * la société de l'utilisateur
     * @var societe
     */
    private $_societe;
    /**
     * les droits de l'utilisateur
     * @var string
     */
    private $_droits;
/**
 * Créer un utilisateur
 * @param string $nom
 * @param string $prenom
 * @param string $mail
 * @param societe $societe
 * @param string $droits
 */
    function __construct($id, $nom, $prenom, $mail, $societe, $droits){
        $this->_id=$id;
        $this->_nom=$nom;
        $this->_prenom=$prenom;
        $this->_mail=$mail;
        $this->_societe=$societe;
        $this->_droits=$droits;
    }
    /**
     * Retourne l'id de l'utilisateur
     * @return int
     */
    function getId(){
        return $this->_id;
    }    
    /**
     * Retourne le nom de l'utilisateur
     * @return string
     */
    function getNom(){
        return $this->_nom;
    }
    /**
     * Retourne le prénom de l'utilisateur
     * @return string
     */
    function getPrenom(){
        return $this->_prenom;
    }
    /**
     * Retourne le mail de l'utilisateur
     * @return string
     */
    function getMail(){
        return $this->_mail;
    }
    /**
     * Retourne la société de l'utilisateur
     * @return societe
     */
    function getSociete(){
        return $this->_societe;
    }
    /**
     * Retourne les droits de l'utilisateur
     * @return string
     */
    function getDroits(){
        return $this->_droits;
    }
}