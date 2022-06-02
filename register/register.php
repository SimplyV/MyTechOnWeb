<?php 
  if(isset($_SESSION['verify']) && !empty($_SESSION['verify'])){
    if($_SESSION['verify'] == true){
      header('Location: accueil');
    }	
	} 
  if(!isset($_SESSION['passwordconferror']) && empty($_SESSION['passwordconferror'])){
    $_SESSION['passwordconferror'] = false;
  }
?> 

  <div class="form-container">
    <form action="<?= $router->generate('register'); ?>" method="POST" id="register-form">

      <h2> S'enregistrer </h2>

      <div class="input-name-block">
      <div class="input-pseudo">
          <label for="pseudo"> Pseudo </label>
          <input type="text" name="pseudo" placeholder="Entrez votre pseudo" autocomplete="off" required>
          <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-firstname">
          <label for="firstname"> Prénom </label>
          <input type="text" name="firstname" placeholder="Entrez votre prénom" autocomplete="off" required>
          <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-lastname">
          <label for="lastname"> Nom </label>
          <input type="text" name="lastname" placeholder="Entrez votre nom" autocomplete="off" required>
          <i class="fa-solid fa-user"></i>
        </div>
      </div>

      <div class="input-email-block">
          <label for="email"> Email </label>
          <input type="email" name="email" placeholder="Entrez votre email" autocomplete="off" required>
          <i class="fa-solid fa-envelope"></i>
      </div>

      <div class="input-password-block">
          <label for="password"> Mot de passe </label>
          <input type="password" name="password" placeholder="Entrez votre mot de passe" autocomplete="off" required>
          <i class="fa-solid fa-lock"></i>
        
      </div>

      <div class="input-password-block">
          <label for="passwordconf"> Confirmation de votre mot de passe  </label>
          <input type="password" name="passwordconf" placeholder="Entrez à nouveau votre mot de passe" autocomplete="off" required>
          <i class="fa-solid fa-lock"></i>
          <a href="<?= $router->generate('login'); ?>"> J'ai déja un compte </a>
      </div>
      <?php if($_SESSION['passwordconferror'] == true){
          echo '<div class="password-conf-error">';
          echo '<span> Les mots de passe ne correspondent pas </span>';
          echo '</div>';
          }
      ?>

      <div class="button-block">
        <button type="submit"> M'enregistrer </button>
      </div>
    </form>
  </div>