<?php
require_once("ConnexionException.php");
require_once "societe.php";
require_once "trajet.php";
require_once "client.php";
require_once "utilisateur.php";
require_once "voiture.php";
/**
 * Class Dao
 */

/**
 * Liens entre la base de données et le php
 * @author baptiste
 * @package modele
 */
class dao{
    /**
     * variable de connexion
     * @var PDO
     */
    private $_connexion;
    /**
     * Constructeur vide
     */
    function __construct(){
    }

// méthode qui permet de se connecter à la base
// une exception ConnectionException est levée s'il y a un problème de connexion à la base
/**
 * méthode qui permet de se connecter à la base
 * @throws ConnexionException
 */
    public function connexion(){

        try {
            include "variables.php";
            $this->_connexion = new PDO($co, $id, $mdp);
            $this->_connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_connexion->exec("SET CHARACTER SET utf8");
            return true;
        }
        catch(PDOException $e){
            return false;
        }
    }

//
/**
 * méthode qui permet de se déconnecter de la base
 */
    public function deconnexion(){

        $this->_connexion = null;

    }
//-------------------------------------------------------------------------------------------------------------------------------------------------
// Les Listes
//-------------------------------------------------------------------------------------------------------------------------------------------------
    // méthode qui permet de récupérer la liste de tous les dossiers de la base (avec toutes les infos disponibles)
    // il faut d'abord ouvrir une connexion à la base
    // ensuite soumettre la requête adéquate à la base
    // fermer la connexion à la base
    // renvoyer le résultat obtenu
    // une exception de type ConnexionException est levée s'il y a un problème lors de la connexion à la base
    // une exception de type AccesTableException est levée s'il y a un problème lors de la soumission de la requête
    // postcondition:si aucune exception n'est levée, un tableau d'objet de type dossier est retourné


// Récupère une liste contenant tous les employe par agence
// Prend en paramètre l'id de l'agence
// Retourne une liste avec tous les employés de l'agence
/**
 * Récupère une liste contenant tous les employe par agence
 * @param integer $idsociete
 * @throws ConnexionException
 * @throws TableAccesException
 * @return multitype:utilisateur[]
 */
public function getListeUtilisateurParEntreprise($idEntreprise){
    try {
        $this->connexion();
    }
    catch(PDOException $e) {
        throw new ConnexionException($e->getMessage());
    }

    try {
        $req=$this->_connexion->prepare('SELECT * FROM utilisateur WHERE entreprise=? ORDER BY nom ASC');
        $req->execute(array($idEntreprise));
    }
    catch(PDOException $e) {
        throw new TableAccesException($e->getMessage());
    }
    $listeUtilisateur= array();
    while ($donnees = $req->fetch())
    {
        $utilisateur=new utilisateur($donnees['id'], $donnees['nom'], $donnees['prenom'], $donnees['mail'], $donnees['entreprise'], $donnees['droits']);
        array_push($listeUtilisateur, $utilisateur);
    }
    $req->closeCursor();
    $this->deconnexion();
    return $listeUtilisateur;
}
//Récupère tous les utilisateur sauf s'ils sont de type admin
// Ne prend pas de paramètre
// Retourne une liste d'objet de type utilisateur
/**
 * Récupère tous les utilisateur sauf s'ils sont de type admin
 * @throws ConnexionException
 * @throws TableAccesException
 * @return multitype:utilisateur[]
 */
    public function getListeUtilisateurParDroit($droit){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }

        try {
            if($droit==""){
                $req = $this->_connexion->query('SELECT * FROM utilisateur');
            }
            else{
                $req=$this->_connexion->prepare('SELECT * FROM utilisateur WHERE droits=? ORDER BY nom ASC');
                $req->execute(array($droit));
            }
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $listeUtilisateur= array();
        while ($donnees = $req->fetch())
        {
            $utilisateur=new utilisateur($donnees['id'], $donnees['nom'], $donnees['prenom'], $donnees['mail'], $donnees['entreprise'], $donnees['droits']);
            array_push($listeUtilisateur, $utilisateur);
        }
        $req->closeCursor();
        $this->deconnexion();
        return $listeUtilisateur;
    }

/**
 * récupère la liste des voitures d'une agence
 * @param int $idEntreprise
 * @throws ConnexionException
 * @throws TableAccesException
 * @return agence
 */
    public function getListeVoiture($idEntreprise){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }

        try {
            $req=$this->_connexion->prepare('SELECT * FROM Voiture WHERE entreprise = ?');
            $req->execute(array($idEntreprise));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
       $listeVoiture= array();
        while ($donnees = $req->fetch())
        {
            $voiture=new voiture($donnees['id'], $donnees['nom'], $donnees['puissance'], $donnees['entreprise']);
            array_push($listeVoiture, $voiture);
        }
        $req->closeCursor();
        $this->deconnexion();
        return $listeVoiture;
    }
/**
 * récupère la liste des entreprises
 * @throws ConnexionException
 * @throws TableAccesException
 * @return array[entreprise]
 */
    public function getListeEntreprise(){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }

        try {
            $req=$this->_connexion->prepare('SELECT * FROM entreprise');
            $req->execute();
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
       $ListeEntreprise= array();
        while ($donnees = $req->fetch())
        {
            $entreprise=new societe($donnees['id'], $donnees['nom'], $donnees['adresse'], $donnees['codePostal'], $donnees['ville'], $donnees['debutExercice'], $donnees['responsable']);
            array_push($ListeEntreprise, $entreprise);
        }
        $req->closeCursor();
        $this->deconnexion();
        return $ListeEntreprise;
    }
/**
 * récupère la grille des indemnités kilométrique
 * @throws ConnexionException
 * @throws TableAccesException
 * @return array[entreprise]
 */
    public function getGrille(){
        $today = getdate();
        $year = $today['year'];
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }

        try {
            $req=$this->_connexion->prepare('SELECT * FROM grille WHERE annee = ?');
            $req->execute(array($year));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
       $grille= array();
        while ($donnees = $req->fetch())
        {
            $ligne = array($donnees['id'], $donnees['puissance'], $donnees['5'], $donnees['5-20'], $donnees['20']);
            array_push($grille, $ligne);
        }
        $req->closeCursor();
        $this->deconnexion();
        return $grille;
    }
/**
 * récupère la liste des clients pour une entreprise
 * @param int $idEntreprise
 * @throws ConnexionException
 * @throws TableAccesException
 * @return agence
 */
    public function getListeClient($idEntreprise){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }

        try {
            $req=$this->_connexion->prepare('SELECT * FROM Client WHERE entreprise = ?');
            $req->execute(array($idEntreprise));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
       $listeClient= array();
        while ($donnees = $req->fetch())
        {
            $client=new client($donnees['id'], $donnees['nom'], $donnees['email'], $donnees['telephone'], $donnees['adresse'], $donnees['val']);
            array_push($listeClient, $client);
        }
        $req->closeCursor();
        $this->deconnexion();
        return $listeClient;
    }
/**
 * récupère la liste des clients valide pour une entreprise
 * @param int $idEntreprise
 * @throws ConnexionException
 * @throws TableAccesException
 * @return agence
 */
    public function getListeClientVal($idEntreprise){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }

        try {
            $req=$this->_connexion->prepare('SELECT * FROM client WHERE entreprise = ? AND val = 1');
            $req->execute(array($idEntreprise));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
       $listeClient= array();
        while ($donnees = $req->fetch())
        {
            $client=new client($donnees['id'], $donnees['nom'], $donnees['email'], $donnees['telephone'], $donnees['adresse'], $donnees['val']);
            array_push($listeClient, $client);
        }
        $req->closeCursor();
        $this->deconnexion();
        return $listeClient;
    }

/**
 * Récupère le mot de passe (crypté) d'un utilisateur
 * @param string $mail
 * @throws ConnexionException
 * @throws TableAccesException
 * @return string $mdp
 */
    public function getMdp($mail){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }

        try {
            $req=$this->_connexion->prepare('SELECT * FROM utilisateur WHERE mail = ?');
            $req->execute(array($mail));

        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $donnees=$req->fetch();
        $mdp=$donnees['mdp'];
        $req->closeCursor();
        $this->deconnexion();
        return $mdp;
    }

/**
 * Récupère le mot de passe (crypté) d'un utilisateur
 * @param string $nom
 * @param string $prenom
 * @throws ConnexionException
 * @throws TableAccesException
 * @return string $mdp
 */
    public function getDroit($mail){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }

        try {
            $req=$this->_connexion->prepare('SELECT * FROM utilisateur WHERE mail = ?');
            $req->execute(array($mail));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $donnees=$req->fetch();
        $mdp=$donnees['droits'];
        $req->closeCursor();
        $this->deconnexion();
        return $mdp;
    }

/**
 * Récupère un objet par id
 * @param int $id
 * @param string $type
 * @throws ConnexionException
 * @throws TableAccesException
 * @return object
 */
    public function getParId($id, $type){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }

        try {
            $req=$this->_connexion->prepare('SELECT * FROM '.$type.' WHERE id = ?');
            $req->execute(array($id));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $donnees=$req->fetch();
        if($type=="utilisateur"){
            $object= new utilisateur($donnees['id'], $donnees['nom'], $donnees['prenom'], $donnees['mail'], $donnees['entreprise'], $donnees['droits']);
        }
        elseif($type=="client"){
            $object = new client($donnees['id'], $donnees['nom'], $donnees['email'], $donnees['telephone'], $donnees['adresse'], $donnees['val']);
        }
        elseif($type=="voiture"){
            $object = new voiture($donnees['id'], $donnees['nom'], $donnees['puissance'], $donnees['entreprise']);
        }
        elseif($type=="entreprise"){
            $object = new societe($donnees['id'], $donnees['nom'], $donnees['adresse'], $donnees['codePostal'], $donnees['ville'], $donnees['debutExercice'], $donnees['responsable']);
        }
        $req->closeCursor();
        $this->deconnexion();
        return $object;
    }

/**
 * Récupère un objet par id
 * @param int $id
 * @param string $type
 * @throws ConnexionException
 * @throws TableAccesException
 * @return object
 */
    public function getIdObjet($nom, $type){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }

        try {
            $req=$this->_connexion->prepare('SELECT * FROM '.$type.' WHERE nom = ?');
            $req->execute(array($nom));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $donnees=$req->fetch();
        $id=$donnees['id'];
        $req->closeCursor();
        $this->deconnexion();
        return $id;
    }

/**
 * récupère l'agence d'un utilisateur grâce à son nom et son prénom
 * @param string $nom
 * @param string $prenom
 * @throws ConnexionException
 * @throws TableAccesException
 * @return agence
 */
    public function getEntrepriseParUtilisateur($mail){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }

        try {
            $req=$this->_connexion->prepare('SELECT * FROM utilisateur WHERE mail = ?');
            $req->execute(array($mail));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $donnees=$req->fetch();
        $agence=$donnees['entreprise'];
        $req->closeCursor();
        $this->deconnexion();
        return $agence;
    }

/**
 * récupère l'id d'un utilisateur grâce à son mail
 * @param string $mail
 * @throws ConnexionException
 * @throws TableAccesException
 * @return int id
 */
    public function getIdByMail($mail){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }

        try {
            $req=$this->_connexion->prepare('SELECT * FROM utilisateur WHERE mail = ?');
            $req->execute(array($mail));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $donnees=$req->fetch();
        $id=$donnees['id'];
        $req->closeCursor();
        $this->deconnexion();
        return $id;
    }

    public function getTrajet($utilisateur){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }

        try {
            $req=$this->_connexion->prepare('SELECT * FROM trajet WHERE ordre = 0 AND utilisateur = ?');
            $req->execute(array($utilisateur));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $listeTrajet= array();
        while ($donnees = $req->fetch())
        {
            $trajet=new trajet($donnees['utilisateur'], $donnees['client'], $donnees['voiture'], $donnees['date'], $donnees['km']);
            array_push($listeTrajet, $trajet);
        }
        $req->closeCursor();
        $this->deconnexion();
        return $listeTrajet;
    }

    public function getTrajetParDate($utilisateur, $date){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }

        try {
            $req=$this->_connexion->prepare('SELECT * FROM trajet WHERE date = ? AND utilisateur = ?');
            $req->execute(array($date, $utilisateur));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $listeTrajet= array();
        while ($donnees = $req->fetch())
        {
            $trajet=new trajet($donnees['utilisateur'], $donnees['client'], $donnees['voiture'], $donnees['date'], $donnees['km']);
            array_push($listeTrajet, $trajet);
        }
        $req->closeCursor();
        $this->deconnexion();
        return $listeTrajet;
    }

//-------------------------------------------------------------------------------------------------------------------------------------------------
    // LES CREATE !!!!!!!!!!!!!
//-------------------------------------------------------------------------------------------------------------------------------------------------
//
/**
 * Créer un nouveau dossier
 * @param integer $idAgence
 * @param integer $idUtilisateur
 * @param string $nom
 * @param string $prenom
 * @param integer $part
 * @param string $apporteur
 * @param string $commentaire
 * @param DateTime $relance
 * @param DateTime $PriseContact
 * @throws ConnexionException
 * @throws TableAccesException
 */
    public function createUtilisateur($nom, $prenom, $mail, $mdp, $droits, $entreprise){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }
        try {
            $req=$this->_connexion->prepare('INSERT INTO utilisateur VALUES (null, ?, ?, ?, ?, ?, ?)');
            $req->execute(array($nom, $prenom, $mail, $mdp, $droits, $entreprise));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
    }
    //
/**
 * Créer une nouveau client
 * @param string $nom
 * @param string $email
 * @param string $telephone
 * @param string $adresse
 * @param integer $identreprise
 * @throws ConnexionException
 * @throws TableAccesException
 */
    public function createClient($nom, $email, $telephone, $adresse, $entreprise, $val){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }
        try {
            $req=$this->_connexion->prepare('INSERT INTO client VALUES (null, ?, ?, ?, ?, ?, ?)');
            $req->execute(array($nom, $email, $telephone, $adresse, $entreprise, $val));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
    }
/**
 * Créer un nouvelle voiture
 * @param string $nom
 * @param integer $puissance
 * @param integer $idEntreprise
 * @throws ConnexionException
 * @throws TableAccesException
 */
    public function createVoiture($nom, $puissance, $entreprise){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }
        try {
            $req=$this->_connexion->prepare('INSERT INTO voiture VALUES (null, ?, ?, ?)');
            $req->execute(array($nom, $puissance, $entreprise));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
    }
//
/**
 * Créer une nouvelle entreprise
 * @param string $nom
 * @throws ConnexionException
 * @throws TableAccesException
 */
public function createTrajet($utilisateur, $client, $ordre, $voiture, $date, $km){
    try {
        $this->connexion();
    }
    catch(PDOException $e) {
        throw new ConnexionException($e->getMessage());
    }
    try {
        $req=$this->_connexion->prepare("INSERT INTO trajet VALUES (NULL, ?, ?, ?, ?, ?, ?)");
        $req->execute(array($utilisateur, $client, $ordre, $voiture, $date, $km));
    }
    catch(PDOException $e) {
        throw new TableAccesException($e->getMessage());
    }
}
//-------------------------------------------------------------------------------------------------------------------------------------------------
// LES UPDATE
//-------------------------------------------------------------------------------------------------------------------------------------------------
//
/**
 * Change l'état d'un dossier
 * @param integer $idEtat
 * @param integer $idDossier
 * @param string $commentaire
 * @param DateTime[] $listeDate
 * @param DateTime $relance
 * @param integer $part
 * @throws ConnexionException
 * @throws TableAccesException
 */
    public function changementEtat($idEtat, $idDossier, $commentaire, $listeDate, $relance, $part){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }
        try {
            $req=$this->_connexion->prepare('UPDATE dossier SET id_etat=?, part=? WHERE id = ?');
            $req->execute(array($idEtat, $part, $idDossier));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        if($idEtat!=11){
        $this->createCommentaire($idEtat, $idDossier, $commentaire);
        $this->changementDate($idDossier, $relance, 'relance');
        }
        if($idEtat==2){
            $this->changementDate($idDossier, $listeDate, 'reception_du_dossier');
        }
        elseif($idEtat==3){
            $this->changementDate($idDossier, $listeDate, 'rendez_vous');
        }
        elseif($idEtat==4){
            $this->changementDate($idDossier, $listeDate, 'transmission');
        }
        elseif($idEtat==5){
            $this->changementDate($idDossier, (string)$listeDate[0], 'accord_mandat');
            $this->changementDate($idDossier, (string)$listeDate[1], 'envoi_mandat');
        }
        elseif($idEtat==6){
            $this->changementDate($idDossier, $listeDate, 'reception_mandat');
        }
        elseif($idEtat==7){
            $this->changementDate($idDossier, $listeDate, 'envoi_ddp');
        }
        elseif($idEtat==8){
            $this->changementDate($idDossier, $listeDate, 'reception_proposition');
        }
        elseif($idEtat==9){
            $this->changementDate($idDossier, $listeDate, 'rendez_vous_banque');
        }
        elseif($idEtat==10){
            $this->changementDate($idDossier, $listeDate, 'signature');
        }
    }

/**
 * Reviens à l'état précédent d'un dossier
 * @param integer $idEtat
 * @param integer $idDossier
 * @throws ConnexionException
 * @throws TableAccesException
 */
    public function etatPrecedent($idEtat, $idDossier){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }
        try {
            $req=$this->_connexion->prepare('UPDATE dossier SET id_etat=? WHERE id = ?');
            $req->execute(array($idEtat, $idDossier));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $idAncienEtat=$idEtat+1;
        $this->deleteCommentaire($idDossier, $idAncienEtat);
        if($idAncienEtat==2){
            $this->changementDate($idDossier, NULL, 'reception_du_dossier');
        }
        elseif($idAncienEtat==3){
            $this->changementDate($idDossier, NULL, 'rendez_vous');
        }
        elseif($idAncienEtat==4){
            $this->changementDate($idDossier, NULL, 'transmission');
        }
        elseif($idAncienEtat==5){
            $this->changementDate($idDossier, NULL, 'accord_mandat');
            $this->changementDate($idDossier, NULL, 'envoi_mandat');
        }
        elseif($idAncienEtat==6){
            $this->changementDate($idDossier, NULL, 'reception_mandat');
        }
        elseif($idAncienEtat==7){
            $this->changementDate($idDossier, NULL, 'envoi_ddp');
        }
        elseif($idAncienEtat==8){
            $this->changementDate($idDossier, NULL, 'reception_proposition');
        }
        elseif($idAncienEtat==9){
            $this->changementDate($idDossier, NULL, 'rendez_vous_banque');
        }
        elseif($idAncienEtat==10){
            $this->changementDate($idDossier, NULL, 'signature');
        }

    }

/**
 * Mise à jour d'une date
 * @param integer $idDossier
 * @param DateTime $valeur
 * @param string $date
 * @throws ConnexionException
 * @throws TableAccesException
 */
    public function changementDate($idDossier, $valeur, $date){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }
        try {
            $req=$this->_connexion->prepare("UPDATE dates SET $date = ? WHERE id_dossier =?");
            $req->execute(array($valeur, $idDossier));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $this->deconnexion();
    }

/**
 * Mise à jour de l'année
 * @throws ConnexionException
 * @throws TableAccesException
 */
public function changementAnnee(){
    $nouvelleAnnee = $this->getAnnee()+1;
    try {
        $this->connexion();
    }
    catch(PDOException $e) {
        throw new ConnexionException($e->getMessage());
    }
    try {
        $req=$this->_connexion->prepare("UPDATE annee SET annee = ?");
        $req->execute(array($nouvelleAnnee));
    }
    catch(PDOException $e) {
        throw new TableAccesException($e->getMessage());
    }
    $this->deconnexion();
}
//
/**
 * Mise à jour nom agence
 * @param string $ancienNom
 * @param string $nouveauNom
 * @throws ConnexionException
 * @throws TableAccesException
 */
public function changementNomAgence($ancienNom, $nouveauNom){
    try {
        $this->connexion();
    }
    catch(PDOException $e) {
        throw new ConnexionException($e->getMessage());
    }
    try {
        $req=$this->_connexion->prepare("UPDATE agence SET nom = ? WHERE nom=?");
        $req->execute(array($nouveauNom, $ancienNom));
    }
    catch(PDOException $e) {
        throw new TableAccesException($e->getMessage());
    }
    $this->deconnexion();
}
//
/**
 * Mise à jour de la date de relance
 * @param integer $idDossier
 * @param DateTime $valeur
 * @param string $com
 * @throws ConnexionException
 * @throws TableAccesException
 */
public function changementRelance($idDossier, $valeur, $com){
    $place = intval($this->getEtatDossier($idDossier));
    try {
        $this->connexion();
    }
    catch(PDOException $e) {
        throw new ConnexionException($e->getMessage());
    }
    try {
        $req=$this->_connexion->prepare("UPDATE dates SET relance = ? WHERE id_dossier =?");
        $req->execute(array($valeur, $idDossier));
        if($com!=""){
            $req2=$this->_connexion->prepare("UPDATE commentaire SET texte = ? WHERE id_dossier = ? AND place = ?");
            $req2->execute(array($com, $idDossier, $place));
        }
    }
    catch(PDOException $e) {
        throw new TableAccesException($e->getMessage());
    }
    $this->deconnexion();
}
/**
 * Méthode qui permet de changer l'agence de l'utilisateur
 * @param integer $id
 * @param integer $idAgence
 * @throws ConnexionException
 * @throws TableAccesException
 */
    public function changementAgenceUtilisateur($id, $idAgence){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }
        try {
            $req=$this->_connexion->prepare("UPDATE utilisateur SET id_agence = ? WHERE id =?");
            $req->execute(array($idAgence, $id));

        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $this->deconnexion();
    }
/**
 * Méthode qui permet changer le nom d'un utilisateur
 * @param integer $id
 * @param string $nouveauNom
 * @throws ConnexionException
 * @throws TableAccesException
 */
    public function changementNomUtilisateur($id, $nouveauNom){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }
        try {
            $req=$this->_connexion->prepare("UPDATE utilisateur SET nom = ? WHERE id =?");
            $req->execute(array($nouveauNom, $id));
            //$this->_connexion->commit();
             }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $this->deconnexion();
    }
/**
 * Changer le prenom d'un utilisateur
 * @param integer $id
 * @param string $nouveauPrenom
 * @throws ConnexionException
 * @throws TableAccesException
 */
    public function changementPrenomUtilisateur($id, $nouveauPrenom){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }
        try {
            $req=$this->_connexion->prepare("UPDATE utilisateur SET prenom = ? WHERE id =?");
            $req->execute(array($nouveauPrenom, $id));
           //$this->_connexion->commit();
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $this->deconnexion();
    }
/**
 * Changer le mot de passe d'un utilisateur
 * @param integer $id
 * @param string $nouveauMdp
 * @throws ConnexionException
 * @throws TableAccesException
 */
    public function changementMdpUtilisateur($id, $nouveauMdp){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }
        $mdp=crypt($nouveauMdp, 'gestdep');
        try {
            $req=$this->_connexion->prepare("UPDATE utilisateur SET mdp = ? WHERE id =?");
            $req->execute(array($mdp, $id));
            //$this->_connexion->commit();
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
        $this->deconnexion();
    }
//------------------------------------------------------------------------------------------------------------------------------------------------
// LES DELETE
//------------------------------------------------------------------------------------------------------------------------------------------------
//
/**
 * Supprime un commentaire
 * @param integer $idDossier
 * @param integer $place
 * @throws ConnexionException
 * @throws TableAccesException
 */
    public function deleteCommentaire($idDossier, $place){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }
        try {
            $req=$this->_connexion->prepare('DELETE FROM commentaire WHERE id_dossier= ? AND place=?');
            $req->execute(array($idDossier, $place));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
    }
//
/**
 * Supprime un dossier
 * @param integer $idDossier
 * @throws ConnexionException
 * @throws TableAccesException
 */
    public function deleteDossier($idDossier){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }
        try {
            $req=$this->_connexion->prepare('DELETE FROM dossier WHERE id= ?');
            $req->execute(array($idDossier));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
    }
//
/**
 * Supprime un objet grâce à son id
 * @param int $id
 * @param string $type
 * @throws ConnexionException
 * @throws TableAccesException
 */
    public function supprParId($id, $type){
        try {
            $this->connexion();
        }
        catch(PDOException $e) {
            throw new ConnexionException($e->getMessage());
        }
        try {
            $req=$this->_connexion->prepare('DELETE FROM '.$type.' WHERE id= ?');
            $req->execute(array($id));
        }
        catch(PDOException $e) {
            throw new TableAccesException($e->getMessage());
        }
    }
//
/**
 * Supprime un trajet
 * @param dateDB $date
 * @param int $idUtilisateur
 * @throws ConnexionException
 * @throws TableAccesException
 */
public function supprTrajet($date, $idUtilisateur){
    try {
        $this->connexion();
    }
    catch(PDOException $e) {
        throw new ConnexionException($e->getMessage());
    }
    try {
        $req=$this->_connexion->prepare('DELETE FROM trajet WHERE date= ? AND utilisateur= ?');
        $req->execute(array($date, $idUtilisateur));
    }
    catch(PDOException $e) {
        throw new TableAccesException($e->getMessage());
    }
}
}
