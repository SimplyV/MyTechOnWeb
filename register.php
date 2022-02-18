<?php 
  session_start();

  if(isset($_SESSION['verify']) == true){
		header('Location: index.php');
	} 
  $title ="S'enregistrer"; 
?> 
<?php include('template/parts/header.php'); ?>
<?php include('template/parts/navbar.php');?>

  <div class="form-container">
    <form action="register_data.php" method="POST" enctype="multipart/form-data">

      <h2> S'enregistrer </h2>

      <div class="input-name-block">
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
          <a href="login.php"> J'ai déja un compte </a>
      </div>
      <?php if($_SESSION['passwordconferror' === true]){
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

<?php include('template/parts/footer.php'); ?>