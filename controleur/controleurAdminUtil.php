<?php
require_once __DIR__."/../Vue/underConstruction.php";
require_once 'Vue/util.php';
require_once 'Modele/dao.php';
/**
 * Class contôleur AdminUtil
 */

/**
 * Permet de gérer les actions qui ce passe sur la page des voitures
 * @author baptiste
 * @package controleur
 */
class ControleurAdminUtil{
/**
 * Vue AdminUtil
 * @var vueAdminUtil
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
        $util->header("GestDep - Administration des utilisateurs");
        $util->navbar("AdminUtil", $login, $droits);
        $util->footer();
    }
/**
 * génère la page
 * @param string $titre
 */
    public function vueAdminUtil(){
        $vue=new vueConstruction();
    }

}?>