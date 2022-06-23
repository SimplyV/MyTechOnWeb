<?php 

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    session_start();

    require_once 'config/db.php';
    require 'config/pages.php';
    require_once 'functions.php';
<<<<<<< HEAD
    require 'config/routes.php';
=======

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
>>>>>>> b55c60ca3f618f598e4c38a12fa0493f433c238f

    // pre($match);

    $bdd->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));"); 

    $isFrontend = true;
    $attempt = null;


    if(is_array($match)) {
<<<<<<< HEAD

=======
      $attempt = null;
>>>>>>> b55c60ca3f618f598e4c38a12fa0493f433c238f
      if(isset($match['params']['pageslug'])){
        $attempt = $match['params']['pageslug'];
      }
      else if(isset($match['params']['backendslug'])){
<<<<<<< HEAD
        $attempt = 'app/backend/'.$match['params']['backendslug'];
        $isFrontend = false;    
      }
      else if(isset($match['target'])){
        if($match['target'] === 'app/backend/' && empty($match['params'])){
          $attempt = 'app/backend/dashboard';
=======
        $attempt = 'backend/'.$match['params']['backendslug'];
        $isFrontend = false;    
      }
      else if(isset($match['target'])){
        if($match['target'] === 'backend' && empty($match['params'])){
          $attempt = 'backend/dashboard';
>>>>>>> b55c60ca3f618f598e4c38a12fa0493f433c238f
          $isFrontend = false;
        }
        else{
          $attempt = $match['target'];
        }
      }
    }


<<<<<<< HEAD

=======
>>>>>>> b55c60ca3f618f598e4c38a12fa0493f433c238f
    $attempt .= '.php';
    if(!file_exists($attempt)){
      $attempt = 'template/parts/404.php';
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




