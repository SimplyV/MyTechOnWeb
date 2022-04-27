<?php 
    session_start();

    require_once 'config/db.php';
    require_once 'functions.php';

    require 'assets/AltoRouter/AltoRouter.php';

    $router = new AltoRouter();
    $router->setBasePath('/MyTechOnWebS');

    $router->map('GET', '/', 'accueil','home');
    $router->map('POST', '/connect', 'login_data','login');
    $router->map('GET', '/backend/[*:backendslug]', 'backend','backend');
    //$router->map('GET', '/login', 'login','login');
    $router->map('GET', '/[a:pageslug]', 'page','page');
    
    try{
      $match = $router->match();
    } catch(Exception $e){
      die('Erreur : '.$e->getMessage());
    }

    $isFrontend = true;

    if( is_array($match)  ) {
      $attempt = null;
      if(isset($match['params']['pageslug'])){
        $attempt = $match['params']['pageslug'];
      }
      else if(isset($match['params']['backendslug'])){
        $attempt = 'backend/'.$match['params']['backendslug'];
        $isFrontend = false;
      }
      else if (isset($match['target'])){
        $attempt = $match['target'];
      }
    }

    $attempt .= '.php';
    if(!file_exists($attempt)){
      $attempt = '404.php';
    }

    if($isFrontend){
      require('template/parts/header.php');
      require('template/parts/navbar.php');
    }

    require $attempt;

    if($isFrontend){
      require('template/parts/footer.php');
    }
?>

