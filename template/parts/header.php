<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php 


    $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    $curPageName = substr($attempt, 0, -4);
    if(isset($uriSegments[3])){
      if($uriSegments[3] == 'backend'){
        $curPageName = 'app/backend/dashboard';
      }
    }

    if($curPageName == 'app/backend/dashboard'){
      echo '<link rel="stylesheet" href="../../assets/css/global.css">';
    } else{
      echo '<link rel="stylesheet" href="assets/css/global.css">';
    }
    if($curPageName == 'app/accueil'){
      $title = 'Accueil';
    }

    
    if(isset($pages[''.$curPageName.'']['title']) && !empty($pages[''.$curPageName.'']['title'])){
      $title = $pages[''.$curPageName.'']['title'];
    }

    if(isset($pages[''.$curPageName.'']['css']) && !empty($pages[''.$curPageName.'']['css'])){
      foreach($pages[''.$curPageName.'']['css'] as $cssLink){
        if($curPageName == 'app/backend/dashboard'){
          echo '<link rel="stylesheet" href="../../assets/css/'.$cssLink.'">';
        }
        else{
          echo '<link rel="stylesheet" href="'.$cssLink.'">';
        }
       
      }
    } 
    if(isset($pages[''.$curPageName.'']['cssWithOptions']) && !empty($pages[''.$curPageName.'']['cssWithOptions'])){
      foreach($pages[''.$curPageName.'']['cssWithOptions'] as $cssOptionsLink){
        echo $cssOptionsLink;
      }
    } 
    if(isset($pages[''.$curPageName.'']['js']) && !empty($pages[''.$curPageName.'']['js'])){
      foreach($pages[''.$curPageName.'']['js'] as $jsLink){
        echo '<script src="../'.$jsLink.'" defer></script>';
      }
    } 
   
    if(isset($pages[''.$curPageName.'']['jsWithOptions']) && !empty($pages[''.$curPageName.'']['jsWithOptions'])){
      foreach($pages[''.$curPageName.'']['jsWithOptions'] as $jsOptionsLink){
        echo $jsOptionsLink;
      }
    } 

  ?>   
  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
  <link rel="stylesheet" href="assets/js/Remodal-master/dist/remodal.css">
  <link rel="stylesheet" href="assets/js/Remodal-master/dist/remodal-default-theme.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
  <script src="https://kit.fontawesome.com/6020417c1f.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
  <script src="assets/js/Remodal-master/dist/remodal.min.js"></script>
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  <script src="assets/js/index.js" defer></script>
  <title> MyTechOnWeb  <?php echo "- $title" ?> </title>
</head>
  <body>
