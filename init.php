<?php
if(!isset($_POST['envoyer'])){
    echo "<h3>Pour initialiser la nouvelle base de donnees, veuillez saisir les informations suivantes : </h3>
        <form method='post' action='init.php'>
        <label>Serveur de la BDD : </label> <input name='url' type='text'><br>
        <label>Identifiant de connexion : </label> <input name='id' type='text'><br>
        <label>Mot de passe : </label> <input name='mdp' type='password'><br><br>
        <label>Nom de la BDD (si vous en avez déjà une, sinon, laissez vide) : </label> <input name='nom' type='text'><br>
        <input type='submit' name='envoyer' value='envoyer'>
        </form>";
}
else{
    if($_POST['nom']!=''){
        init($_POST['url'], $_POST['nom'], $_POST['id'], $_POST['mdp']);
    }
    createBD($_POST['url'], $_POST['id'], $_POST['mdp']);
    init($_POST['url'],'taux_discount',  $_POST['id'], $_POST['mdp']);   
}
function createBD($url, $id, $mdp){
    $link = mysql_connect($url, $id, $mdp);
    if (!$link) {
        die('Connexion impossible : ' . mysql_error());
    }
    
    $sql = 'CREATE DATABASE taux_discount';
    if (mysql_query($sql, $link)) {
        echo "Base de données créée correctement\n";
    } else {
        echo 'Erreur lors de la création de la base de données : ' . mysql_error() . "\n";
    }
}

function init($url, $nom, $id, $mdp){
$co = new PDO('mysql:host='.$url.';dbname='.$nom,$id,$mdp);
$co-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$co->exec("SET CHARACTER SET utf8");

    $query = file_get_contents("init.sql");
    $array = explode(";\n", $query);
    $b = true;
    for ($i=0; $i < count($array) ; $i++) {
        $str = $array[$i];
        if ($str != '') {
            $str .= ';';
            try {
            $b &= $co->exec($str);
            }
            catch(PDOException $e){
            }
        }
    }
    $ecrire = fopen('Modele/variables.php',"w");
    ftruncate($ecrire,0);
    fclose($ecrire);
    $valeur='<?php $co="mysql:host='.$url.';dbname='.$nom.'";$id="'.$id.'";$mdp="'.$mdp.'";';
    $monfichier = fopen('Modele/variables.php', 'r+');
    fseek($monfichier, 0);
    fputs($monfichier, $valeur); // On écrit le nouveau nombre de pages vues
    
    fclose($monfichier);
    header('Location: index.php');  

}

?>
