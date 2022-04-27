<?php 

  session_start();

  if($_SESSION['verify'] == false){
    header('Location: index.php');
  }

  try{
    $bdd = new PDO('mysql:host=localhost;dbname=MyTechOnWeb;charset=utf8', 'root', 'root');
  }

  catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }
  
  $bdname = $bdd->prepare('SELECT * FROM users WHERE id_user=:id_user');	
	$bdname->execute(array('id_user'=>$_SESSION['id_user']));
	$profil = $bdname->fetch();

  $title = "Mon profil";

?>
<?php include('template/parts/header.php'); ?>
<?php include('template/parts/navbar.php');?>

  <div class="profil-container">
    <div class="profil-navigation">
      <a href="#informations" class="active"> Mes informations </a>
      <a href="#orders"> Mes commandes </a>
      <a href="#wishlist"> Wishlist </a>
      <a href="#security"> Sécurité </a>
    </div>
    <div class="profil-content">
      <div class="profil-content-informations active" id="informations">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="profil-content-image">
            <div class="profil-content-image-brand">
              <label for="image"><i class="fa-solid fa-plus"></i> </label>
              <input type="file" name="image">
              <img src="assets/img/visa.png">
            </div>
            <div class="profil-content-image-text">
              <h2> Eggerickx Gillian </h2>
              <span> Vos informations personnelles </span>
            </div>
          </div>
          <div class="profil-content-name-block">
          <div class="profil-content-firstname">
              <label for="pseudo"> Pseudo </label>
              <input type="text" name="pseudo">
            </div>
            <div class="profil-content-firstname">
              <label for="name"> Nom </label>
              <input type="text" name="name">
            </div>
            <div class="profil-content-lastname">
              <label for="lastname"> Prénom </label>
              <input type="text" name="firstname">
            </div>
          </div>
          <div class="profil-content-email">
            <label for="email"> Adresse e-mail </label>
            <input type="email" name="email">
          </div>
          <div class="profil-content-street">
            <div class="profil-content-street-street">
              <label for="street"> Rue </label>
              <input type="text" name="street">
            </div>
            <div class="profil-content-street-number">
              <label for="streetnumber"> N° de rue </label>
              <input type="text" name="streetnumber">
            </div>
          </div>
          <div class="profil-content-city">
            <label for="city"> Ville </label>
            <input type="text" name="city">
          </div>
          <div class="profil-content-adress-second">
            <div class="profil-content-adress-second-zipcode">
              <label for="zipcode"> Code postal </label>
              <input type="number" name="zipcode">
            </div>
            <div class="profil-content-adress-second-commune">
              <label for="zipcode"> Commune </label>
              <input type="text" name="commune">
            </div>
          </div>
          <div class="profil-submit">
            <button type="submit"> Modifier mon profil </button>
          </div>
        </form>
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
          <div class="profil-content-wishlist-item">
            <div class="profil-content-wishlist-item-brand">
              <div class="profil-content-wishlist-item-brand-image">
                <img src="assets/img/smartphone-cat.png" alt="">
              </div>
              <div class="profil-content-wishlist-item-brand-name">
                <h4> Apple iPhone 13 Pro</h4>
                <span> Smartphones </span>
              </div>
            </div>
            <div class="profil-content-wishlist-item-button">
              <a href="#"><button> Acheter </button></a>
            </div>
          </div>
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




<?php include('template/parts/footer.php'); ?>