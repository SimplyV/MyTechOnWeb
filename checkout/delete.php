<?php

  if(check($_POST['product_id'])){
    $product_id = $_POST['product_id'];
  }
  else{
    header('Location: 404');
  }

  $bdd->prepare('DELETE FROM basketline WHERE product_id=:product_id AND basket_id=:basket_id');
  $bdd->execute([':product_id' => $product_id, ':basket_id' => $_SESSION['basket_id']]);


  header('Location: checkout');


?>