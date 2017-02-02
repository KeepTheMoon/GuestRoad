<?php
require_once __DIR__."/../Vue/vueTrajet.php";
require_once 'Vue/util.php';
require_once 'Modele/dao.php';
/**
 * Class contôleur trajet
 */

/**
 * Permet de gérer les actions qui ce passe sur la page des trajets
 * @author baptiste
 * @package controleur
 */
class ControleurTrajet{
/**
 * Vue trajet
 * @var vueTrajet
 */
    private $_vue;
    /**
     * utilitaire html
     * @var util
     */
    private $_util;
    /**
     * initialisation du dao
     * @var dao
     */
    private $_dao;
/**
 * constructeur vide
 */
    public function __construct($login, $droits){ 
        $_dao=new dao();
        $_util = new util();
        $_vue = new vueTrajet();
         $_util->header("Trajets");
        $_util->navbar("Trajets", $login, $droits);
        $_util->footer();
        
    }

    public function tableau($mail){
        $liste = array();
        $_dao=new dao();
        $_vue = new vueTrajet();
        $id = $_dao->getIdByMail($mail);
        $listeTrajet = $_dao->getTrajet($id);
        foreach ($listeTrajet as $trajet) {
            $element = array();
            array_push($element,  $trajet->getDate());
            array_push($element, $trajet->getKm());
            array_push($liste, $element);
        }
         $societe=$_dao->getEntrepriseParUtilisateur($_SESSION['mail']);
        $listeVoiture = $_dao->getListeVoiture($societe);
        $listeClient = $_dao->getListeClientVal($societe);
        $_vue->tableau($listeVoiture, $listeClient, $liste);
    }

        public function jour($mail, $date){
        $_vue = new vueTrajet();
        $_dao=new dao();
        $id = $_dao->getIdByMail($mail);
        $listeTrajetParJour = $_dao->getTrajetParDate($id, $date);
        $listeClient = array();
        //ajout de l'adresse de l'entreprise en premier lieu
        $element = array($_SESSION['entreprise']->getAdresse()." ".$_SESSION['entreprise']->getCodePostal()." ".$_SESSION['entreprise']->getVille(), $_SESSION['entreprise']->getNom());
        array_push($listeClient, $element);
        foreach ($listeTrajetParJour as $trajet) {
            
            if ($trajet->getClient()!=null & $trajet->getVoiture()!=null){
                $voiture = $trajet->getVoiture();
                $client = $_dao->getParId($trajet->getClient(), 'client');
                $element = array($client->getAdresse(), $client->getNom());
                array_push($listeClient, $element);
            }
            elseif ($trajet->getVoiture()!=null) {
                $element = array($_SESSION['entreprise']->getAdresse()." ".$_SESSION['entreprise']->getCodePostal()." ".$_SESSION['entreprise']->getVille(), $_SESSION['entreprise']->getNom());
                array_push($listeClient, $element);
            }    
            
            
        }
        $nomVoiture = $_dao->getParId($voiture, 'voiture')->getNom();
        $_vue->jour($listeClient, $date, $nomVoiture);
    }

}?>