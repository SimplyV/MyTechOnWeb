<?php 
  $title = "Se connecter" ;
  // if(isset($_SESSION['verify']) == true){
	// 	header('Location: index.php');
	// } 
  ?>

<div class="form-container">
    <form action="<?= $router->generate('login'); ?>" method="POST" id="login-form">

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
          <a href="register.php"> Vous n'avez pas de compte ?</a>
        </div>

      <div class="button-block">
        <button type="submit"> M'enregistrer </button>
      </div>
    </form>
  </div>


