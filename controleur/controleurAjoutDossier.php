<?php

require_once"Modele/dao.php";
/**
 * Class contrôleur ajout dossier
 */

/**
 * Permet d'ajouter un dossier
 * @author baptiste
 * @package controleur
 */
class controleurAjoutDossier{
    /**
     * initialisation du dao
     * @var dao
     */
    private $_dao;
    /**
     * Permet d'ajouter un nouvel utilisateur
     * @param dossier $dossier
     * @param commentaire $commentaire
     * @param DateTime $relance
     * @param DateTime $date
     */
    public function __construct($dossier, $commentaire, $relance, $date){
        $this->_dao=new dao();
        $this->_dao->createDossier($dossier->getAgence(), $dossier->getIdUtilisateur(), $dossier->getNom(), $dossier->getPrenom(), $dossier->getPart(), $dossier->getApporteur(), $commentaire, $relance, $date);
    }
}?>