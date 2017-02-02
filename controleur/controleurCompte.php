<?php
require_once __DIR__."/../Vue/vueCompte.php";
require_once 'Vue/util.php';
require_once 'Modele/dao.php';
/**
 * Class contôleur compte
 */

/**
 * Permet de gérer les actions qui ce passe sur la page du compte utilisateur
 * @author baptiste
 * @package controleur
 */
class ControleurCompte{
/**
 * Vue compte
 * @var vueCompte
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
    public function __construct(){ 
        
    }
/**
 * génère la page
 * @param string $titre
 */
    public function vueCompte($login,$droits){
        $dao=new dao();
        $util=new util();
        $util->header("Compte");
        $util->navbar("Compte", $login, $droits);
        $vue=new vueCompte($_SESSION['mail']);
        $util->footer();
    }

}?>