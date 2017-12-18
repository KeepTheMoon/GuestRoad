

<?php

$dbh = new PDO('mysql:host=localhost;dbname=TESt JSON', "root", "");

echo $dbh->query('SELECT * from Car');
?>