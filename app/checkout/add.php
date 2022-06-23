<?php
  

  if(check($_POST['quantity_prod'])){
    $quantity = $_POST['quantity_prod'];
  } else{
    header('Location: 404');
  }

  $product_id = $_POST['id_product'];
  $price = $_POST['product_price'];

  if(isset($_SESSION['id_user'])){
    $idUser = $_SESSION['id_user'];
  }
  else{
    $idUser = 0;
  }


  settype($quantity, 'int');
  settype($product_id, 'int');
  settype($price, 'double');

  
  $donnees = $bdd->prepare('SELECT * FROM basketline WHERE basket_id=:basket_id');
  $donnees->execute([':basket_id' => $_COOKIE['basket_id']]);
  while($reponse = $donnees->fetch()){
    $products[] = $reponse['product_id']; 
  }

  if(in_array($product_id, $products)){

    $donnees = $bdd->prepare('SELECT quantity FROM basketline WHERE product_id=:product_id AND basket_id=:basket_id');
    $donnees->execute([':product_id' => $product_id, ':basket_id'=> $_COOKIE['basket_id']]);
    while($reponse = $donnees->fetch()){
      $actualQuantity = $reponse['quantity'];
    }

    $updatedQuantity = $actualQuantity + $quantity;

    $rep = $bdd->prepare('UPDATE basketline SET quantity = :quantity WHERE product_id = :product_id AND basket_id=:basket_id');
		$rep->execute(array(
      'basket_id' => $_COOKIE['basket_id'],
			'product_id'=> $product_id, 
      'quantity'=> $updatedQuantity
		));
  } 
  else{
    
    if(!isset($_COOKIE['basket_id'])){

      $stmt = $bdd->prepare('INSERT INTO basket(user_id) VALUES (:user_id)');
      $stmt->bindParam(':user_id', $idUser);
      $stmt->execute();
      
      $lastId = $bdd->lastInsertId();
    
      setcookie('basket_id', $lastId ,time()+(60*60*24*30), '/');

      $stmt = $bdd->prepare('INSERT INTO basketline (basket_id, product_id, quantity, product_price)
      VALUES (:basket_id, :product_id, :quantity, :product_price)');
      $stmt->bindParam(':basket_id', $lastId);
      $stmt->bindParam(':product_id', $product_id);
      $stmt->bindParam(':quantity', $quantity);
      $stmt->bindParam(':product_price', $price);
  
      // insert a row
      $stmt->execute();

    } else{

      $stmt = $bdd->prepare('INSERT INTO basketline (basket_id, product_id, quantity, product_price)
      VALUES (:basket_id, :product_id, :quantity, :product_price)');
      $stmt->bindParam(':basket_id', $_COOKIE['basket_id']);
      $stmt->bindParam(':product_id', $product_id);
      $stmt->bindParam(':quantity', $quantity);
      $stmt->bindParam(':product_price', $price);
      $stmt->execute();
    }
    
  }

  header('Location: '.$router->generate('basket').'');

?>