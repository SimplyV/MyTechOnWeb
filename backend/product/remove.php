<?php 

  if(isset($_POST['id']) && !empty($_POST['id'])){
    $product_id = $_POST['id'];
  }
  else{
    header('Location: 404');
  }
  pre($product_id);

  $bdd->query('DELETE FROM product_category WHERE product_id='.$product_id.'');
  $bdd->query('DELETE FROM basketline WHERE product_id='.$product_id.'');
  $bdd->query('DELETE FROM products WHERE id='.$product_id.'');

  header('Location: backend/dashboard');
  


?>