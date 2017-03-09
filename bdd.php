<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gestdep');


if (isset($_GET['term'])){
	$return_arr = array();

	try {
	    $conn = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $stmt = $conn->prepare('SELECT * FROM client WHERE nom LIKE :term OR adresse LIKE :term');
	    $stmt->execute(array('term' => '%'.$_GET['term'].'%'));

	    while($row = $stmt->fetch()) {
					array_push($return_arr, utf8_encode($row['nom']." - ".$row['adresse']));
	    }

	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}


    /* Toss back results as json encoded array. */
		//print_r($return_arr);

    echo json_encode($return_arr);
}


?>
