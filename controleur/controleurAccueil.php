<?php
require_once __DIR__."/../Vue/vueAccueil.php";
require_once 'Vue/util.php';
require_once 'Modele/dao.php';
/**
 * Class contôleur accueil
 */

/**
 * Permet de gérer les actions qui ce passe sur la page d'accueil
 * @author baptiste
 * @package controleur
 */
class ControleurAccueil{
/**
 * Vue accueil
 * @var vueAccueil
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
    public function vueAccueil($login,$droits){
        $dao=new dao();
        $vueAccueil=new vueAccueil($login, $droits);
    }

}?>