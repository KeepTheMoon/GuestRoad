<?php
require_once"Modele/dao.php";
/**
 * Class contrôleur ajout utilisateur
 */

/**
 * Permet d'ajouter un nouvel utilisateur
 * @author baptiste
 * @package controleur
 */
class controleurAjoutUtilisateur{
    /**
     * initialisation du dao
     * @var dao
     */
    private $_dao;
    /**
     * Permet d'ajouter un utlisateur
     * @param utilisateur $utilisateur
     */
    public function __construct($utilisateur){
        $this->_dao=new dao();
        $this->_dao->createUser($utilisateur->getNom(), $utilisateur->getPrenom(), $utilisateur->getMdp(), $utilisateur->getAgence(), $utilisateur->getDroit());
    }
}?>