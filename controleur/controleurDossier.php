<?php
require_once __DIR__."/../Vue/vueDossier.php";
require_once 'Vue/util.php';
require_once 'Modele/dao.php';
/**
 * Class contrôleur dossier
 */

/**
 * Gère les évènements à propos des dossiers
 * @author baptiste
 * @package controleur
 */
class ControleurDossier{
/**
 * vue du tbaleau de suivi
 * @var vueDossier
 */
    private $vue;
    /**
     * utilitaire html
     * @var util
     */
    private $util;
/**
 * Génère le header et la barre de navigation de la page
 */
    public function __construct(){
        $this->util=new util();
       $this->util->header('Dossier');
       $this->util->navbarConnect("Dossier");
       $this->vue=new vueDossier();
    }
    /**
     * Prépare les données pour le tableau de suivi
     */
    public function generateTable(){
        $dao=new dao();
        $annee = $dao->getAnnee();
        $dossiers = $dao->getListeSuiviDossier();

        $this->vue->avantTableau();
        foreach ($dossiers as $dossier){
            $nom = $dossier->getNom()." ".$dossier->getPrenom();
            $etat = $dossier->getEtat()->getId();
            $part = $dossier->getPart();
            $this->vue->ligneTableau($nom, $etat, $part);
        }
        $this->vue->aprèsTableau();
    }
    /**
     * Génère le formulaire de création de dossier
     */
    public function genereCreate(){
        $dao=new dao();
        $agences = $dao->getListeAgence();
        $utilisateurs = $dao->getListeUtilisateur();
        $listeAgence = array();
        foreach ($agences as $agence){
            $tabAgence[0]=$agence->getId();
            $tabAgence[1]=$agence->getNom();
            $employes = $dao->getListeEmployeByAgence($agence->getId());
            $listeUtilisateur = array();
            foreach ($employes as $employe){
                $utilisateur = $employe->getNom()." ".$employe->getPrenom();
                array_push($listeUtilisateur, $utilisateur);
            }
            $tabAgence[2]=$listeUtilisateur;
            array_push($listeAgence, $tabAgence);
        }
        $this->vue->creer($listeAgence);
    }
    /**
     * Supprime un dossier
     * @param dossier[] $listeDossier
     * @param boolean $bool
     * @param integer $annee
     */
    public function suppr($listeDossier, $bool, $annee){
        $suppr= array();
        $nonSuppr= array();
        foreach ($listeDossier as $dossier){
            if($dossier->getEtat()->getId()=='11'){
                if($bool==0){
                    array_push($suppr, $dossier->getNom().' '.$dossier->getPrenom().'<br>');
                }
                elseif($bool==1) {
                    $dao=new dao();
                    $dao->deleteDossier($dossier->getId());
                }
            }
        }
         foreach ($listeDossier as $dossier){
            if($dossier->getEtat()->getId()!='11'){
                if($bool==0){
                    array_push($nonSuppr, $dossier->getNom().' '.$dossier->getPrenom().'<br>');
                }
            }
        }
        if($bool==0){
            $this->vue->suppr($suppr, $nonSuppr, $annee);
        }
    }
    /**
     * Fonction qui permet de créer une variable qui contient tout le html nécessaire à créer le tableau de suivi, pour faire un pdf
     * @return string
     */
    public function pdf(){
        $dao=new dao();
        $annee = $dao->getAnnee();
        $dossiers = $dao->getListeSuiviDossier();
        $html="";
        $html = $this->vue->avantTableauPDF($html, $annee);
        foreach ($dossiers as $dossier){
            $nom = $dossier->getNom()." ".$dossier->getPrenom();
            $etat = $dossier->getEtat()->getId();
            $part = $dossier->getPart();
            $html = $this->vue->ligneTableauPDF($nom, $etat, $part, $html);
        }
        $html = $this->vue->aprèsTableauPDF($html);
        return $html;
 
    }
    /**
     * Bouton de création
     */
    public function genereButton(){
        $this->vue->bouton();
    }
    /**
     * Footer de la page
     */
    public function genereFooter(){
        $this->util->footer();
    }
}
?>