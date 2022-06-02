<?php
  

  if(check($_POST['quantity_prod'])){
    $quantity = $_POST['quantity_prod'];
  } else{
    header('Location: 404');
  }

  $product_id = $_POST['id_product'];
  $price = $_POST['product_price'];


  if(check($_SESSION['basket_id'])){
    $_SESSION['basket_id'] = rand(10, 10000);
  }

  settype($quantity, 'int');
  settype($product_id, 'int');
  settype($price, 'double');

  
  $donnees = $bdd->prepare('SELECT * FROM basketline WHERE basket_id=:basket_id');
  $donnees->execute([':basket_id' => $_SESSION['basket_id']]);
  while($reponse = $donnees->fetch()){
    $products[] = $reponse['product_id']; 
  }

  if(in_array($product_id, $products)){

    $donnees = $bdd->prepare('SELECT quantity FROM basketline WHERE product_id=:product_id AND basket_id=:basket_id');
    $donnees->execute([':product_id' => $product_id, ':basket_id'=> $_SESSION['basket_id']]);
    while($reponse = $donnees->fetch()){
      $actualQuantity = $reponse['quantity'];
    }

    $updatedQuantity = $actualQuantity + $quantity;

    $rep = $bdd->prepare('UPDATE basketline SET quantity = :quantity WHERE product_id = :product_id AND basket_id=:basket_id');
		$rep->execute(array(
      'basket_id' => $_SESSION['basket_id'],
			'product_id'=> $product_id, 
      'quantity'=> $updatedQuantity
		));
  } 
  else{
    $stmt = $bdd->prepare('INSERT INTO basketline (basket_id, product_id, quantity, product_price)
    VALUES (:basket_id, :product_id, :quantity, :product_price)');
    $stmt->bindParam(':basket_id', $basketid);
    $stmt->bindParam(':product_id', $productid);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':product_price', $productprice);

    // insert a row
    $basketid = $_SESSION['basket_id'];
    $productid = $product_id;
    $quantity = $quantity;
    $productprice = $price;
    $stmt->execute();
    
  }

  header('Location: basket');

?>