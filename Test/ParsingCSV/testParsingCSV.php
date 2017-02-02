<?php



     $_connexion;

            include "../../Modele/variables.php";
            $_connexion = new PDO($co, $id, $mdp); 
            $_connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $_connexion->exec("SET CHARACTER SET utf8");





	
$prem=0;
if (($handle = fopen("contacts.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if($prem>=2){
            $nom=$data[0]." ".$data[1]." ".$data[2];
            $adresse=$data[23];
            if($data[14]!=null){$email=$data[14];}
            	elseif($data[15]!=null){$email=$data[15];}
            		else{$data[16];}
            if($data[17]!=null){$tel=$data[17];}
            elseif($data[18]!=null){$tel=$data[18];}
            elseif($data[19]!=null){$tel=$data[19];}
            else{$tel=$data[20];}
            //echo $nom."<br> ".$adresse."<br> ".$tel."<br> ".$email;
	   		$req=$_connexion->prepare('INSERT INTO client(nom, email, telephone, adresse, entreprise) VALUES ( ?, ?, ?, ?, ?)');
	    	$req->execute(array($nom, $email, $tel, $adresse, 1));
            //echo $nom." ajouté";
            $nom="";
            $email="";
            $tel="";
            $adresse="";
            
		}
        $prem++;
        }
    }
    fclose($handle);


	
	
?>