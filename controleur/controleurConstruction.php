<?php
require_once __DIR__."/../Vue/underConstruction.php";
require_once 'Vue/util.php';
require_once 'Modele/dao.php';
/**
 * Class contôleur voiture
 */

/**
 * Permet de gérer les actions qui ce passe sur la page des voitures
 * @author baptiste
 * @package controleur
 */
class ControleurConstruction{
/**
 * Vue voiture
 * @var vueVoiture
 */
    private $vue;
    /**
     * utilitaire html
     * @var util
     */
    private $util;
/**
 * constructeur vide
 */
    public function __construct($login,$droits){ 
        $dao=new dao();
        $util=new util();
        $util->header("GestDep - Véhicules");
        $util->navbar("Voitures", $login, $droits);
        $util->footer();
    }
/**
 * génère la page
 * @param string $titre
 */
    public function vueVoiture(){
        
    }
public function tableau($mail){
        $liste = array();
        $_dao=new dao();
        $_vue = new vueVoiture();
        $societe=$_dao->getSociete($mail);
        $listeVoiture = $_dao->getListeVoiture($societe);
        foreach ($listeVoiture as $voiture) {
            $element = array();
            array_push($element, $voiture->getNom());
            array_push($element,  $voiture->getPuissance());
            array_push($liste, $element);
        }
        $_vue->tableau($liste);
    }
}?>