<?php
require_once __DIR__."/../Vue/vueAgence.php";
require_once 'Vue/util.php';
require_once 'Modele/dao.php';
/**
 * Class contrôleur agence
 */

/**
 * Gère les événements à propos de l'agence
 * @author baptiste
 * @package controleur
 */
class ControleurAgence{
/**
 * vue de la partie agence
 * @var vueAgence
 */
    private $vue;
    /**
     * utilitaire html
     * @var util
     */
    private $util;
/**
 * Génère le header ainsi que la barre de navigation de la page
 */
    public function __construct(){
        $this->util=new util();
        $this->util->header('Agence');
        $this->util->navbarConnect("Agence");
        $this->vue=new vueAgence();
        
    }
    /**
     * Génère les rectangles agences
     */
    public function genereTable(){
        $dao=new dao();
        $agences= $dao->getListeAgence();
        $listeAgence = array();
        foreach ($agences as $agence){
            $employes = $dao->getListeEmployeByAgence($agence->getId());
            $listeEmploye=array();
            foreach ($employes as $employe){
                $newEmploye=$employe->getNom()." ".$employe->getPrenom();
                array_push($listeEmploye, $newEmploye);
            }
            $agenceEmpl=[$agence->getNom(), $listeEmploye];
            array_push($listeAgence, $agenceEmpl);
            
        }
        $this->vue->tableau($listeAgence);
    }
    /**
     * Génère le formulaire de création
     * @param string $nom
     */
    public function genereCreate($nom){
       $dao=new dao();
       $dao->createAgence($nom);
    }
    /**
     * Génération du bouton de création
     */
    public function genereButton(){
        $this->vue->bouton();
    }
    /**
     * Génère le footer de la page
     */
    public function genereFooter(){
        $this->util->footer();
    }
    /**
     * Supprime une agence
     * @param string $nom
     */
    public function supprAgence($nom){
        $dao = new dao();
        $dao->deleteAgence($nom);
    }
    /**
     * Modifie le nom d'une agence
     * @param string $ancienNom
     * @param string $nouveauNom
     */
    public function modificationAgence($ancienNom, $nouveauNom){
        $dao=new dao();
        $dao->changementNomAgence($ancienNom, $nouveauNom);
    }
}
?>