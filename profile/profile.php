<?php 

  $bdname = $bdd->prepare('SELECT * FROM users WHERE id_user=:id_user');	
	$bdname->execute(array('id_user'=>$_SESSION['id_user']));
	$profil = $bdname->fetch();

  $joinquery = $bdd->prepare('SELECT products.id, products.name, category.name
  FROM products 
  INNER JOIN product_category ON products.id=product_category.product_id 
  INNER JOIN category ON product_category.category_id = category.id 
  INNER JOIN wishlist ON products.id = wishlist.product_id
  WHERE wishlist.product_id = products.id AND wishlist.user_id = :user_id 
  GROUP BY products.id');
  $joinquery->execute([':user_id' => $_SESSION['id_user']]);
  if($joinquery->rowCount() > 0){
    $wishlistStatus = 'full';
  }
  else{
    $wishlistStatus = 'empty';
  }
<<<<<<<< HEAD:app/profile/profile.php

  $dataAdress = $bdd->prepare('SELECT * FROM users_adresses WHERE user_id=:id_user');
  $dataAdress->execute([':id_user' => $_SESSION['id_user']]);



========
>>>>>>>> b55c60ca3f618f598e4c38a12fa0493f433c238f:profile/profile.php
?>

  <div class="profil-container">
    <div class="profil-navigation">
      <a href="#informations" class="active"> Mes informations </a>
      <a href="#adresses"> Mes adresses </a>
      <a href="#orders"> Mes commandes </a>
      <a href="#wishlist"> Wishlist </a>
      <a href="#security"> Sécurité </a>
    </div>
    <div class="profil-content">
      <div class="profil-content-informations active" id="informations">
        <form action="<?= $router->generate('profilemodify'); ?>" method="post" enctype="multipart/form-data">
          <div class="profil-content-image">
            <div class="profil-content-image-brand">
              <label for="image"><i class="fa-solid fa-plus"></i> </label>
              <input type="file" name="image">
              <?php if(check($profil['avatar'])){
<<<<<<<< HEAD:app/profile/profile.php
                echo '<img src="assets/img/user_images/'.$profil['id_user'].'/'.$profil['avatar'].'">';
========
                echo '<img src="assets/img/user_images/'.$profil['avatar'].'">';
>>>>>>>> b55c60ca3f618f598e4c38a12fa0493f433c238f:profile/profile.php
              } 
              else{
                echo '<img src="assets/img/user_images/avatar.png">';
              }?>         
            </div>
            <div class="profil-content-image-text">
              <h2> Eggerickx Gillian </h2>
              <span> Vos informations personnelles </span>
            </div>
          </div>
          <div class="profil-content-name-block">
          <div class="profil-content-firstname">
              <label for="pseudo"> Pseudo </label>
              <input type="text" name="pseudo" value="<?php echo $profil['nickname']; ?>">
            </div>
            <div class="profil-content-firstname">
              <label for="name"> Nom </label>
              <input type="text" name="lastname" value="<?php echo $profil['lastname']; ?>">
            </div>
            <div class="profil-content-lastname">
              <label for="firstname"> Prénom </label>
              <input type="text" name="firstname" value="<?php echo $profil['firstname']; ?>">
            </div>
          </div>
          <div class="profil-content-email">
            <label for="email"> Adresse e-mail </label>
            <input type="email" name="email" value="<?php echo $profil['email']; ?>">
          </div>
          <div class="profil-submit">
            <button type="submit"> Modifier mon profil </button>
          </div>
        </form>
      </div>
      <div class="profil-content-adresses" id="adresses">
        <div class="profil-content-adresses-title">
          <h2> Mes adresses </h2>
          <a href="#addAdressForm">
            <button id="addAdress">
              <i class="fa-solid fa-plus">
              </i>
            </button>
          </a>

          <div class="remodal" data-remodal-id="addAdressForm">
            <button data-remodal-action="close" class="remodal-close"></button>
            <div class="addAdress-form-container">
              <form action="<?= $router->generate('addadress'); ?>" method="POST">
                <div class="profil-adresses-title">
                  <h2> Ajouter une adresse </h2>
                </div>
                <div class="profil-adresses-street">
                  <label for="street"> Rue </label>
                  <input type="text" name="street" value="">  
                </div>
                <div class="profil-adresses-city-block">
                  <div class="profil-adresses-streetnumber">
                    <label for="streetnumber"> Numéro de rue </label>
                    <input type="number" name="streetnumber" value="">
                  </div>
                  <div class="profil-adresses-city">
                    <label for="city"> Ville </label>
                    <input type="text" name="city" value="">
                  </div>
                </div>
                <div class="profil-adresses-commune-block">
                  <div class="profil-adresses-commune">
                    <label for="commune"> Commune </label>
                    <input type="text" name="commune" value="">
                  </div>
                  <div class="profil-adresses-zipcode">
                    <label for="zipcode"> Code postal </label>
                    <input type="number" name="zipcode" value="">
                  </div>
                </div>
                <div class="profil-adresses-submit">
                  <button type="submit"> Ajouter une adresse </button>
                </div>
              </form>
            </div>
          </div>

        </div>
        <div class="profil-content-adresses-content">
        <?php  while($repData = $dataAdress->fetch()){?>
          <div class="profil-content-adresses-item" data-id="<?php echo $repData['id'] ?>">
            <div class="profil-content-adresses-header">
              <div class="profil-content-adresses-header-brand">
                <i class="fa-solid fa-location-dot"></i>
                <p><?php echo $repData['street'].', '.$repData['street_number'].' '.$repData['zipcode'].' '.$repData['commune'].' '.$repData['city'] ?></p>
              </div>
              <div class="profil-content-adresses-header-action">
                <button id="adress-cta"><i class="fa-solid fa-angle-down"></i></button>
              </div>
            </div>
            <div class="profil-content-adresses-form">
              <form action="<?= $router->generate('modifyadress'); ?>" method="POST">
                <div class="profil-adresses-street">
                  <label for="street"> Rue </label>
                  <input type="text" name="street" value="<?php echo $repData['street'] ?>">  
                </div>
                <div class="profil-adresses-city-block">
                  <div class="profil-adresses-streetnumber">
                    <label for="streetnumber"> Numéro de rue </label>
                    <input type="number" name="streetnumber" value="<?php echo $repData['street_number'] ?>">
                  </div>
                  <div class="profil-adresses-city">
                    <label for="city"> Ville </label>
                    <input type="text" name="city" value="<?php echo $repData['city'] ?>">
                  </div>
                </div>
                <div class="profil-adresses-commune-block">
                  <div class="profil-adresses-commune">
                    <label for="commune"> Commune </label>
                    <input type="text" name="commune" value="<?php echo $repData['commune'] ?>">
                  </div>
                  <div class="profil-adresses-zipcode">
                    <label for="zipcode"> Code postal </label>
                    <input type="number" name="zipcode" value="<?php echo $repData['zipcode'] ?>">
                  </div>
                  <input type="hidden" name="id" value="<?php echo $repData['id'] ?>">
                </div>
                <div class="profil-adresses-submit">
                  <button type="submit"> Modifier mon adresse </button>
                </div>
              </form>
              <form action="<?= $router->generate('deleteadress'); ?>" method="POST">
                <input type="hidden" name="adressId" value="<?php echo $repData['id'] ?>">
                <button type="submit" class="delete-btn"> Supprimer cette adresse </button>
              </form>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
      <div class="profil-content-orders" id="orders">
        <div class="profil-content-orders-title">
          <h2> Mes commandes passées </h2>
        </div>
        <div class="profil-content-orders-content">
           <div class="profil-content-order">
             <div class="profil-content-order-brand">
                <div class="profil-content-order-brand-image">
                  <img src="assets/img/smartphone-cat.png">
                </div>
                <div class="profil-content-order-brand-name">
                  <h4> Apple iPhone 13 Pro </h4>
                  <span> Smartphones </span>
                </div>
             </div>
             <div class="profil-content-order-informations">
                <div class="profil-content-order-informations-brand">
                  <h5> N° 3245Y6</h5>
                  <span> 12 Décembre 2021 </span>
                </div>
                <div class="profil-content-order-informations-content">
                  <h4> 1195,95€ </h4>
                  <span> Complété </span>
                </div>
             </div>
           </div>
        </div>
      </div>
      <div class="profil-content-wishlist" id="wishlist">
        <div class="profil-content-wishlist-title">
          <h2> Ma wishlist </h2>
        </div>
        <div class="profil-content-wishlist-content">
        <?php  if($wishlistStatus == 'full'){?>
          <?php  while($reponse = $joinquery->fetch()){ ?>  
         
              <div class="profil-content-wishlist-item">
                <div class="profil-content-wishlist-item-brand">
                  <div class="profil-content-wishlist-item-brand-image">
                    <?php $imageFilename = getFiles('assets/img/product_images/'.$reponse['id'].'');?>
                    <img src="assets/img/product_images/<?php echo $reponse['id'] ?>/<?php echo $imageFilename['3']; ?>" alt="">
                  </div>
                  <div class="profil-content-wishlist-item-brand-name">
                    <h4> <?php echo $reponse[1] ?></h4>
                    <span> <?php echo $reponse['name'] ?></span>
                  </div>
                </div>
                <div class="profil-content-wishlist-item-button">
                  <a href="singleproduct?prod_id=<?php echo $reponse['id']?>"><button> Acheter </button></a>
                </div>
              </div>
      
            <?php  }} else if($wishlistStatus == 'empty'){?>
              <div class="no-found">
                <h2> Votre wishlist est vide !</h2>
              </div>
            <?php } ?>
        </div>
      </div>
      <div class="profil-content-security" id="security">
        <div class="profil-content-security-title">
            <h2> Mes paramètres de sécurité </h2>
        </div>
        <div class="profil-content-security-content">
          <div class="profil-content-security-password-change">
            <div class="profil-content-security-password-change-brand">
              <h3> Changer mon mot de passe</h3>
              <span> Vous avez oublié votre mot de passe ? Cliquer sur le <br> bouton pour le réinitialiser </span>
            </div>
            <div class="profil-content-security-password-change-button">
              <button> Changer </button>
            </div>
          </div>
          <div class="profil-content-security-authentification">
            <div class="profil-content-security-authentification-brand">
              <h3> Double authentification </h3>
              <span> Sécurisez encore plus votre compte avec la double <br> authentification</span>
            </div>
            <div class="profil-content-security-authentification-button">
              <button> Activer </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
