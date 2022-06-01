<?php

  try{
    $bdd = new PDO('mysql:host=localhost;dbname=MyTechOnWeb;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

  }

  catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }


?>