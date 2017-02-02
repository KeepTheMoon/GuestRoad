<?php
require_once __DIR__."/../Vue/underConstruction.php";
require_once 'Vue/util.php';
require_once 'Modele/dao.php';
/**
 * Class contôleur Config
 */

/**
 * Permet de gérer les actions qui ce passe sur la page des clients
 * @author baptiste
 * @package controleur
 */
class ControleurConfig{
/**
 * Vue Config
 * @var vueConfig
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
        $util->header("GestDep - Configuration générale");
        $util->navbar("Config", $login, $droits);
        $util->footer();
    }
/**
 * génère la page
 * @param string $titre
 */
    public function vueConfig(){
        $vue=new vueConstruction();
    }

}?>