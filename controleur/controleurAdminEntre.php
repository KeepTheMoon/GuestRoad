<?php
require_once __DIR__."/../Vue/underConstruction.php";
require_once 'Vue/util.php';
require_once 'Modele/dao.php';
/**
 * Class contôleur AdminEntre
 */

/**
 * Permet de gérer les actions qui ce passe sur la page d'administration des entreprises
 * @author baptiste
 * @package controleur
 */
class ControleurAdminEntre{
/**
 * Vue AdminEntre
 * @var vueAdminEntre
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
        $util->header("GestDep - Administration des entreprises");
        $util->navbar("AdminEntre", $login, $droits);
        $util->footer();
    }
/**
 * génère la page
 * @param string $titre
 */
    public function vueAdminEntre(){
        $vue=new vueConstruction();
    }

}?>