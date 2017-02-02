<?php
/**
 * Page d'accueil qui créer un routeur
 */
require_once 'controleur/routeur.php';
require_once 'Modele/dao.php';
$dao=new dao();
$routeur=new routeur();
//if($dao->connexion()&&$dao->getAnnee()){
    $routeur->routerRequete();
//}
//else{echo "<br><h1>La BDD est vide ou les paramètres de connexion sont incorrects, pour l'initialiser cliquez sur le bouton ci-dessous</h1> <a href='init.php'><button>Initialisation</button></a>";}

     ?>
    