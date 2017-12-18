

<?php

	
$string = file_get_contents("DVMRENOV.gestdep_movements.json");



$tab =  explode ( PHP_EOL , $string );
foreach ($tab as $ligne) {
	$vir =  explode ( "," , $ligne );
	$result = array();
	foreach ($vir as $mot) {
		$m=explode (  ':', $mot);
		$suppr = array("{", "}", " ", "\"");
		$new = str_replace($suppr, "", $m);
		//echo "nom : ".$new[0]."; ";
		if(isset($new[2])){
			//echo "valeur : ".$new[2]."; ";
			array_push($result, $new[2]);
		}
		else{
			//echo "valeur : ".$new[1]."; ";
			array_push($result, $new[1]);
		}
		
		

		if($new[0]=="__v"){
			echo "<br>";
		}

}print_r($result);
}



?>