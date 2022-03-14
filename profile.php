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

<div class="profile-title">
  <h2><?php echo $title ?> </h2>
</div>
<div class="profile-container">
<div class="form-container">
  <form action="profile_data.php" method="POST" id="profile-form">


    <div class="input-name-block">
      <div class="input-firstname">
        <label for="firstname"> Prénom </label>
        <input type="text" name="firstname" placeholder="Prénom" autocomplete="off" value="<?php echo $profil['firstname'] ?>" required>
        <i class="fa-solid fa-user"></i>
      </div>
      <div class="input-lastname">
        <label for="lastname"> Nom </label>
        <input type="text" name="lastname" placeholder="Nom" autocomplete="off" value="<?php echo $profil['lastname'] ?>" required>
        <i class="fa-solid fa-user"></i>
      </div>
    </div>

      <div class="input-email-block">
        <label for="email"> Email </label>
        <input type="email" name="email" placeholder="Email" autocomplete="off" value="<?php echo $profil['email'] ?>" required>
        <i class="fa-solid fa-envelope"></i>
      </div>

      <div class="input-street-block">
        <label for="street"> Rue </label>
        <input type="text" name="street" placeholder="Rue" autocomplete="off" value="<?php echo $profil['user_street'] ?>" required>
        <i class="fa-solid fa-street-view"></i>
      </div>

      <div class="input-adress-block">
        <div class="input-streetnumber">
          <label for="streetnumber"> N° de rue </label>
          <input type="number" name="streetnumber" placeholder="Numéro de rue" min="0" autocomplete="off" value="<?php echo $profil['user_street_number'] ?>" required>
          <i class="fa-solid fa-map-pin"></i>
        </div>
        <div class="input-city">
          <label for="city"> Ville </label>
          <input type="text" name="city" placeholder="Ville" autocomplete="off" value="<?php echo $profil['user_city'] ?>" required>
          <i class="fa-solid fa-earth-europe"></i>
        </div>
    </div>

    <div class="input-adress-block">
        <div class="input-zipcode">
          <label for="zipcode"> Code postal </label>
          <input type="number" name="zipcode" placeholder="Code postale" min="0" autocomplete="off" value="<?php echo $profil['user_zipcode'] ?>"  required>
          <i class="fa-solid fa-location-arrow"></i>
        </div>
        <div class="input-commune">
          <label for="commune"> Commune </label>
          <input type="text" name="commune" placeholder="Commune" autocomplete="off" value="<?php echo $profil['user_commune'] ?>" required>
          <i class="fa-solid fa-location-dot"></i>
        </div>
    </div>


      <div class="button-block">
        <button type="submit"> Modifier </button>
      </div>
  </form>
</div>
  <div class="history-container">
    <div class="history-item">
        <div class="history-brand">
          <img src="https://via.placeholder.com/150">       
        </div>
        <div class="history-infos">
          <div class="history-infos-brand">
            <span> Produit n°1</span>
          </div>
          <div class="history-infos-content">
            <h4> 02/10/2021 </h4>
          <span> 234€ </span>
        </div>         
        </div>
      </div>
    </div>
    
</div>




<?php include('template/parts/footer.php'); ?>