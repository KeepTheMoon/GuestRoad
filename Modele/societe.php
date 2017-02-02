<?php
/**
 * Class societe
 */
/**
 * Class qui représente une societe
 * @author baptiste rouger
 * @package modele
 */
class societe{
    /**
     * l'id de la société
     * @var integer
     */
    private $_id;
    /**
     * le nom de la societe
     * @var string
     */
    private $_nom;
    /**
     * l'adresse de la societe
     * @var string
     */
    private $_adresse;
    /**
     * code postal societe
     * @var string
     */
    private $_codePostal;
    /**
     * ville societe
     * @var string
     */
    private $_ville;
    /**
     * date de début d'exercice
     * @var string
     */
    private $_dateExercice;
    /**
     * l'adresse de la societe
     * @var string
     */
    private $_idResponsable;
/**
 * Créer un societe
 * @param string $nom
 * @param string $adresse
 * @param int $codePostal
 * @param string $ville
 * @param string $dateExercice
 * @param string $idResponsable
 */
    function __construct($id, $nom, $adresse, $codePostal, $ville, $dateExercice, $idResponsable){
        $this->_id=$id;
        $this->_nom=$nom;
        $this->_adresse=$adresse; 
        $this->_codePostal=$codePostal; 
        $this->_ville=$ville; 
        $this->_dateExercice=$dateExercice;
        $this->_idResponsable=$idResponsable;
           }
    /**
     * Retourne l'id de la societe
     * @return integer
     */
    function getId(){
        return $this->_id;
    }
    /**
     * Retourne le nom de la societe
     * @return string
     */
    function getNom(){
        return $this->_nom;
    }
    /**
     * Retourne l'adresse de la societe
     * @return string
     */
    function getAdresse(){
        return $this->_adresse;
    }
    /**
     * Retourne le code postal de la societe
     * @return int
     */
    function getCodePostal(){
        return $this->_codePostal;
    }
    /**
     * Retourne la ville de la societe
     * @return string
     */
    function getVille(){
        return $this->_ville;
    }
    /**
     * Retourne la date du début d'exercice
     * @return string
     */
    function getDateExercice(){
        return $this->_dateExercice;
    }
     /**
     * Retourne l'id du responsable de la société
     * @return string
     */
    function getIdResp(){
        return $this->_idResponsable;
    }
}