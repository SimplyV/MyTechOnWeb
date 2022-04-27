<?php

  session_start();
  $title = "Contact";

?>
<?php include('template/parts/header.php'); ?>
<?php include('template/parts/navbar.php');?>

  <div class="contact-container">
    <div class="contact-brand">
      <div class="contact-brand-title">
        <h1> Contactez-nous ! </h1>
        <p>Besoin d’informations ou de renseignement ? Utilisez le formulaire ou nos différents réseaux et on vous répondras rapidement.</p>
      </div>
      <div class="contact-brand-socials">
        <div>
          <b><i class="fa-solid fa-envelope"></i></b>
          <span><a href="mailto:mytechonweb@gmail.com"> mytechonweb@gmail.com </a></span>
        </div>
        <div>
          <b><i class="fa-solid fa-phone"></i></b>
          <span><a href="tel:+32(0)2 8196596"> +32(0)2 8196596 </a></span>
        </div>
        <div>
          <b><i class="fa-solid fa-location-pin"></i></b>
          <span> Rue des tartes, 31 1000 Bruxelles</span>
        </div>
      </div>
    </div>
    <div class="contact-form">
      <form action="contact_data.php" method="POST" id="contact-form">

      <div class="input-name-block">
        <div class="input-firstname">
          <label for="firstname"> Prénom </label>
          <input type="text" name="firstname" placeholder="Prénom" autocomplete="off" required>
          <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-lastname">
          <label for="lastname"> Nom </label>
          <input type="text" name="lastname" placeholder="Nom" autocomplete="off" required>
          <i class="fa-solid fa-user"></i>
        </div>
      </div>

      <div class="input-email-block">
        <label for="email"> Email </label>
        <input type="email" name="email" placeholder="Email" autocomplete="off" required>
        <i class="fa-solid fa-envelope"></i>
      </div>

      <div class="input-message-block">
        <label for="message"> Message </label>
        <textarea name="message" placeholder="Votre message" required></textarea>
      </div>

      <div class="input-submit-block">
        <button type="submit"> Envoyer mon message</button>
      </div>

      </form>
    </div>  
  </div>


<?php include('template/parts/footer.php'); ?>