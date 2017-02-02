<?php

$row = 1;
if (($handle = fopen("contacts.csv", "r")) !== FALSE) {
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $num = count($data);
    $row++;
    $nom = $data[0]." ".$data[2];
    $mail = $data[14];
    $tel = $data[17];
    $adresse = $data[23];

       	echo $nom . "<br />";

    
  }
  fclose($handle);
}


