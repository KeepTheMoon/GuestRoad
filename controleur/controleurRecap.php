<?php
require_once __DIR__."/../Vue/vueRecap.php";
require_once 'Vue/util.php';
require_once 'Modele/dao.php';
/**
 * Class contôleur Recap
 */

/**
 * Permet de gérer les actions qui ce passe sur la page récapitulatif
 * @author baptiste
 * @package controleur
 */
class ControleurRecap{
/**
 * Vue Recap
 * @var vueRecap
 */
    private $vue;
    /**
     * utilitaire html
     * @var util
     */
    private $util;
/**
 * constructeur 
 */
    public function __construct($login,$droits){ 
        $_dao=new dao();
        $util=new util();
        $util->header("GestDep - Récapitulatifs");
        $util->navbar("Recap", $login, $droits);
        $util->footer();
    }
/**
 * génère la page
 * @param string $titre
 */
    public function vueRecap(){
        $vue=new vueRecap();
        $_dao=new dao();
        $grille = $_dao->getGrille();
        $vue->vuePrincipale($grille);
    }

}?>