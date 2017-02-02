<?php
require_once 'dao.php';
require_once '../Vue/util.php';
$dao=new dao();
$util=new util();
$util->header("test");

$listeVoiture = $dao->getListeVoiture(1);
foreach ($listeVoiture as $voiture) {
    echo $voiture->getNom().'<br/>';
    echo $voiture->getPuissance().'cv<br/>';
    echo $voiture->getSociete().'<br/>';
}
echo "Voici la liste des utilisateurs de l'application : "."<br/>";
$listeEmploye = $dao->getListeUtilisateurParDroit("Admin");
foreach ($listeEmploye as $employe) {
    echo $employe->getNom().'<br/>';
    echo $employe->getPrenom().'<br/>';
    echo $employe->getMail().'<br/>';
    echo $employe->getSociete().'<br/>';
}

/*echo "Voici la liste des trajet pour l'utilisateur 1 : "."<br/>";
$listeTrajet = $dao->getTrajet(1);
foreach ($listeTrajet as $trajet) {
	$utilisateur = $dao->getParId($trajet->getUtilisateur(), "utilisateur");
    echo $utilisateur->getNom()." ".$utilisateur->getPrenom().'<br/>';
    $client = $dao->getParId($trajet->getClient(), "client");
    echo $client->getNom().'<br/>';
	$voiture = $dao->getParId($trajet->getVoiture(), "voiture");
    echo $voiture->getNom().'<br/>';
    echo $trajet->getDate().'<br/>';
    echo $trajet->getKm().'<br/>';
}

$utilisateur = $dao->getParId(1, "utilisateur");
echo "le mail de l'utilisateur 1 : ".$utilisateur->getMail()."<br/>";
$client = $dao->getParId(1, "client");
echo "le nom du client 1 : ".$client->getNom()."<br/>";
$voiture = $dao->getParId(1, "voiture");
echo "le nom de la voiture 1 : ".$voiture->getNom()."<br/>";
$societe = $dao->getParId(1, "societe");
echo "le nom de la societe 1 : ".$societe->getNom()."<br/>";*/

echo "id de rouger : ".$dao->getIdObjet("rouger", "utilisateur")."<br/>";
echo "id de la société BAT : ".$dao->getIdObjet("BAT", "societe")."<br/>";
echo "id de la voiture Audi A5 : ".$dao->getIdObjet("Audi A5", "voiture")."<br/>";
echo "id du client Super U Candé : ".$dao->getIdObjet("Super U Candé", "client")."<br/>";
echo "id du mail rouger.baptiste@gmail.com : ".$dao->getIdByMail("rouger.baptiste@gmail.com")."<br/>";

$listeVoiture = $dao->getListeVoiture(1);
foreach ($listeVoiture as $voiture ) {
    echo 'Une voiture : '.$voiture->getNom().' '.$voiture->getPuissance().'<br/>';
}

echo crypt("100%Twilight", "gestdep");
?>



