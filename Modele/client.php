<?php
/**
 * Class client
 */
/**
 * Class qui représente un client
 * @author baptiste
 * @package modele
 */
class client{
    /**
     * l'id du client
     * @var int
     */
    private $_id;
    /**
     * le nom du client
     * @var string
     */
    private $_nom;
    /**
     * l'email du client
     * @var email
     */
    private $_email;
    /**
     * le telephone du client
     * @var email
     */
    private $_telephone;
    /**
     * l'adresse du client
     * @var string
     */
    private $_adresse;
    /**
     * validité de l'adresse
     * @var tinyint
     */
    private $_check;

/**
 * Créer un client
 * @param int $id
 * @param string $nom
 * @param string $email
 * @param string $telephone
 * @param string $adresse
 * @param tinyint $check
 */
    function __construct($id, $nom, $email, $telephone, $adresse, $check){
        $this->_id=$id;    
        $this->_nom=$nom;
        $this->_email=$email;
        $this->_telephone=$telephone;
        $this->_adresse=$adresse;
        $this->_check=$check;
    }
    /**
     * Retourne l'id du client
     * @return int
     */
    function getId(){
        return $this->_id;
    }
    /**
     * Retourne le nom du client
     * @return string
     */
    function getNom(){
        return $this->_nom;
    }
    /**
     * Retourne l'adresse du client
     * @return string
     */
    function getAdresse(){
        return $this->_adresse;
    }
    /**
     * Retourne l'email du client
     * @return string
     */
    function getEmail(){
        return $this->_email;
    }
    /**
     * Retourne le numéro de téléphone du client
     * @return string
     */
    function getTelephone(){
        return $this->_telephone;
    }
    /**
    * Retourne la validité de son adresse
     * @return tinyint
     */
    function getCheck(){
        return $this->_check;
    }
    /**
     * Valide l'adresse du client
     * @param tinyint $check
     */
    function setCheck($check){
        $this->_check=$check;
    }

    /**
     * Redéfini le nom du client
     * @param string $nom
     */
    function setNom($nom){
        $this->_nom=$nom;
    }
    /**
     * Redéfini l'adresse du client
     * @param string $adresse
     */
    function setAdresse($adresse){
        $this->_adresse=$adresse;
    }

}