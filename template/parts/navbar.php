<?php
  if(!isset($_SESSION['verify']) && empty($_SESSION['verify'])){
    $_SESSION['verify'] = false;
  }

?>
  <?php if($_SESSION['verify'] == false){ ?>

  <div class="navbar">
    <div class="navbar-brand">
      <a href="<?= $router->generate('home'); ?>"> MyTechOnWeb </a>
    </div>
    <div class="navbar-links">
      <a href="<?= $router->generate('products'); ?>"> Nos produits </a>
      <a href="<?= $router->generate('contact'); ?>"> Contact </a>
      <button class="user-btn"><a href="<?= $router->generate('login'); ?>"><i class="fas fa-user"></i> Se connecter </a></button>
      <div class="checkcart">
        <button class="cart-btn"><a href="<?= $router->generate('basket'); ?>"><i class="fas fa-shopping-cart"></i></a></button>        
      </div>
    </div>
    <div class="navbar-links-mb-button">
      <button class="mbClick" onclick="showMobileMenu()"><i class="fas fa-bars"></i></button>
    </div>
  </div>

  <div class="navbar-mb-container" id="mb-container">
    <a href="<?= $router->generate('products'); ?>"> Nos produits </a>
    <a href="<?= $router->generate('contact'); ?>"> Contact </a>
    <a href="<?= $router->generate('login'); ?>"> Se connecter / S'enregistrer </a>
    <a href="<?= $router->generate('basket'); ?>"> Mon panier </a>
  </div>

  <?php } else{ ?>

    <div class="navbar">
    <div class="navbar-brand">
      <a href="<?= $router->generate('home'); ?>"> MyTechOnWeb </a>
    </div>
    <div class="navbar-links">
      <a href="<?= $router->generate('products'); ?>"> Nos produits </a>
      <a href="<?= $router->generate('contact'); ?>"> Contact </a>
      <div class="dropdown">
        <button class="dropbtn"><i class="fas fa-user"></i> Mon profil</button>
        <div class="dropdown-content">
          <a href="<?= $router->generate('profile'); ?>"><i class="fa-solid fa-gear"></i> Mon compte </a>
          <a href="<?= $router->generate('page',['pageslug'=> 'logout']); ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i> Déconnexion</a>
        </div>
      </div>
      <div class="checkcart">
        <button class="cart-btn"><a href="<?= $router->generate('basket'); ?>"><i class="fas fa-shopping-cart"></i></a></button>
      </div>
     
    </div>
    <div class="navbar-links-mb-button">
      <button class="mbClick" onclick="showMobileMenu()"><i class="fas fa-bars"></i></button>
    </div>
  </div>

  <div class="navbar-mb-container" id="mb-container">
    <a href="<?= $router->generate('products'); ?>"> Nos produits </a>
    <a href="<?= $router->generate('contact'); ?>"> Contact </a>
    <a href="<?= $router->generate('profile'); ?>"> Mon profil </a>
    <a href="<?= $router->generate('basket'); ?>"> Mon panier </a>
    <a href="<?= $router->generate('page',['pageslug'=> 'logout']); ?>"> Se déconnecter </a>
  </div>

  <?php } ?>