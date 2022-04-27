<?php
  session_start();
  $title = "Page produit";

  include 'template/parts/db.php';

  if(!empty($_GET['prod_id'])){
    $product = $_GET['prod_id'];

    $donnees = $bdd->query('SELECT name FROM products WHERE id='.$product.'');
    while ($reponse = $donnees->fetch()){
        $prodname = $reponse["name"];
    }
    $donnees = $bdd->query('SELECT product_image FROM products WHERE id='.$product.'');
    while ($reponse = $donnees->fetch()){
      $prod_images = $reponse['product_image'];
    }
    $donnees = $bdd->query('SELECT price FROM products WHERE id='.$product.'');
    while ($reponse = $donnees->fetch()){
      $price = $reponse['price'];
    }
    $donnees = $bdd->query('SELECT introduction FROM products WHERE id='.$product.'');
    while ($reponse = $donnees->fetch()){
      $introduction = $reponse['introduction'];
    }
    $donnees = $bdd->query('SELECT description FROM products WHERE id='.$product.'');
    while ($reponse = $donnees->fetch()){
      $description = $reponse['description'];
    }
    $donnees = $bdd->query('SELECT brand FROM products WHERE id='.$product.'');
    while ($reponse = $donnees->fetch()){
      $brand = $reponse['brand'];
    }

    
  }
  else{
    header('Location: 404');
  }
?>
<?php include('template/parts/header.php'); ?>
<?php include('template/parts/navbar.php'); ?>

<div class="single-product-container">
    <div class="single-product-main">
      <div class="single-product-images">
        <div class="swiper singleImageSwiper">
          <div class="swiper-wrapper">
            <?php 
            $array_prod_image = explode(",", $prod_images);
            foreach($array_prod_image as $image_item){ ?>
               <div class="swiper-slide"><img src="assets/img/product_images/<?php echo $image_item?>"></div>
            <?php
            }
            ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
      <div class="single-product-infos">
        <div class="single-product-infos-header">
          <div class="single-product-infos-title">
            <h2><?php echo $prodname ?></h2>
          </div>
          <div class="single-product-infos-stars">
            <div class="single-product-infos-stars-icons">
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
              <i class="fa-solid fa-star"></i>
            </div>
            <div class="single-product-infos-stars-review">
              <span> ( 1 avis ) </span>
            </div>
          </div>
          <div class="single-product-infos-price">
            <h3> <?php echo $price ?>€</h3>
          </div>
        </div>
        <div class="single-product-infos-subheader">
          <div class="single-product-infos-subheader-description">
            <p> <?php echo $introduction ?></p>
          </div>
          <div class="single-product-infos-subheader-buttons">
            <form action="add_cart.php" method="POST">
              <input type="number" name="prod_quantity" min="1" max="999" value="1" required>
              <button type="submit"> Ajouter au panier </button>
            </form>
          </div>
          <div class="single-product-infos-subheader-favorite"> 
            <button> <i class="fa-solid fa-heart"></i> Ajouter au favoris </button>
          </div>
        </div>
      </div>
    </div>
    <div class="single-product-double-row">
      <div class="single-product-description">
        <div class="single-product-description-title">
          <h2> Description de l'article </h2>
        </div>
        <div class="single-product-description-content">
          <p> <?php echo $description ?></p>
        </div>
      </div>
      <div class="single-product-perks">
        <div class="single-product-perks-title">
          <h2> Caractéristiques du produit </h2>
        </div>
        <div class="single-product-perk">
          <span> Marque </span>
          <h4><?php echo $brand ?></h4>
        </div>
      </div>
    </div>
    
    <div class="single-product-reviews">
      <div class="single-product-reviews-title">
        <h2> Avis du produit </h2>
      </div>
      <div class="single-product-review-stars">
        <div class="single-product-review-stars-num">
          <h3> 4,7 </h3>
          <i class="fa-solid fa-star"></i>
          <span> (10 avis) </span>
        </div>
        <div class="single-product-review-container">
          <div class="single-product-review">
            <div class="single-product-review-brand">
              <img src="https://via.placeholder.com/50">
              <span> Barack Obama </span>
            </div>
            <div class="single-product-review-content">
              <div class="single-product-review-content-brand">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
              <div class="single-product-review-content-content">
                <h3> Autonomie incroyable !</h3>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae odit nam aliquid maiores! Vero eos quibusdam et odio quod animi blanditiis ipsum ullam amet maxime! Veniam laboriosam corrupti sed. A.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="recommandations-container">
  <div class="recommandations-title">
    <h2> Recommandations</h2>
  </div>
  <div class="recommandations-content">
    <div class="recommandations-item">
      <div class="recommandations-item-brand">
        <img src="https://via.placeholder.com/50">
      </div>
      <div class="recommandations-item-infos">
        <div class="recommandations-item-info-brand">
          <h2> Produit n°1 </h2>
          <span> 320€ </span>
        </div>
        <div class="recommandations-item-info-button">
          <button> Voir ce produit </button>
        </div>
      </div>
    </div>
    <div class="recommandations-item">
      <div class="recommandations-item-brand">
        <img src="https://via.placeholder.com/50">
      </div>
      <div class="recommandations-item-infos">
        <div class="recommandations-item-info-brand">
          <h2> Produit n°1 </h2>
          <span> 320€ </span>
        </div>
        <div class="recommandations-item-info-button">
          <button> Voir ce produit </button>
        </div>
      </div>
    </div>
    <div class="recommandations-item">
      <div class="recommandations-item-brand">
        <img src="https://via.placeholder.com/50">
      </div>
      <div class="recommandations-item-infos">
        <div class="recommandations-item-info-brand">
          <h2> Produit n°1 </h2>
          <span> 320€ </span>
        </div>
        <div class="recommandations-item-info-button">
          <button> Voir ce produit </button>
        </div>
      </div>
    </div>
    <div class="recommandations-item">
      <div class="recommandations-item-brand">
        <img src="https://via.placeholder.com/50">
      </div>
      <div class="recommandations-item-infos">
        <div class="recommandations-item-info-brand">
          <h2> Produit n°1 </h2>
          <span> 320€ </span>
        </div>
        <div class="recommandations-item-info-button">
          <button> Voir ce produit </button>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include('template/parts/footer.php'); ?>