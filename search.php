<?php

  $research = $_GET['search'];
  $research = htmlentities($research);

  $request = $bdd->prepare('SELECT * FROM products WHERE name LIKE '.$research.'%');
  while($reponse = $request->fetch()){
    $name[] = $reponse['name'];
  }
  pre($name);
  $request->debugDumpParams(); 

?>