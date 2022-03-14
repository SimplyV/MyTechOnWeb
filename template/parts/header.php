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
      case "Étape finale":
        echo '<link rel="stylesheet" href="assets/css/final_check.css">';
      break;
      case "Listing des produits":
        echo '<link rel="stylesheet" href="assets/css/listing_product.css">';
      break;
      case "Page produit":
        echo '<link rel="stylesheet" href="assets/css/single_product.css">';
      break;
      case "Dashboard":
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">';
        echo '<link rel="stylesheet" href="assets/css/dashboard.css">';
        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>';
        echo '<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="assets/js/feather.js" defer></script>';
      break;

    }
  ?>   
  <link rel="stylesheet" href="node_modules/nouislider/dist/nouislider.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
  <script src="node_modules/nouislider/dist/nouislider.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
  <script src="https://kit.fontawesome.com/6020417c1f.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <script src="assets/js/index.js" defer></script>
  <title> MyTechOnWeb  <?php echo "- $title" ?> </title>
</head>
  <body>