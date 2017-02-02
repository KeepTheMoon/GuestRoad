<?php
require_once __DIR__."/../Vue/vueSociete.php";
require_once 'Vue/util.php';
require_once 'Modele/dao.php';
/**
 * Class contôleur societe
 */

/**
 * Permet de gérer les actions qui ce passe sur la page de l'entreprise
 * @author baptiste
 * @package controleur
 */
class ControleurSociete{
/**
 * Vue societe
 * @var vueSociete
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
    public function vueSociete($login,$droits,$entreprise,$responsable){
        $dao=new dao();
        $util=new util();
        $util->header("GestDep - Entreprise");
        $util->navbar("Entre", $login, $droits);
        $vue=new vueSociete();
        $vue->formulaire($entreprise,$responsable);
        $util->footer();
    }

}?>