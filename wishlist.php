<?php

  $user_id = $_SESSION['id_user'];
  if(isset($_GET['id_prod']) && !empty($_GET['id_prod'])){
    $wishlistProduct = $_GET['id_prod'];
  }

  $data = $bdd->query('SELECT * FROM wishlist WHERE user_id='.$user_id.'');
  while($rep = $data->fetch()){
    $products[] = $rep['product_id'];
  }
  if(in_array($wishlistProduct ,$products)){
    $donnees = $bdd->query('DELETE FROM wishlist WHERE product_id='.$wishlistProduct.' AND user_id='.$user_id.'');
    if(isset($_SESSION['prev_loc']) && !empty($_SESSION['prev_loc']) && $_SESSION['prev_loc'] == 'singleproduct.php'){
      header('Location: singleproduct?prod_id='.$wishlistProduct.'');
    }
    else{
      header('Location: products');
    }   
    die;
  }

  $donnees = $bdd->prepare('INSERT INTO wishlist(user_id, product_id) VALUES(:user_id, :product_id)');
  $donnees->execute(array(
    'user_id' => $user_id,
    'product_id' => $wishlistProduct
  ));

  if(isset($_SESSION['prev_loc']) && !empty($_SESSION['prev_loc']) && $_SESSION['prev_loc'] == 'singleproduct.php'){
    header('Location: singleproduct?prod_id='.$wishlistProduct.'');
  }
  else{
    header('Location: products');
  }

 



?>