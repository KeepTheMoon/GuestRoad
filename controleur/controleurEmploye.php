<?php
require_once __DIR__."/../Vue/vueEmploye.php";
require_once 'Vue/util.php';
require_once 'Modele/dao.php';
/**
 * Class contrôleur employé/utilisateur
 */

/**
 * Permet de gérer toutes les actions concernant les utilisateurs
 * @author baptiste
 * @package controleur
 */
class ControleurEmploye{
/**
 * vue employé
 * @var vueEmploye
 */
    private $vue;
/**
 * utilitaire html
 * @var util
 */
    private $util;
/**
 * Créer le header et la barre de navigation
 */
    public function __construct(){

    }
    /**
     * Prépare les données pour créer le tableau utilisateur
     */
    public function vueEmploye($login, $droits, $listeUtils){
        $dao=new dao();
        $util=new util();
        $util->header("GestDep - Utilisateurs");
        $util->navbar("Util", $login, $droits);
        $vue=new vueEmploye();
        $_dao = new dao(); 
        $listeEntreprise = $_dao->getListeEntreprise();
        $vue->tableau($listeUtils, $listeEntreprise);
        $util->footer();
    }
    
}
?>