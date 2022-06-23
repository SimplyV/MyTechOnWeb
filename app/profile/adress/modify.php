<?php 

  if(check($_POST['street']) && check($_POST['streetnumber']) && check($_POST['city']) && check($_POST['commune']) && check($_POST['zipcode']) && check($_POST['id'])){
    $street = htmlentities($_POST['street']);
    $streetnumber = htmlentities($_POST['streetnumber']);
    $city = htmlentities($_POST['city']);
    $commune = htmlentities($_POST['commune']);
    $zipcode = htmlentities($_POST['zipcode']);
    $id = htmlentities($_POST['id']);
  }

  settype($streetnumber, 'int');
  settype($zipcode, 'int');
  settype($id, 'int');

  $donnees = $bdd->prepare('SELECT * FROM users_adresses WHERE user_id=:user_id');
  $donnees->execute([':user_id' => $_SESSION['id_user']]);
  while($reponse = $donnees->fetch()){
    if($donnees->rowCount() == 0){
      continue;
    } else {
      $dataAdresses[] = $reponse;
    } 
  }
  
  $allowInsert = false;
  
  foreach($dataAdresses as $dataAdress){
    if($dataAdress['street'] == $street && $dataAdress['street_number'] == $streetnumber && $dataAdress['city'] == $city && $dataAdress['commune'] == $commune && $dataAdress['zipcode'] == $zipcode){
      header('Location: '.$router->generate('profile').'');
      die;
    } 
    else{
      $allowInsert = true;
    }
  }

  if($allowInsert){
    $stmt = $bdd->prepare('UPDATE users_adresses SET street=:street, street_number=:streetnumber, city=:city, commune=:commune, zipcode=:zipcode WHERE id=:id');
    $stmt->bindParam(':id', $id);
    // $stmt->bindParam(':id_user', $_SESSION['id_user']);
    $stmt->bindParam(':street', $street);
    $stmt->bindParam(':streetnumber', $streetnumber);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':commune', $commune);
    $stmt->bindParam(':zipcode', $zipcode);
    $stmt->execute();
  }

  header('Location: '.$router->generate('profile').'');


?>