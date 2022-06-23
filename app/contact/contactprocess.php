<?php 

  if(check($_POST['firstname']) && check($_POST['lastname']) && check($_POST['email']) && check($_POST['message'])){
    $firstname = htmlentities($_POST['firstname']);
    $lastname = htmlentities($_POST['lastname']);
    $email = htmlentities($_POST['email']);
    $message = htmlentities($_POST['message']);
  }
  else{
    header('Location: 404');
  }

  if(isset($_SESSION['id_user'])){
    $idUser = $_SESSION['id_user'];
  }
  else{
    $idUser = 0;
  }



  if(isset($_POST['product-id'])){
    if(check($_POST['subject'])){
      $subject = htmlentities($_POST['subject']);
    }

    $stmt = $bdd->prepare('INSERT INTO message (user_id, product_id, name, lastname, email, subject, message)
    VALUES (:user_id, :product_id, :name, :lastname, :email, :subject, :message)');
    $stmt->bindParam(':user_id', $idUser);
    $stmt->bindParam(':product_id', $_POST['product-id']);
    $stmt->bindParam(':name', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':message', $message);
    $stmt->execute();

  }
  else{
    $stmt = $bdd->prepare('INSERT INTO contact (firstname, lastname, email, message)
    VALUES (:firstname, :lastname, :email, :message)');
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);
  
    $stmt->execute();
  }


 

  header('Location: '.$router->generate('contact').'');
?>