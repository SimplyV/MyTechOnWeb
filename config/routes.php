<?php

require 'assets/AltoRouter/AltoRouter.php';

$router = new AltoRouter();
$router->setBasePath('/MyTechOnWebS');

$router->map('GET', '/', 'app/accueil' , 'home');
$router->map('GET', '/products', 'app/product/products', 'products');
$router->map('GET', '/productslist', 'app/product/productslist', 'productslist');
$router->map('GET', '/singleproduct', 'app/product/singleproduct', 'singleproduct');
$router->map('GET', '/contact-us', 'app/contact/contact', 'contact');
$router->map('GET', '/basket', 'app/checkout/checkout', 'basket');
$router->map('GET', '/logme', 'app/login/login', 'login');
$router->map('GET', '/registerme', 'app/register/register', 'register');
$router->map('GET', '/my-profile', 'app/profile/profile', 'profile');
$router->map('GET', '/wishlistprocess', 'app/wishlist/wishlist', 'wishlist');
$router->map('GET', '/log-me-out', 'logout', 'logout');

$router->map('POST', '/connect', 'app/login/process','loginprocess');
$router->map('POST', '/registerprocess', 'app/register/process','registerprocess');
$router->map('POST', '/modifyprofile', 'app/profile/profiledata','profilemodify');
$router->map('POST', '/modifyadress', 'app/profile/adress/modify', 'modifyadress');
$router->map('POST', '/deleteadress', 'app/profile/adress/delete', 'deleteadress');
$router->map('POST', '/addadress', 'app/profile/adress/add','addadress');
$router->map('POST', '/contactprocess', 'app/contact/contactprocess','contactprocess');
$router->map('POST', '/addtobasket', 'app/checkout/add', 'addbasket');
$router->map('POST', '/deletebasket', 'app/checkout/delete','deletebasket');
$router->map('POST', '/searchprocess', 'app/search/search','search');

              
$router->map('POST', '/backendadd', 'app/backend/product/add','addproduct');
$router->map('POST', '/backendremove', 'app/backend/product/remove','removeproduct');
$router->map('POST', '/backendmodify', 'app/backend/product/modify','modifyproduct');

//$router->map('POST', '/product/[a:action]', 'product','removeproduct');

$router->map('GET', '/app/backend/[*:backendslug]', 'backend','backend');
$router->map('GET', '/app/[a:pageslug]', 'page','page');

try{
  $match = $router->match();
} catch(Exception $e){
  die('Erreur : '.$e->getMessage());
}


?>