<?php 

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    session_start();

    require_once 'config/db.php';
    require_once 'functions.php';

    require 'assets/AltoRouter/AltoRouter.php';

    $router = new AltoRouter();
    $router->setBasePath('/MyTechOnWebS');

    $router->map('GET', '/', 'accueil','home');
    $router->map('POST', '/connect', 'logindata','login');
    $router->map('POST', '/registeruser', 'registerdata','register');
    $router->map('POST', '/modifyprofile', 'profiledata','profilemodify');
    $router->map('POST', '/contact', 'contactprocess','contact');
    $router->map('POST', '/addbasket', 'checkoutprocess','addbasket');
    $router->map('POST', '/search', 'search','search');


    $router->map('POST', '/backend/product/add', 'product/addproduct','addproduct');
    $router->map('POST', '/backend/product/remove', 'product/removeproduct','removeproduct');
    $router->map('POST', '/backend/product/modify', 'product/modifyproduct','modifyproduct');

    //$router->map('POST', '/product/[a:action]', 'product','removeproduct');
    
    $router->map('POST', '/backend/deletebasket', 'deletebasketprod','deletebasket');


    $router->map('GET', '/backend/[*:backendslug]?', 'backend','backend');
    //$router->map('GET', '/login', 'login','login');
    $router->map('GET', '/[a:pageslug]', 'page','page');
    
    try{
      $match = $router->match();
    } catch(Exception $e){
      die('Erreur : '.$e->getMessage());
    }

    $bdd->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));"); 

    $isFrontend = true;

    if(is_array($match)) {
      var_dump($match);
      $attempt = null;
      if(isset($match['params']['pageslug'])){
        $attempt = $match['params']['pageslug'];
      }
      else if(isset($match['params']['backendslug'])){
        $attempt = 'backend/'.$match['params']['backendslug'];
        $isFrontend = false;
      }
      else if (isset($match['target'])){
        if($match['target'] === 'backend' && empty($match['params'])){
          $attempt = 'backend/dashboard';
          $isFrontend = false;
        }
        else
          $attempt = $match['target'];
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




