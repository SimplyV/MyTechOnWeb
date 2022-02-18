<?php 

  session_start();
  $title = "Panier" ;
    // if(isset($_SESSION['verify']) == false){
    // 	header('Location: index.php');
    // } 

  ?>


<?php include('template/parts/header.php'); ?>
<?php include('template/parts/navbar.php');?>

  <div class="check-container">
    <div class="check-header">
      <div class="check-header-brand">
        <h1> Votre panier </h1>
      </div>
      <div class="check-header-steps">
        <div class="steps-connexion"></div>
        <div class="steps-connexion-line"></div>
        <div class="steps-address"></div>
        <div class="steps-address-line"></div>
        <div class="steps-summary"></div>
      </div>
    </div>
    <div class="check-content">

    </div>
  </div>

<?php include('template/parts/footer.php'); ?>

