<?php 

  if(check($_POST['adressId'])){
    $id = htmlentities($_POST['adressId']);
    settype($id, 'int');
  }
  else{
    header('Location: '.$router->generate('profile').'');
  }

  $stmt = $bdd->prepare('DELETE FROM users_adresses WHERE id=:id');
  $stmt->bindParam(':id', $id);
  $stmt->execute();

  header('Location: '.$router->generate('profile').'');

?>