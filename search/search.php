<?php

  $research = $_GET['search'];
  $research = htmlentities($research);

  $request = $bdd->prepare('SELECT * FROM products WHERE name LIKE :research%');
  $request->execute([':research' => $research]);
  
  while($reponse = $request->fetch()){
    $name[] = $reponse['name'];
  }
  pre($name);
  $request->debugDumpParams(); 

?>