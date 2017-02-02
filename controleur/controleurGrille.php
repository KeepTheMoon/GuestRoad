<?php
require_once __DIR__."/../Vue/underConstruction.php";
require_once 'Vue/util.php';
require_once 'Modele/dao.php';
/**
 * Class contôleur Grille
 */

/**
 * Permet de gérer les actions qui ce passe sur la page grilles des indem...
 * @author baptiste
 * @package controleur
 */
class ControleurGrille{
/**
 * Vue Grille
 * @var vueGrille
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
        $util->header("GestDep - Grille");
        $util->navbar("Grille", $login, $droits);
        $util->footer();
    }
/**
 * génère la page
 * @param string $titre
 */
    public function vueGrille(){
        $vue=new vueConstruction();
    }

}?>