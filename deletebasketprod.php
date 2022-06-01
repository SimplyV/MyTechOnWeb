<?php

  if(isset($_POST['product_id']) AND !empty($_POST['product_id'])){
    $product_id = $_POST['product_id'];
  }
  else{
    header('Location: 404');
  }

  $bdd->query('DELETE FROM basketline WHERE product_id='.$product_id.' AND basket_id='.$_SESSION['basket_id'].'');


  header('Location: checkout');


?>