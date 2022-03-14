<?php
  global $router;

  try{
    $bdd = new PDO('mysql:host=localhost;dbname=MyTechOnWeb;charset=utf8', 'root', 'root');
  }

  catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }

?>
  <?php if($_SESSION['verify'] == false){ ?>

  <div class="navbar">
    <div class="navbar-brand">
      <a href="<?= $router->generate('page',['pageslug'=> 'accueil']); ?>"> MyTechOnWeb </a>
    </div>
    <div class="navbar-links">
      <a href="<?= $router->generate('page',['pageslug'=> 'products']); ?>"> Nos produits </a>
      <a href="<?= $router->generate('page',['pageslug'=> 'contact']); ?>"> Contact </a>
      <button class="user-btn"><a href="login"><i class="fas fa-user"></i> Se connecter </a></button>
      <div class="checkcart">
        <button class="cart-btn"><a href="<?= $router->generate('page',['pageslug'=> 'checkout']); ?>"><i class="fas fa-shopping-cart"></i></a></button>
        <?php if($_SESSION['cart']['product_number'] > 0){
         echo ' <span> 0 </span>';
        } ?>
        
      </div>
    </div>
    <div class="navbar-links-mb-button">
      <button class="mbClick" onclick="showMobileMenu()"><i class="fas fa-bars"></i></button>
    </div>
  </div>

  <div class="navbar-mb-container" id="mb-container">
    <a href="<?= $router->generate('page',['pageslug'=> 'products']); ?>"> Nos produits </a>
    <a href="<?= $router->generate('page',['pageslug'=> 'contact']); ?>"> Contact </a>
    <a href="<?= $router->generate('page',['pageslug'=> 'login']); ?>"> Se connecter / S'enregistrer </a>
    <a href="<?= $router->generate('page',['pageslug'=> 'checkout']); ?>"> Mon panier </a>
  </div>

  <?php } else{ ?>

    <div class="navbar">
    <div class="navbar-brand">
      <a href="<?= $router->generate('page',['pageslug'=> 'accueil']); ?>"> MyTechOnWeb </a>
    </div>
    <div class="navbar-links">
      <a href="<?= $router->generate('page',['pageslug'=> 'products']); ?>"> Nos produits </a>
      <a href="<?= $router->generate('page',['pageslug'=> 'contact']); ?>"> Contact </a>
      <div class="dropdown">
        <button class="dropbtn"><i class="fas fa-user"></i> Mon profil</button>
        <div class="dropdown-content">
          <a href="<?= $router->generate('page',['pageslug'=> 'profile']); ?>"><i class="fa-solid fa-gear"></i> Mon compte </a>
          <a href="<?= $router->generate('page',['pageslug'=> 'logout']); ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i> Déconnexion</a>
        </div>
      </div>
      <div class="checkcart">
        <button class="cart-btn"><a href="<?= $router->generate('page',['pageslug'=> 'checkout']); ?>"><i class="fas fa-shopping-cart"></i></a></button>
        <?php if($_SESSION['cart']['product_number'] > 0){
         echo ' <span> 0 </span>';
        } ?>
        
      </div>
     
    </div>
    <div class="navbar-links-mb-button">
      <button class="mbClick" onclick="showMobileMenu()"><i class="fas fa-bars"></i></button>
    </div>
  </div>

  <div class="navbar-mb-container" id="mb-container">
    <a href="<?= $router->generate('page',['pageslug'=> 'products']); ?>"> Nos produits </a>
    <a href="<?= $router->generate('page',['pageslug'=> 'contact']); ?>"> Contact </a>
    <a href="<?= $router->generate('page',['pageslug'=> 'profile']); ?>"> Mon profil </a>
    <a href="<?= $router->generate('page',['pageslug'=> 'checkout']); ?>"> Mon panier <?php if($_SESSION['cart']['product_number'] > 0){
         echo ' (0)';
        } ?></a>
    <a href="<?= $router->generate('page',['pageslug'=> 'logout']); ?>"> Se déconnecter </a>
  </div>

  <?php } ?>