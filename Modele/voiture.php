<?php
/**
 * Class voiture
 */
/**
 * Class qui représente une voiture
 * @author baptiste rouger
 * @package modele
 */
class voiture{
        /**
     * l'id de la voiture
     * @var integer
     */
    private $_id;
    /**
     * le nom de la voiture
     * @var string
     */
    private $_nom;
    /**
     * la puissance de la voiture
     * @var integer
     */
    private $_puissance;
    /**
     * la société de la voiture
     * @var societe
     */
    private $_societe;
/**
 * Créer une voiture
 * @param string $id
 * @param string $modèle
 * @param string $marque
 * @param integer $puissance
 * @param societe $societe
 */
    function __construct($id, $nom, $puissance, $societe){
        $this->_id=$id;
        $this->_nom=$nom;
        $this->_puissance=$puissance;
        $this->_societe=$societe;
    }
    /**
     * Retourne l'id de la voiture
     * @return integer
     */
    function getId(){
        return $this->_id;
    }
    /**
     * Retourne le nom de la voiture
     * @return string
     */
    function getNom(){
        return $this->_nom;
    }
    /**
     * Retourne la puissance de la voiture
     * @return integer
     */
    function getPuissance(){
        return $this->_puissance;
    }
     /**
     * Retourne la société de la voiture
     * @return societe
     */
    function getSociete(){
        return $this->_societe;
    }
}