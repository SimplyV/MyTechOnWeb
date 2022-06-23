<?php

  $user_id = $_SESSION['id_user'];
  if(check($_GET['id_prod'])){
    $wishlistProduct = $_GET['id_prod'];
  }

  pre($_GET['id_prod']);

  $data = $bdd->prepare('SELECT * FROM wishlist WHERE user_id=:user_id');
  $data->execute([':user_id' => $user_id]);

  while($rep = $data->fetch()){
    $products[] = $rep['product_id'];
  }

  if(in_array($wishlistProduct ,$products)){
    $donnees = $bdd->prepare('DELETE FROM wishlist WHERE product_id=:product_id AND user_id=:user_id');
    $donnees->execute([':product_id' => $wishlistProduct, ':user_id' => $user_id]);

    if(check($_SESSION['prev_loc']) && $_SESSION['prev_loc'] == 'product/singleproduct.php'){
      header('Location: '.$router->generate('singleproduct').'?prod_id='.$wishlistProduct.'');
    }
    else{
      header('Location: '.$router->generate('products').'');
    }   
    die;
  }

  $donnees = $bdd->prepare('INSERT INTO wishlist(user_id, product_id) VALUES(:user_id, :product_id)');
  $donnees->execute(array(
    'user_id' => $user_id,
    'product_id' => $wishlistProduct
  ));

  if(check($_SESSION['prev_loc']) && $_SESSION['prev_loc'] == 'product/singleproduct.php'){
    header('Location: '.$router->generate('singleproduct').'?prod_id='.$wishlistProduct.'');
  }
  else{
    header('Location: '.$router->generate('products').'');
  }

 

?>