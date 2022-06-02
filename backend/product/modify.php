<?php 

  if(check($_POST['id'])){
    $product_id = $_POST['id'];
  }
  else{
    header('Location: 404');
  }

  $request = $bdd->prepare('SELECT * from products WHERE id=:id');
  $request->execute([':id' => $product_id]);
  while($reponse = $request->fetch()){
    $name = $reponse['name'];
    $price = $reponse['price'];
    $perks = $reponse['perks'];
    $introduction = $reponse['introduction'];
    $description = $reponse['description'];
  }

  settype($price, 'float');

  if(check($_POST['name'])){
    $_POST['name'] = $name;
  }
  if(check($_POST['price'])){
    $_POST['price'] = $price;
  }
  if(check($_POST['perks'])){
    $_POST['perks'] = $perks;
  }
  if(check($_POST['introduction'])){
    $_POST['introduction'] = $introduction;
  }
  if(check($_POST['description'])){
    $_POST['description'] = $description;
  }

var_dump($_FILES);

  $extensions_autorisees = array('jpg', 'jpeg', 'png');
  $path_to_img = 'assets/img/product_images/';
  foreach($_FILES as $img_name => $img_prop){
    if(check($img_prop) && $img_prop['error'] == 0){  
      if ($img_prop['size'] <= 1000000000000000){

        $infosfichier = pathinfo($img_prop['name']);
        $extension_upload = $infosfichier['extension'];
        
        if (in_array($extension_upload, $extensions_autorisees)){
          $imageFilename = getFiles($path_to_img.$product_id.'');
          unset($imageFilename['2']);
          move_uploaded_file($img_prop['tmp_name'], $path_to_img.$product_id.'/' . basename($img_prop['name'])); 
          unlink($path_to_img.$product_id.'/'.$imageFilename[2].'');
        }
      }
    }
  }
  
  $rep = $bdd->prepare('UPDATE products SET name=:nom, introduction=:introduction, description=:description, price=:price, perks=:perks WHERE id=:id');

  $rep->bindParam(':id', $product_id);
  $rep->bindParam(':nom', $name);
  $rep->bindParam(':introduction', $introduction);
  $rep->bindParam(':description', $description);
  $rep->bindParam(':price', $price);
  $rep->bindParam(':perks', $perks);
  $rep->execute(); 

  $repcat = $bdd->prepare('UPDATE product_category SET category_id=:category_id WHERE product_id=:id');

  $repcat->bindParam(':id', $product_id);
  $repcat->bindParam(':category_id', $_POST['category']);
  $repcat->execute(); 
	

  // header('Location: backend/dashboard');
?>

