<?php
/**
 * Class routeur
 */
session_start();
require_once 'Vue/identification.php';
require_once 'Vue/vueDossier.php';
require_once 'Vue/vueEmploye.php';
require_once 'Vue/underConstruction.php';
require_once 'controleur/controleurAuthentification.php';
require_once 'controleur/controleurTrajet.php';
require_once 'controleur/controleurAccueil.php';
require_once 'controleur/controleurVoiture.php';
require_once 'controleur/controleurEmploye.php';
require_once 'controleur/controleurSociete.php';
require_once 'controleur/controleurCompte.php';
require_once 'controleur/controleurAdminUtil.php';
require_once 'controleur/controleurAdminEntre.php';
require_once 'controleur/controleurClient.php';
require_once 'controleur/controleurRecap.php';
require_once 'controleur/controleurGrille.php';
require_once 'controleur/controleurConfig.php';
//require_once 'html2pdf/html2pdf.class.php';
/**
 * Permet de gérer tous les évènements
 * @author baptiste
 * @package controleur
 */
class Routeur {
/**
 * contrôleur authentification
 * @var ControleurAuthentification
 */
    private $ctrlAuthentification;
    /**
     * contrôleur dossier
     * @var ControleurDossier
     */
    private $_ctrlTrajet;
    /**
     * contrôleur accueil
     * @var ControleurAccueil
     */
    private $_ctrlAccueil;
    /**
     * contrôleur voiture
     * @var ControleurVoiture
     */
    private $_ctrlVoiture;
    /**
     * contrôleur employé
     * @var ControleurEmploye
     */
    private $_ctrlEmploye;
    /**
     * contrôleur société
     * @var ControleurSociete
     */
    private $_ctrlSociete;
    /**
     * contrôleur compte
     * @var ControleurCompte
     */
    private $_ctrlCompte;
    /**
     * contrôleur administration utilisateurs
     * @var ControleurAdminUtil
     */
    private $_ctrlAdminUtil;
    /**
     * contrôleur administration utilisateurs
     * @var ControleurAdminUtil
     */
    private $_ctrlAdminEntre;
    /**
     * contrôleur liste clients
     * @var ControleurClient
     */
    private $_ctrlClient;
    /**
     * contrôleur récapitulatif
     * @var ControleurRecap
     */
    private $_ctrlRecap;
    /**
     * contrôleur grille
     * @var ControleurGrille
     */
    private $_ctrlGrille;
    /**
     * contrôleur configuration générale
     * @var ControleurConfig
     */
    private $_ctrlConfig;
        /**
     * dao générale
     * @var dao
     */
    private $_dao;
        /**
     * mail
     * @var mail
     */
    private $_mail;
        /**
     * idEntreprise
     * @var idEntreprise
     */
    private $_idEntreprise;
/**
 * Génère la page de connexion à sa construction
 */
    public function __construct(){
        $this->ctrlAuthentification= new ControleurAuthentification();
       $this->_ctrlAccueil= new ControleurAccueil();
    }
/**
 * Traite une requête entrante
 */
 
    public function routerRequete() {
/**
 * Demande de connexion
 */
        if(isset($_GET['connexion'])){
            $this->ctrlAuthentification->connexion();
            $this->ctrlAuthentification->footer();
        }
/**
 * Demande de déconnexion
 */
        if(isset($_GET['deconnexion'])){
            session_destroy();
            $this->ctrlAuthentification->connexion();
            $this->ctrlAuthentification->footer();
        }
/**
 * Si la personne à rentré ses identifiants
 */
        elseif(isset($_POST['apresConnexion'])) {
/**
 * Vérification des logins 
 */         
            $login=$_POST['mail'];
            $_mail=$_POST['mail'];
            $_dao=new dao();
                if(empty($login)){
                    $this->ctrlAuthentification->connexion();
                echo '<div class="container"><div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Attention !</strong> Le format de l\'identifiant n\'est pas correct.
                    </div></div>'; 
                $this->ctrlAuthentification->footer();
                 }
               
               elseif ($_dao->getMdp($login)==crypt($_POST['mdp'], 'gestdep')) {
                    $_SESSION['login'] = $login;
                    $_SESSION['droit'] = $_dao->getDroit($login);
                    $_SESSION['societe']=$_dao->getEntrepriseParUtilisateur($login);
                    $_SESSION['mail']=$_mail;
                  
                    $this->_ctrlAccueil->vueAccueil($_SESSION['login'],$_SESSION['droit']);
                  
                }
                else
                {
                    $this->ctrlAuthentification->connexion();
                    echo '<div class="container"><div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
  		                    <strong>Attention !</strong> Le mot de passe ou l\'identifiant de vous avez saisie est incorrect.
                            </div></div>';
                    $this->ctrlAuthentification->footer();
                } 
        }
        /**
         * Si l'utilisateur est connecté
         */
        elseif(isset($_SESSION['login'])){
            $_dao=new dao();

/****************************************************************************************************************************************
                                                   Partie Trajet
****************************************************************************************************************************************/        
            if(isset($_GET['trajet'])){
                $this->recupIdClient();

                $_ctrlTrajet=new ControleurTrajet($_SESSION['login'],$_SESSION['droit']);
                
                 $_SESSION['entreprise']=$_dao->getParId($_SESSION['societe'], "entreprise");
                if($_GET['trajet']!=null&!isset($_GET['suppr'])){
                    $_ctrlTrajet->jour($_SESSION['login'], $_GET['trajet']);
                }
                else{
                    if(isset($_GET['suppr'])){
                        $id = $_dao->getIdByMail($_SESSION['login']);
                        $_dao->supprTrajet($_GET['trajet'], $id);
                    }
                    $_ctrlTrajet->tableau($_SESSION['login']);
                }
            }
/****************************************************************************************************************************************
                                                   Partie Voiture
****************************************************************************************************************************************/      
            elseif(isset($_GET['voiture'])){
               
                 if(isset($_POST['nouvelle'])){
                  $_dao->createVoiture($_POST['nom'],$_POST['puissance'],$_SESSION['societe']);
                 }
                if(isset($_GET['suppr'])){
                    $_dao->supprParId($_GET['voiture'], 'voiture');
                }
                $_ctrlVoiture=new ControleurVoiture($_SESSION['login'],$_SESSION['droit']);
                $_ctrlVoiture->tableau($_SESSION['mail']);
               
            }
/****************************************************************************************************************************************
                                                   Partie Client
****************************************************************************************************************************************/    
            elseif(isset($_GET['client'])){
                $_ctrlClient=new ControleurClient($_SESSION['login'],$_SESSION['droit']);
                $idEntreprise=$_dao->getEntrepriseParUtilisateur($_SESSION['login']);
                if(isset($_POST['submit'])){
                    if ($_FILES['import']['error'] > 0) $erreur = "Erreur lors du transfert<br/>";
                    else {
                        $extensions_valides = array( 'csv');
                        //1. strrchr renvoie l'extension avec le point (« . »).
                        //2. substr(chaine,1) ignore le premier caractère de chaine.
                        //3. strtolower met l'extension en minuscules.
                        $extension_upload = strtolower(  substr(  strrchr($_FILES['import']['name'], '.')  ,1)  );
                        if ( in_array($extension_upload,$extensions_valides) ){
                            if($_POST['format']=="o"){
                                $this->importClientsOutlook($_FILES['import']['tmp_name']);    
                            }
                            elseif($_POST['format']=="d"){
                                $this->importClientsDolibarr($_FILES['import']['tmp_name']);    
                            }
                          echo "Extension correcte<br/>";
                        }
                        else echo "Erreur extension<br/>";
                    }
                }
                $listeClient=$_dao->getListeClient($idEntreprise);
                $_ctrlClient->vueClient($listeClient);
            }        
/****************************************************************************************************************************************
                                                   Partie Recap
****************************************************************************************************************************************/    
            elseif(isset($_GET['recap'])){
                $_ctrlRecap=new ControleurRecap($_SESSION['login'],$_SESSION['droit']);
                $_ctrlRecap->vueRecap();
            }
/****************************************************************************************************************************************
                                                   Partie Utilisateur
****************************************************************************************************************************************/    
            elseif(isset($_GET['utilisateur'])){

                $idEntreprise=$_dao->getEntrepriseParUtilisateur($_SESSION['login']);
                if(isset($_POST['submit'])){
                    $_dao->createUtilisateur($_POST['nom'], $_POST['prenom'], $_POST['mail'], crypt($_POST['mdp'], 'gestdep'),  $_POST['droits'], $_POST['entre']);

                }
                $listeUtilisateurs=$_dao->getListeUtilisateurParEntreprise($idEntreprise);
                $_ctrlEmploye=new ControleurEmploye();
                $_ctrlEmploye->vueEmploye($_SESSION['login'],$_SESSION['droit'],$listeUtilisateurs);
            }  
/****************************************************************************************************************************************
                                                   Partie Entreprise
****************************************************************************************************************************************/  
            elseif(isset($_GET['entreprise'])){
                $_ctrlSociete=new ControleurSociete();
                $idEntreprise=$_dao->getEntrepriseParUtilisateur($_SESSION['login']);
                $entreprise=$_dao->getParId($idEntreprise, "entreprise");
                $responsable=$_dao->getParId($entreprise->getIdResp(),'utilisateur');
                $_ctrlSociete->vueSociete($_SESSION['login'],$_SESSION['droit'], $entreprise, $responsable);
            }  
/****************************************************************************************************************************************
                                                   Partie Compte
****************************************************************************************************************************************/  
            elseif(isset($_GET['compte'])){
                if(isset($_POST['envoyer'])){
                    if($_dao->getMdp($_SESSION['mail'])==crypt($_POST['old'], 'gestdep')){
                        $_dao->changementMdpUtilisateur($_dao->getIdByMail($_SESSION['mail']), $_POST['new']);
                    }
                }
                $_ctrlCompte=new ControleurCompte();
                $_ctrlCompte->vueCompte($_SESSION['login'],$_SESSION['droit']);
            }  
            elseif(isset($_GET['adminu'])){
                $_ctrlAdminUtil=new ControleurAdminUtil($_SESSION['login'],$_SESSION['droit']);
                $_ctrlAdminUtil->vueAdminUtil();
            } 
            elseif(isset($_GET['admine'])){
                $_ctrlAdminEntre=new ControleurAdminEntre($_SESSION['login'],$_SESSION['droit']);
                $_ctrlAdminEntre->vueAdminEntre();
            } 
            elseif(isset($_GET['grille'])){
                $_ctrlGrille=new ControleurGrille($_SESSION['login'],$_SESSION['droit']);
                $_ctrlGrille->vueGrille();
            }
            elseif(isset($_GET['config'])){
                $_ctrlConfig=new ControleurConfig($_SESSION['login'],$_SESSION['droit']);
                $_ctrlConfig->vueConfig();
            }
            else{
                $this->_ctrlAccueil->vueAccueil($_SESSION['login'],$_SESSION['droit']);
            }  


        }
        else {
            $this->ctrlAuthentification->connexion();
            $this->ctrlAuthentification->footer();
        }
    }

    public function importClientsOutlook($file)
    {
        $row = 1;
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $row++;
                if (isset($data[0], $data[2], $data[14], $data[17], $data[23])&$row>2)
                {
                    $nom = "";
                    $email = "";
                    $telephone = "";
                    $adresse= "";
                    $nom = $data[0]." ".$data[2];
                    //********e-mail***************
                    if($data[14]!=""){ $email = $data[14];}
                    elseif($data[15]!=""){ $email = $data[15];}
                    else{ $email = $data[16];}
                    //**********numéro de téléphone***********
                    //Business phone
                    if($data[38]!=""){$telephone = $data[38];}
                    //Business phone 2
                    elseif($data[39]!=""){$telephone = $data[39];}
                    //Primary phone
                    elseif($data[17]!=""){$telephone = $data[17];}
                    //Mobile phone
                    elseif($data[20]!=""){$telephone = $data[20];}
                    //home phone
                    elseif($data[18]!=""){$telephone = $data[18];}
                    //home phone 2
                    else{$telephone = $data[19];}
                    //************adresse physique*****************
                    //business address
                    if($data[49]!=""){$adresse = $data[49];}
                    //business street + street2 +street3, PO box, city, postal code, country
                    elseif($data[50]!=""){
                        $adresse = $data[50];
                        if($data[51]!=""){$adresse = $adresse." ".$data[51];}
                        if($data[52]!=""){$adresse = $adresse." ".$data[52];}
                        if($data[53]!=""){$adresse = $adresse.", ".$data[53];}
                        if($data[54]!=""){$adresse = $adresse.", ".$data[54];}
                        if($data[55]!=""){$adresse = $adresse.", ".$data[55];}
                        if($data[56]!=""){$adresse = $adresse.", ".$data[56];}
                        if($data[57]!=""){$adresse = $adresse.", ".$data[57];}
                        if($data[58]!=""){$adresse = $adresse.", ".$data[58];}
                        if($data[59]!=""){$adresse = $adresse.", ".$data[59];}

                    }
                    //other adress
                    elseif($data[60]!=""){$adresse = $data[60];}
                    //other street + street2 +street3, PO box, city, postal code, country
                    elseif($data[61]!=""){
                        $adresse = $data[61];
                        if($data[62]!=""){$adresse = $adresse." ".$data[62];}
                        if($data[63]!=""){$adresse = $adresse." ".$data[63];}
                        if($data[64]!=""){$adresse = $adresse.", ".$data[64];}
                        if($data[65]!=""){$adresse = $adresse.", ".$data[65];}
                        if($data[66]!=""){$adresse = $adresse.", ".$data[66];}
                        if($data[67]!=""){$adresse = $adresse.", ".$data[67];}
                        if($data[68]!=""){$adresse = $adresse.", ".$data[68];}
                        if($data[69]!=""){$adresse = $adresse.", ".$data[69];}
                        if($data[70]!=""){$adresse = $adresse.", ".$data[70];}

                    }

                    //home street + street2 +street3, PO box, city, postal code, country
                    elseif($data[24]!=""){
                        $adresse = $data[24];
                        if($data[25]!=""){$adresse = $adresse." ".$data[25];}
                        if($data[26]!=""){$adresse = $adresse." ".$data[26];}
                        if($data[27]!=""){$adresse = $adresse.", ".$data[27];}
                        if($data[28]!=""){$adresse = $adresse.", ".$data[28];}
                        if($data[29]!=""){$adresse = $adresse.", ".$data[29];}
                        if($data[30]!=""){$adresse = $adresse.", ".$data[30];}
                        if($data[31]!=""){$adresse = $adresse.", ".$data[31];}
                        if($data[32]!=""){$adresse = $adresse.", ".$data[32];}
                        if($data[33]!=""){$adresse = $adresse.", ".$data[33];}

                    }
                    //home adress
                    else{$adresse = $data[23];}
                    if ($adresse != ""){
                        $check = 1;
                    }
                    else{$check = 0;}
                    $_dao=new dao();     

                    $_dao->createClient(utf8_encode($nom), utf8_encode($email), utf8_encode($telephone), utf8_encode($adresse), $_SESSION['societe'], $check);
               } 
            }
        fclose($handle);
        }
    }
     public function importClientsDolibarr($file)
    {
        $row = 1;
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $row++;
                if (isset($data[0])&$row>2)
                {
                    $nom = $data[0];
                    $email = $data[5];
                    $telephone = $data[4];
                    $adresse= $data[1].", ".$data[2].", ".$data[3];
                   
                    if ($adresse != ""){
                        $check = 1;
                    }
                    else{$check = 0;}
                    $_dao=new dao();     

                    $_dao->createClient(utf8_encode($nom), utf8_encode($email), utf8_encode($telephone), utf8_encode($adresse), $_SESSION['societe'], $check);
               } 
            }
        fclose($handle);
        }
    }
    public function suppr_accents($str, $encoding='utf-8')
    {
        // transformer les caractères accentués en entités HTML
        $str = htmlentities($str, ENT_NOQUOTES, $encoding);
     
        // remplacer les entités HTML pour avoir juste le premier caractères non accentués
        // Exemple : "&ecute;" => "e", "&Ecute;" => "E", "Ã " => "a" ...
        $str = preg_replace('#&([A-za-z])(?:acute|grave|cedil|circ|orn|ring|slash|th|tilde|uml);#', '\1', $str);
     
        // Remplacer les ligatures tel que : Œ, Æ ...
        // Exemple "Å“" => "oe"
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str);
        // Supprimer tout le reste
        $str = preg_replace('#&[^;]+;#', '', $str);
     
        return $str;
    }
    public function calcDistance($a,$b) {
        $a1=$this->suppr_accents($a);
        $adresse1=str_replace(" ", "+", $a1);
        $a2=$this->suppr_accents($b);
        $adresse2=str_replace(" ", "+", $a2);
        $url='https://maps.googleapis.com/maps/api/distancematrix/xml?origins='.$adresse1.'&destinations='.$adresse2.'&language=fr-FR';
        $xml=file_get_contents($url);
        $root = simplexml_load_string($xml);
        $distance=$root->row->element->distance->text;    
        return $distance;
    }

    public function recupIdClient() {   
     $_dao=new dao();      
     $id = $_dao->getIdByMail($_SESSION['mail']);
      if(isset($_POST['submit'])){
       // echo '<br><br><br><br>';
        $date = explode(" ", $_POST["date"]);
        $dateDB = explode("/", $date[0]);
        $dateDB2 = $dateDB[2]."-".$dateDB[1]."-".$dateDB[0];
        $total = 0;
        $nbClient = 0;
        if($_POST['id1']!=""){
          $dist1 = $this->calcDistance($_POST['d'],$addr[1]=$_dao->getParId($_POST['id1'], "client")->getAdresse());
          $total = $total + $dist1;
          $nbClient++;
          $_dao->createTrajet($id,$_POST['id1'], $nbClient, $_POST['selectVoiture'], $dateDB2, $dist1);
        //  echo "distance ".$_POST['d']." - ".$addr[1]." = ".$dist1."</br>";
        }
        if($_POST['id2']!=""){
          $dist2 = $this->calcDistance($addr[1],$addr[2]=$_dao->getParId($_POST['id2'], "client")->getAdresse());
          $total = $total + $dist2;
          $nbClient++;
          $_dao->createTrajet($id,$_POST['id2'], $nbClient, $_POST['selectVoiture'], $dateDB2, $dist2);
        //  echo "distance ".$addr[1]." - ".$addr[2]." = ".$dist2."</br>";
        }
        if($_POST['id3']!=""){
          $dist3 = $this->calcDistance($addr[2],$addr[3]=$_dao->getParId($_POST['id3'], "client")->getAdresse());
          $total = $total + $dist3;
          $nbClient++;
         $_dao->createTrajet($id,$_POST['id3'], $nbClient, $_POST['selectVoiture'], $dateDB2, $dist3);
         // echo "distance ".$addr[2]." - ".$addr[3]." = ".$dist3."</br>";
        }
        if($_POST['id4']!=""){
           $dist4 = $this->calcDistance($addr[3],$addr[4]=$_dao->getParId($_POST['id4'], "client")->getAdresse());
           $total = $total + $dist4;
           $nbClient++;
         $_dao->createTrajet($id,$_POST['id4'], $nbClient, $_POST['selectVoiture'], $dateDB2, $dist4);
         // echo "distance ".$addr[3]." - ".$addr[4]." = ".$dist4."</br>";
        }
        if($_POST['id5']!=""){
          $dist5 = $this->calcDistance($addr[4],$addr[5]=$_dao->getParId($_POST['id5'], "client")->getAdresse());
          $total = $total + $dist5;
          $nbClient++;
          $_dao->createTrajet($id,$_POST['id5'], $nbClient, $_POST['selectVoiture'], $dateDB2, $dist5);
           // echo "distance ".$addr[4]." - ".$addr[5]." = ".$dist5."</br>";
        }
        if(isset($_POST['checkboxes'])){
          $dist6 = $this->calcDistance($addr[$nbClient],$_POST['d']);
          $total = $total + $dist6;
          $nbClient++;
          $_dao->createTrajet($id,null, $nbClient, $_POST['selectVoiture'], $dateDB2, $dist6);
        }
          $_dao->createTrajet($id,null, 0, null, $dateDB2, $total);

       // echo $total;
      }
    }
}

?>