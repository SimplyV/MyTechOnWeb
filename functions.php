<?php

  function pre($a){
    echo '<pre>';
    print_r($a);
    echo '</pre>';
  }
  
  function check($val) : bool{
<<<<<<< HEAD
    return isset($val);
=======
    return isset($val) && !empty($val);
>>>>>>> b55c60ca3f618f598e4c38a12fa0493f433c238f
  }

  function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  function getFiles($mydir){
    $myfiles = array_diff(scandir($mydir), array('.', '..')); 
    return($myfiles);
  }
  
  function upload_files($filename, $path_to_img, $extensions_autorisees = ['jpg', 'jpeg', 'png'], $replace = false){

    foreach($_FILES as $img_name => $img_prop)
    {
      if(!is_array($img_prop) ||  $img_prop['error'] != 0)
        continue;

      if (image_has_valid_size($img_prop) && image_has_valid_ext($img_prop, $extensions_autorisees)){
        $imageFilename = getFiles($path_to_img.$filename.'');
        if($replace){
          unlink($path_to_img.$filename.'/'.$imageFilename[2].'');
        }
        unset($imageFilename[2]);
        move_uploaded_file($img_prop['tmp_name'], $path_to_img.$filename.'/' . basename($img_prop['name'])); 
      }
      
    }
  }

  function upload_image_profile($image, $path_to_img, $extensions_autorisees = ['jpg', 'jpeg', 'png'], $user_id, $bd){
    if(check($image)){
      if(is_array($image) ||  $image['error'] == 0){
        if(image_has_valid_size($image) && image_has_valid_ext($image, $extensions_autorisees)){
          move_uploaded_file($image['tmp_name'], $path_to_img.'/'.$user_id.'/' . basename($image['name'])); 
          $avatar = $image['name'];
        }
      }
    }
    else{
      if(check($user_id)){
        $donnees = $bd->prepare('SELECT avatar FROM users WHERE id_user=:id_user');
        $donnees->execute(['id_user' => $_SESSION['id_user']]);
        while($reponse = $donnees->fetch()){
        $avatar = $reponse['avatar'];
        }
      }
    }

    return $avatar;

  }


  function image_has_valid_size($img_prop)
  {
    return $img_prop['size'] <= 1000000000;
  }

  function image_has_valid_ext($img_prop, $valid_ext) : bool 
  {
    $infosfichier = pathinfo($img_prop['name']);
    $extension_upload = $infosfichier['extension'];
    return in_array($extension_upload, $valid_ext);
   
  }
?>