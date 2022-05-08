<?php
  session_start();
  $title = "Étape finale";
?>

<div class="check-container">
  <form action="checkout_process.php" method="POST">
  <div class="check-adress">
    <div class="check-adress-container">
    <div class="check-adress-title">
      <h2> Mon adresse </h2>
    </div>
    <div class="check-adress-card">
      <span> <?php echo ($_SESSION['firstname'].' '.$_SESSION['lastname']) ?> </span>
      <span> <?php echo $_SESSION['email'] ?> </span>
      <span> <?php echo ($_SESSION['street'].' '.$_SESSION['street_number'].', '.$_SESSION['zipcode'].' '.$_SESSION['city'])?></span>
    </div>
    <div class="check-adress-content">
      <div class="input-name-block">
        <div class="input-firstname">
          <label for="firstname"> Prénom </label>
          <input type="text" name="firstname" placeholder="Prénom" class="check_form" autocomplete="off"  >
          <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-lastname">
          <label for="lastname"> Nom </label>
          <input type="text" name="lastname" placeholder="Nom" class="check_form" autocomplete="off"  >
          <i class="fa-solid fa-user"></i>
        </div>
      </div>

        <div class="input-email-block">
          <label for="email"> Email </label>
          <input type="email" name="email" placeholder="Email" class="check_form" autocomplete="off" >
          <i class="fa-solid fa-envelope"></i>
        </div>

        <div class="input-street-block">
          <label for="street"> Rue </label>
          <input type="text" name="street" placeholder="Rue" class="check_form" autocomplete="off"  >
          <i class="fa-solid fa-street-view"></i>
        </div>

        <div class="input-adress-block">
          <div class="input-streetnumber">
            <label for="streetnumber"> N° de rue </label>
            <input type="number" name="streetnumber" placeholder="Numéro de rue" class="check_form" min="0" autocomplete="off"  >
            <i class="fa-solid fa-map-pin"></i>
          </div>
          <div class="input-city">
            <label for="city"> Ville </label>
            <input type="text" name="city" placeholder="Ville" class="check_form" autocomplete="off"  >
            <i class="fa-solid fa-earth-europe"></i>
          </div>
      </div>

      <div class="input-adress-block">
          <div class="input-zipcode">
            <label for="zipcode"> Code postal </label>
            <input type="number" name="zipcode" placeholder="Code postale" class="check_form" min="0" autocomplete="off"  >
            <i class="fa-solid fa-location-arrow"></i>
          </div>
          <div class="input-commune">
            <label for="commune"> Commune </label>
            <input type="text" name="commune" placeholder="Commune" class="check_form" autocomplete="off" >
            <i class="fa-solid fa-location-dot"></i>
          </div>
      </div>


    <div class="check-use-data">
      <label class="switch" for="checkbox">
        <input type="checkbox" id="checkbox" />
        <div class="slider round"></div>
      </label>
      <span> Utiliser une autre adresse  </span>
    </div>
  </div>
    

  </div>
  <div class="check-pay-container">
  <div class="check-pay">
    <div class="check-pay-title">
      <h2> Méthodes de payement</h2>
    </div>
    <div class="check-pay-content">

      <div class="check-pay-method">
        <div class="check-pay-method-brand">
        <label class="label-cont"> Bancontact
          <input type="radio" name="check[1][]" checked="checked">
          <span class="checkmark"></span>
        </label>

        </div>
        <div class="check-pay-method-icon">
          <img src="assets/img/bancontact.png">
        </div>
      </div>

      <div class="check-pay-method">
        <div class="check-pay-method-brand">
        <label class="label-cont"> Visa
          <input type="radio" name="check[1][]">
          <span class="checkmark"></span>
        </label>

        </div>
        <div class="check-pay-method-icon">
          <img src="assets/img/visa.png">
        </div>
      </div>

      <div class="check-pay-method">
        <div class="check-pay-method-brand">
        <label class="label-cont"> PayPal
          <input type="radio" name="check[1][]">
          <span class="checkmark"></span>
        </label>

        </div>
        <div class="check-pay-method-icon">
          <img src="assets/img/paypal.png">
        </div>
      </div>
      

    </div>
  </div>
  <div class="check-total">
    <div class="check-total-brand">
      <span> Total </span>
      <span> 950€ </span>
    </div>
    <div class="check-total-pay">
      <button> Payer </button>
    </div>
  </div>
  </div>
  
  </form>
</div>
