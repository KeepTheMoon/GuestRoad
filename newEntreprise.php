<?php
if(!isset($_POST['envoyer'])){
    echo "<h3>Pour créer une nouvelle entreprise, veuillez saisir les informations suivantes : </h3>
        <form method='post' action='newEntreprise.php'>
        <label>Nom de l'entreprise : </label> <input name='entreprise' type='text'><br>
        <label>Nom du responsable : </label> <input name='nom' type='text'><br>
        <label>Prenom du responsable : </label> <input name='prenom' type='text'><br>
        <label>Email du responsable : </label> <input name='email' type='text'><br><br>
        <label>Téléphone du responsable : </label> <input name='tel' type='text'><br>
        <label>Adresse du siège : </label> <input name='adresse' type='text'><br>
        <label>Mot de passe : </label> <input name='mdp' type='password'><br>
        <input type='submit' name='envoyer' value='envoyer'>
        </form>";
}
else{


    createBD();
    init($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_POST['adresse'], $_POST['mdp']);   
}
function createBD(){
    $link = mysql_connect('localhost', 'root', '');
    if (!$link) {
        die('Connexion impossible : ' . mysql_error());
    }
    
    $sql = 'CREATE DATABASE '.$_POST['entreprise'];
    if (mysql_query($sql, $link)) {
        echo "Base de données créée correctement\n";
    } else {
        echo 'Erreur lors de la création de la base de données : ' . mysql_error() . "\n";
    }
}

function init($nom, $prenom, $email, $tel, $adresse, $mdp){
$co = new PDO('mysql:host=localhost;dbname='.$_POST['entreprise'], 'root', '');
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
    $valeur='<?php $co="mysql:host=localhost;dbname='.$_POST['entreprise'].'";$id="root";$mdp="";';
    $monfichier = fopen('Modele/variables.php', 'r+');
    fseek($monfichier, 0);
    fputs($monfichier, $valeur); // On écrit le nouveau nombre de pages vues
    
    fclose($monfichier);
    //header('Location: index.php');  

}

?>
