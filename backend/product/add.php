<?php

  $req = $bdd->prepare('INSERT INTO products(name, description, price, perks, introduction) VALUES(:name, :description, :price, :perks, :introduction)');
  $req->execute(array(
    'name' => $_POST['name'],
    'description' => $_POST['description'],
    'price' => $_POST['price'],
    'perks' => $_POST['perks'],
    'introduction' => $_POST['introduction']
  )); 

  $lastId = $bdd->lastInsertId();

  $req = $bdd->prepare('INSERT INTO product_category(product_id, category_id) VALUES(:product_id, :category_id)');
  $req->execute(array(
    'product_id' => $lastId,
    'category_id' => $_POST['category']
  )); 

  mkdir('assets/img/product_images/'.$lastId.'');

  upload_files($lastId, 'assets/img/product_images/', ['jpeg', 'jpg', 'png'], $replace = false);

  header('Location: backend/dashboard_single-product');
  
?>