<?php 

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    session_start();

    require_once 'config/db.php';
    require 'config/pages.php';
    require_once 'functions.php';
    require 'config/routes.php';

    $bdd->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));"); 

    $isFrontend = true;
    $attempt = null;


    if(is_array($match)) {
      if(isset($match['params']['pageslug'])){
        $attempt = $match['params']['pageslug'];
      }
      else if(isset($match['params']['backendslug'])){
        $attempt = 'app/backend/'.$match['params']['backendslug'];
        $isFrontend = false;    
      }
      else if(isset($match['target'])){
        if($match['target'] === 'app/backend/' && empty($match['params'])){
          $attempt = 'app/backend/dashboard';
          $isFrontend = false;
        }
        else{
          $attempt = $match['target'];
        }
      }
    }

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




