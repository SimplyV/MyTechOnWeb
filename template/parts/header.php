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
    }
  ?>   

  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

  <script src="https://kit.fontawesome.com/6020417c1f.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <script src="assets/js/index.js"></script>
  <title> MyTechOnWeb  <?php echo "- $title" ?> </title>
</head>
  <body>