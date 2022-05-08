<?php 

  session_start();
  $title = "Panier" ;

  ?>

<div class="wrapper">

    <div class="check-container-title">
      <h2> Mon panier </h2>
    </div>

  <div class="check-container">
   
    <div class="check-container-products">
      <div class="check-product">
        <div class="check-product-image">
          <img src="https://via.placeholder.com/150" alt="">
        </div>
        <div class="check-product-infos">
          <div class="check-product-info-title">
            <h4> Article n°1 </h4>
            <span> 199€ </span>
          </div>
          <div class="check-product-info-content">
            <span> Quantité : 3 </span>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
        </div>
      </div>

      <div class="check-product">
        <div class="check-product-image">
          <img src="https://via.placeholder.com/150" alt="">
        </div>
        <div class="check-product-infos">
          <div class="check-product-info-title">
            <h4> Article n°1 </h4>
            <span> 199€ </span>
          </div>
          <div class="check-product-info-content">
            <span> Quantité : 3 </span>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
        </div>
      </div>

      <div class="check-product">
        <div class="check-product-image">
          <img src="https://via.placeholder.com/150" alt="">
        </div>
        <div class="check-product-infos">
          <div class="check-product-info-title">
            <h4> Article n°1 </h4>
            <span> 199€ </span>
          </div>
          <div class="check-product-info-content">
            <span> Quantité : 3 </span>
            <button><i class="fa-solid fa-trash"></i></button>
          </div>
        </div>
      </div>
    </div>

    <div class="check-container-next">
      <div class="check-container-listing">
        <div class="check-item">
          <h4> Article n°1</h4>
          <span> 597€ </span>
        </div>
        <div class="check-item">
          <h4> Article n°1</h4>
          <span> 597€ </span>
        </div>
        <div class="check-item">
          <h4> Article n°1</h4>
          <span> 597€ </span>
        </div>
      </div>
      <div class="check-container-next-delivery">
        <h4> Frais de livraison : </h4>
        <h4> 4,99€ </h4>
      </div>
      <div class="check-container-next-total">
        <h4> Total : </h4>
        <h4> 54,99€ </h4>
      </div>
      <div class="check-container-next-button">
        <a href="products.php"><button class="pursue-btn"> Poursuivre mes achats </button></a>
        <a href="checkout-second-steps.php"><button class="buy-btn"> Passer ma commande </button></a>
      </div>
    </div>
  </div>
 
</div>

