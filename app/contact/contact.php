<?php

  $isFromProduct = false;
  $text ='';

  if(isset($_GET['id_prod'])){
    $product_id = htmlentities($_GET['id_prod']);
    settype($product_id, 'int');
    $isFromProduct = true;

    $stmt = $bdd->prepare('SELECT name FROM products WHERE id=:id');
    $stmt->execute([':id' => $product_id]);
    while($reponse = $stmt->fetch()){
      $name = $reponse['name'];
    }
  }



?>


<div class="contact-container">
    <div class="contact-brand">
      <div class="contact-brand-title">
        <h1> Contactez-nous ! </h1>
        <p> Besoin d’informations ou de renseignement ? Utilisez le formulaire ou nos différents réseaux et on vous répondra rapidement.</p>
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
      <form action="<?= $router->generate('contactprocess'); ?>" method="POST" id="contact-form">
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

      <?php if($isFromProduct){ ?>

      <div class="input-subject-block">
        <label for="subject"> Sujet </label>
        <input type="text" name="subject" placeholder="Sujet" autocomplete="off" required>
        <i class="fa-solid fa-inbox"></i>
      </div>

      <input type="hidden" value="<?php echo $product_id?>" name="product-id">
      <?php $text = 'J\'ai une question à propos du produit "'.$name.'" : ' ?>

      <?php } ?>

      <div class="input-message-block">
        <label for="message"> Message </label>
        <textarea name="message" placeholder="Votre message" required><?php echo $text ?></textarea>
      </div>
      
      <div class="input-submit-block">
        <button type="submit"> Envoyer mon message</button>
      </div>

      </form>
    </div>  
  </div>

