<?php 
<<<<<<<< HEAD:app/login/login.php
  if(check($_SESSION['verify']) && $_SESSION['verify'] == true){
		header('Location: '.$router->generate('home').'');
========
  if(isset($_SESSION['verify']) == true){
		header('Location: accueil');
>>>>>>>> b55c60ca3f618f598e4c38a12fa0493f433c238f:login/login.php
	} 
  ?>

<div class="form-container">
    <form action="<?= $router->generate('loginprocess'); ?>" method="POST" id="login-form">

      <h2> Se connecter </h2>

        <div class="input-email">
          <label for="email"> Email </label>
          <input type="email" name="email" placeholder="Entrez votre email" autocomplete="off" required>
          <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="input-password">
          <label for="password"> Mot de passe </label>
          <input type="password" name="password" placeholder="Entrez votre mot de passe" autocomplete="off" required>
          <i class="fa-solid fa-lock"></i>
          <a href="<?= $router->generate('register'); ?>"> Vous n'avez pas de compte ?</a>
        </div>

      <div class="button-block">
        <button type="submit"> Se connecter </button>
      </div>
    </form>
  </div>


