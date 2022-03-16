<?php 
    session_start();
    try{
      $bdd = new PDO('mysql:host=localhost;dbname=MyTechOnWeb;charset=utf8', 'root', 'root');
    } catch(Exception $e){
      die('Erreur : '.$e->getMessage());
    }

    function pre($a){
      echo '<pre>';
      print_r($a);
      echo '</pre>';
    }

    require 'assets/AltoRouter/AltoRouter.php';

    $router = new AltoRouter();
    $router->setBasePath('/MyTechOnWebS');

    $router->map('GET', '/', 'accueil','home');
    //$router->map('GET', '/login', 'login','login');
    $router->map('GET', '/[*:pageslug]', 'page','page');

    $match = $router->match();
    // pre($match);
    if( is_array($match)  ) {
      require $match['target'].'.php';
    } else {
      // no route was matched
      // header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    }
?>

