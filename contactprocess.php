<?php 

  if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['message'])){
    $firstname = htmlentities($_POST['firstname']);
    $lastname = htmlentities($_POST['lastname']);
    $email = htmlentities($_POST['email']);
    $message = htmlentities($_POST['message']);
  }
  else{
    header('Location: 404');
  }


  $stmt = $bdd->prepare('INSERT INTO contact (firstname, lastname, email, message)
  VALUES (:firstname, :lastname, :email, :message)');
  $stmt->bindParam(':firstname', $firstname);
  $stmt->bindParam(':lastname', $lastname);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':message', $message);

  $stmt->execute();

  header('Location: contact');
?>