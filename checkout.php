<?php 

  if(!isset($_SESSION['basket_id']) && empty($_SESSION['basket_id'])){
    $_SESSION['basket_id'] = rand(10, 10000);
  }

  $donnees = $bdd->query('SELECT * FROM basketline WHERE basket_id='.$_SESSION['basket_id'].'');
  if($donnees->rowCount() > 0){
    $basketStatus = 'full';
  }
  else{
    $basketStatus = 'empty';
  }

  if(isset($_SESSION['basket_id']) && !empty($_SESSION['basket_id'])){
    $donneesbdd = $bdd->query('SELECT * FROM basketline JOIN products ON basketline.product_id = products.id WHERE basket_id='.$_SESSION['basket_id'].'');
  }

  $hasAddress;


?>
<div class="wrapper">

    <div class="check-container-title">
      <h2> Mon panier </h2>
    </div>

  <div class="check-container">
   
    <div class="check-container-products">
      <?php 
        if($basketStatus == 'full'){
        while($reponse = $donneesbdd->fetch()){ 
        $imageFilename = getFiles('assets/img/product_images/'.$reponse['id'].'');
      ?>
        
          <div class="check-product">
            <div class="check-product-image">
              <img src="assets/img/product_images/<?php echo $reponse['id']; ?>/<?php echo $imageFilename[3] ?>" alt="">
            </div>
            <div class="check-product-infos">
              <div class="check-product-info-title">
                <h4> <?php echo $reponse['name']; ?> </h4>
                <span><?php echo $reponse['product_price']; ?>€</span>
              </div>
              <div class="check-product-info-content">
                <span> Quantité : <?php echo $reponse['quantity']; ?> </span>
                <form action="<?= $router->generate('deletebasket'); ?>" method="POST">
                  <button><i class="fa-solid fa-trash"></i></button>
                  <input type="hidden" name="product_id" value="<?php echo $reponse['id']; ?>">
                </form>
              </div>
            </div>
          </div>
      <?php }} else{ ?>

        <h2> Votre panier est vide </h2>

      <?php } ?>

    </div>

    <?php if($basketStatus == 'full'){ ?>

    <div class="check-container-proceed">
      <form action="proceedform" action="POST">
      <div class="check-container-form">
        <div class="check-container-form-name">
          <input type="text" placeholder="Nom">
          <input type="text" placeholder="Prénom">
        </div>
        <div class="check-container-form-email">
          <input type="email" placeholder="Adresse e-mail">
        </div>
        <div class="check-container-form-street">
          <input type="text" placeholder="Rue">
          <input type="text" placeholder="Numéro de rue">
        </div>
        <div class="check-container-form-city">
          <input type="text" placeholder="Ville">
        </div>
        <div class="check-container-form-localities">
          <input type="text" placeholder="Code postal">
          <input type="text" placeholder="Commune">
        </div>
        <?php if($_SESSION['verify']){?>
        <div class="check-container-useadress">
          <div class="check-container-useadress-text">
            <p> Je souhaite utiliser mon adresse de facturation comme adresse de livraison. </p>
          </div>
          <div class="check-container-useadress-switch">
          <label class="switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
            </label>
          </div>
        </div>
        <?php } else { ?>
          <div class="check-container-connection">
            <p> Connectez-vous si vous souhaitez enregistrer votre adresse (optionel)</p>
            <a href="<?= $router->generate('page',['pageslug'=> 'login']); ?>"><button> Se connecter </button></a>
          </div>
        <?php } ?>
      </div>

      <div class="check-container-payments">
        <div class="check-container-payments-methods">
          <div class="payments-item">
            <div class="payments-item-brand">
              <label class="label-cont"> 
                <input type="radio" data-name="check[1][]" name="bancontact" checked="checked">
                <span class="checkmark"></span>
              </label>
              <span> Bancontact </span>
            </div>
            <div class="payments-item-image">
              <img src="assets/img/utilities/bancontact.png" alt="">
            </div>
          </div>
          <div class="payments-item">
            <div class="payments-item-brand">
              <label class="label-cont"> 
                <input type="radio" data-name="check[1][]" name="visa">
                <span class="checkmark"></span>
              </label>
              <span> Visa </span>
            </div>
            <div class="payments-item-image">
              <img src="assets/img/utilities/visa.png" alt="">
            </div>
          </div>
          <div class="payments-item">
            <div class="payments-item-brand">
              <label class="label-cont"> 
                <input type="radio" data-name="check[1][]" name="paypal">
                <span class="checkmark"></span>
              </label>
              <span> PayPal </span>
            </div>
            <div class="payments-item-image">
              <img src="assets/img/utilities/paypal.png" alt="">
            </div>
          </div>
        </div>
        <div class="check-container-payments-total">
          <div class="check-container-next">
            <div class="check-container-listing">
            <?php 
              $total = 0;
               if(isset($_SESSION['basket_id']) && !empty($_SESSION['basket_id'])){
                $donnees = $bdd->query('SELECT * FROM basketline JOIN products ON basketline.product_id = products.id WHERE basket_id='.$_SESSION['basket_id'].'');
              }
              while($reponse = $donnees->fetch()){ 
                $total += $reponse['product_price'] * $reponse['quantity'];
                
                ?>
              <div class="check-item">
                <h4> <?php echo $reponse['name']; ?></h4>
                <span> <?php echo $reponse['quantity']; ?> x <?php echo $reponse['product_price']; ?>€</span>
              </div>

              <?php }?>
    
            </div>
            <?php if($total < 25){ $total += 4.99 ?>
            <div class="check-container-next-delivery">
              <h4> Frais de livraison : </h4>
              <h4> 4,99€ </h4>
            </div>
            <?php } ?>
            <div class="check-container-next-total">
              <h4> Total : </h4>
              <h4> <?php echo $total ?>€ </h4>
            </div>
            <div class="check-container-next-button">
              <input type="hidden" value="<?php echo $total ?>">
            <?php if($_SESSION['verify']){ ?>
              <a href="<?= $router->generate('page',['pageslug'=> 'checksuccess']); ?>"><button class="buy-btn"> Passer ma commande </button></a>
            <?php }else{ ?>
              <a href="<?= $router->generate('page',['pageslug'=> 'login']); ?>"><button class="buy-btn"> Se connecter pour passer ma commande </button></a>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
    <?php }?>
    
   
  </div>
 
</div>

