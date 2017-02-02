<?php

$m = new MongoClient(); // connexion
$db = $m->selectDB('test');
$collection = new MongoCollection($db, 'addresses');

$query = array('city' => 'CHOLET');

$cursor = $collection->find($query);
foreach ($cursor as $doc) {
    var_dump($doc);
    echo $doc;
}
?>