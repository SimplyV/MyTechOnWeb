<?php 

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    session_start();

    require_once 'config/db.php';
    require 'config/pages.php';
    require_once 'functions.php';

    require 'assets/AltoRouter/AltoRouter.php';

    $router = new AltoRouter();
    $router->setBasePath('/MyTechOnWebS');

    $router->map('GET', '/', 'accueil','home');
    $router->map('GET', '/products', 'product/products', 'products');
    $router->map('GET', '/productslist', 'product/productslist', 'productslist');
    $router->map('GET', '/singleproduct', 'product/singleproduct', 'singleproduct');
    $router->map('GET', '/contact-us', 'contact/contact', 'contact');
    $router->map('GET', '/basket', 'checkout/checkout', 'basket');
    $router->map('GET', '/logme', 'login/login', 'login');
    $router->map('GET', '/registerme', 'register/register', 'register');
    $router->map('GET', '/my-profile', 'profile/profile', 'profile');

    $router->map('POST', '/connect', 'login/process','loginprocess');
    $router->map('POST', '/registerprocess', 'register/process','registerprocess');
    $router->map('POST', '/modifyprofile', 'profile/profiledata','profilemodify');
    $router->map('POST', '/contactprocess', 'contact/contactprocess','contactprocess');
    $router->map('POST', '/addtobasket', 'checkout/add', 'addbasket');
    $router->map('POST', '/deletebasket', 'checkout/delete','deletebasket');
    $router->map('POST', '/searchprocess', 'search/search','search');
    $router->map('GET', '/wishlistprocess', 'wishlist/wishlist', 'wishlist');
                  
    $router->map('POST', '/backendadd', 'backend/product/add','addproduct');
    $router->map('POST', '/backendremove', 'backend/product/remove','removeproduct');
    $router->map('POST', '/backendmodify', 'backend/product/modify','modifyproduct');

    //$router->map('POST', '/product/[a:action]', 'product','removeproduct');

    $router->map('GET', '/backend/[*:backendslug]?', 'backend','backend');
    $router->map('GET', '/[a:pageslug]', 'page','page');
    
    try{
      $match = $router->match();
    } catch(Exception $e){
      die('Erreur : '.$e->getMessage());
    }

    // pre($match);

    $bdd->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));"); 

    $isFrontend = true;

    if(is_array($match)) {
      $attempt = null;
      if(isset($match['params']['pageslug'])){
        $attempt = $match['params']['pageslug'];
      }
      else if(isset($match['params']['backendslug'])){
        $attempt = 'backend/'.$match['params']['backendslug'];
        $isFrontend = false;    
      }
      else if(isset($match['target'])){
        if($match['target'] === 'backend' && empty($match['params'])){
          $attempt = 'backend/dashboard';
          $isFrontend = false;
        }
        else{
          $attempt = $match['target'];
        }
      }
    }


    $attempt .= '.php';
    if(!file_exists($attempt)){
      $attempt = '404.php';
      $isFrontend = false;
    }

    require('template/parts/header.php');
    if($isFrontend){
      require('template/parts/navbar.php');
    }
    
    require $attempt;

    if($isFrontend){
      require('template/parts/footer.php');
    }
?>




