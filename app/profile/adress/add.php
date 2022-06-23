<?php


  if(check($_POST['street']) && check($_POST['streetnumber']) && check($_POST['city']) && check($_POST['commune']) && check($_POST['zipcode'])){
    $street = $_POST['street'];
    $streetnumber = $_POST['streetnumber'];
    $city = $_POST['city'];
    $commune = $_POST['commune'];
    $zipcode = $_POST['zipcode'];
  } else{
    header('Location: 404');
  }



  $donnees = $bdd->prepare('SELECT * FROM users_adresses WHERE user_id=:user_id');
  $donnees->execute([':user_id' => $_SESSION['id_user']]);
  while($reponse = $donnees->fetch()){
    if($donnees->rowCount() == 0){
      continue;
    } else {
      $dataAdresses[] = $reponse;
    } 
  }


  if($dataAdresses['street'] == $street && $dataAdresses['steet_number'] == $streetnumber && $dataAdresses['city'] == $city && $dataAdresses['commune'] == $commune && $dataAdresses['zipcode'] == $zipcode){
    header('Location: '.$router->generate('profile').'');
    die;
  } 
  else{
    $stmt = $bdd->prepare('INSERT INTO users_adresses(user_id, street, street_number, city, commune, zipcode)
    VALUES (:user_id, :street, :street_number, :city, :commune, :zipcode)');
    $stmt->bindParam(':user_id', $_SESSION['id_user']);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':street_number', $streetnumber);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':commune', $commune);
    $stmt->bindParam(':zipcode', $zipcode);
    $stmt->execute();
    
  }

  header('Location: '.$router->generate('profile').'');



?>