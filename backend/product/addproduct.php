<?php

  $req = $bdd->prepare('INSERT INTO products(name, description, price, brand, introduction) VALUES(:name, :description, :price, :brand, :introduction)');
  $req->execute(array(
    'name' => $_POST['name'],
    'description' => $_POST['description'],
    'price' => $_POST['price'],
    'brand' => $_POST['brand'],
    'introduction' => $_POST['introduction']
  )); 

  $lastId = $bdd->lastInsertId();

  $req = $bdd->prepare('INSERT INTO product_category(product_id, category_id) VALUES(:product_id, :category_id)');
  $req->execute(array(
    'product_id' => $lastId,
    'category_id' => $_POST['category']
  )); 

  mkdir('assets/img/product_images/'.$lastId.'');

  if(isset($_FILES['image_prod']) AND $_FILES['image_prod']['error'] == 0){  
    if ($_FILES['image_prod']['size'] <= 1000000000000000){
      $infosfichier = pathinfo($_FILES['image_prod']['name']);
      $extension_upload = $infosfichier['extension'];
      $extensions_autorisees = array('jpg', 'jpeg', 'png');
      if (in_array($extension_upload, $extensions_autorisees)){
          move_uploaded_file($_FILES['image_prod']['tmp_name'], 'assets/img/product_images/'.$lastId.'/' . basename($_FILES['image_prod']['name'])); 
      }
   }
  }
  if (isset($_FILES['image_prod_1']) AND $_FILES['image_prod_1']['error'] == 0){
    if ($_FILES['image_prod_1']['size'] <= 1000000000000000){
      $infosfichier = pathinfo($_FILES['image_prod_1']['name']);
      $extension_upload = $infosfichier['extension'];
      $extensions_autorisees = array('jpg', 'jpeg', 'png');
      if (in_array($extension_upload, $extensions_autorisees)){
          move_uploaded_file($_FILES['image_prod_1']['tmp_name'], 'assets/img/product_images/'.$lastId.'/' . basename($_FILES['image_prod_1']['name']));
      }
   }
  }
  if (isset($_FILES['image_prod_2']) AND $_FILES['image_prod_2']['error'] == 0){
    if ($_FILES['image_prod_2']['size'] <= 1000000000000000){
      $infosfichier = pathinfo($_FILES['image_prod_2']['name']);
      $extension_upload = $infosfichier['extension'];
      $extensions_autorisees = array('jpg', 'jpeg', 'png');
      if (in_array($extension_upload, $extensions_autorisees)){
          move_uploaded_file($_FILES['image_prod_2']['tmp_name'], 'assets/img/product_images/'.$lastId.'/' . basename($_FILES['image_prod_2']['name']));
      }
   }
  }

  header('Location: backend/dashboard_single-product');

?>