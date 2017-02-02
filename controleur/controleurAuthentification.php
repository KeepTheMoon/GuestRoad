<?php
require_once __DIR__."/../Vue/identification.php";
require_once 'Vue/util.php';
/**
 * Class contrôleur authentification
 */

/**
 * Permet de gérer les action de connexion
 * @author baptiste
 * @package controleur
 */
class ControleurAuthentification{
/**
 * vue de connexion
 * @var identification
 */
    private $vue;
    /**
     * utilitaire html
     * @var unknown
     */
    private $util;
/**
 * Construit la page de connexion en initialisant la variable vue
 */
    public function __construct(){
        $this->vue=new identification();
    }


  /*  public function accueil(){
        $this->vue->genereVueAccueil();

    }*/
/**
 *  Génère la page de connexion et le header
 */
    public function connexion() {
       $this->util=new util();
        $this->util->header('identification');
        $this->vue->genereVueConnexion();
        
    }
    /**
     * Génère le footer
     */
    public function footer(){
        $this->util->footer();
    }
/*
    public function apresConnexionUser() {
        $this->vue-> genereVueApresConnexionUser();
    }

    public function apresConnexionAdmin() {
        $this->vue-> genereVueApresConnexionAdmin();
    }


    public function deconnexion() {
        $this->vue->genereVueAccueil();
    }*/

}