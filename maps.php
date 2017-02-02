<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
</head>
<body>
<form method="post" action="#">
<input name='a' type='text' placeholder="adresse de départ"><br/>
<input name='b' type='text' placeholder="adresse d'arrivée"><br/>
<input type='submit' value="adresse de départ">
</form>
<?php 
if(isset($_POST['a'])){echo getDistance($_POST['a'],$_POST['b']);}
    function getDistance($a,$b) {
	$a1=suppr_accents($a);
	$adresse1=str_replace(" ", "+", $a1);
	$a2=suppr_accents($b);
	$adresse2=str_replace(" ", "+", $a2);
	
echo 'test';
	$url='https://maps.googleapis.com/maps/api/distancematrix/xml?origins='.$adresse1.'&destinations='.$adresse2.'&language=fr-FR';
    	$xml=file_get_contents($url);
    	$root = simplexml_load_string($xml);
    	$distance=$root->row->element->distance->text;
    	$duree=$root->row->element->duration->text; 
    	return 'distanceEnMetres = '.$distance.'<br/>dureeEnSecondes = '.$duree.'<br/>adresseDepart = '.$root->origin_address.'<br/>adresseArrivee = '.$root->destination_address;
    }
function dist($a, $b){
    $url='http://maps.google.com/maps/api/directions/xml?language=fr&origin='.$a.'&destination='.$b.'&sensor=false';
    	$xml=file_get_contents($url);
    	$root = simplexml_load_string($xml);
    	$distance=$root->route->leg->distance->value;
    	$duree=$root->route->leg->duration->value; 
    	$etapes=$root->route->leg->step;
    	echo 'distance -> ';
    	echo $distance.'<br/>';
    	echo 'durée'.$duree.'<br/>';
    	//echo 'étapes -> '$etapes.'<br/>';
}
    /**
     * Supprimer les accents
     * 
     * @param string $str chaîne de caractères avec caractères accentués
     * @param string $encoding encodage du texte (exemple : utf-8, ISO-8859-1 ...)
     */
    function suppr_accents($str, $encoding='utf-8')
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
    ?>
</body></html>
