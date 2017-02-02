<?php
/**
 * Class trajet
 */
/**
 * Class qui représente un trajet
 * @author baptiste rouger
 * @package modele
 */
class trajet{
        /**
     * l'utilisateur du trajet
     * @var int
     */
    private $_utilisateur;
        /**
     * le client destinataire du trajet
     * @var int
     */
    private $_client;
    /**
     * la voiture utiilisée pour le trajet
     * @var int
     */
    private $_voiture;
    /**
     * la date du trajet
     * @var date
     */
    private $_date;
    /**
     * le nombre de kilomètre parcouru pendant le trajet
     * @var float
     */
    private $_km;
/**
 * Créer un utilisateur
 * @param int $utilisateur
 * @param int $client
 * @param int $voiture
 * @param date $date
 * @param float $km 
 */
    function __construct($utilisateur, $client, $voiture, $date, $km){
        $this->_utilisateur=$utilisateur;
        $this->_client=$client;
        $this->_voiture=$voiture;
        $this->_date=$date;
        $this->_km=$km;
    }
    /**
     * Retourne l'utilisateur du trajet
     * @return int
     */
    function getUtilisateur(){
        return $this->_utilisateur;
    }
    /**
     * Retourne le client du trajet
     * @return int
     */
    function getClient(){
        return $this->_client;
    }
    /**
     * Retourne la voiture du trajet
     * @return int
     */
    function getVoiture(){
        return $this->_voiture;
    }
    /**
     * Retourne la date du trajet
     * @return date
     */
    function getDate(){
        return $this->_date;
    }
    /**
     * Retourne le nombre de km du trajet
     * @return float
     */
    function getKm(){
        return $this->_km;
    }
}