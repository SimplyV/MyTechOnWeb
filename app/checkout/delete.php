<?php

  if(isset($_POST['product_id'])){
    $product_id = $_POST['product_id'];
  }
  else{
    header('Location: 404');
  }

  $stmt = $bdd->prepare('DELETE FROM basketline WHERE product_id=:product_id AND basket_id=:basket_id');
  $stmt->execute([':product_id' => $product_id, ':basket_id' => $_COOKIE['basket_id']]);

  if($stmt->rowCount() == 0){
    $stmt = $bdd->prepare('DELETE FROM basket WHERE basket_id=:basket_id');
    $stmt->execute([':basket_id' => $_COOKIE['basket_id']]);
    setcookie('basket_id','',time()-(60*60*24*30), '/');
  }

  header('Location: '.$router->generate('basket').'');

?>