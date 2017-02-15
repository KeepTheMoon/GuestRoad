<?php
require_once 'Modele/dao.php';
echo crypt('Baptiste6', 'gestdep');
  $_dao=new dao();
  echo $_dao->getMdp("rouger.baptiste@gmail.com");
?>
