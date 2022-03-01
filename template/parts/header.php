<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="assets/css/global.css">
  <?php 
    switch($title){
      case "S'enregistrer": 
        echo '<link rel="stylesheet" href="assets/css/register.css">';
      break;
      case "Se connecter":
        echo '<link rel="stylesheet" href="assets/css/login.css">';
      break;
      case "Mon profil":
        echo '<link rel="stylesheet" href="assets/css/profile.css">';
      break;
      case "Contact":
        echo '<link rel="stylesheet" href="assets/css/contact.css">';
      break;
      case "Panier":
        echo '<link rel="stylesheet" href="assets/css/check.css">';
      break;
      case "Nos produits":
        echo '<link rel="stylesheet" href="assets/css/products.css">';  
      break;
    }
  ?>   
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
  <script src="https://kit.fontawesome.com/6020417c1f.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <script src="assets/js/index.js" defer></script>
  <title> MyTechOnWeb  <?php echo "- $title" ?> </title>
</head>
  <body>