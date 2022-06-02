<?php

  $_SESSION['prev_loc'] = $attempt;

  if(check($_GET['prod_id'])){

    $donnees = $bdd->query('SELECT id FROM products');
    while($reponse = $donnees->fetch()){
      $id[] = $reponse['id'];
    }
    if(!in_array($_GET['prod_id'], $id)){
      header('Location: 404');
      die;
    }
  
    $product = $_GET['prod_id'];

    if(check($_SESSION['id_user'])){
      $datawishlist = $bdd->prepare('SELECT * FROM wishlist WHERE user_id=:user_id');
      $datawishlist->execute([':user_id' => $_SESSION['id_user']]);
      while($reponsewishlist = $datawishlist->fetch()){ 
        $id_product_wishlist[] = $reponsewishlist['product_id'];
      }
    }


    $donnees = $bdd->prepare('SELECT * FROM products WHERE id=:product_id');
    $donnees->execute([':product_id' => $product]);
    while ($reponse = $donnees->fetch()){
        $prodname = $reponse["name"];
        $price = $reponse['price'];
        $introduction = $reponse['introduction'];
        $description = $reponse['description'];
        $perks = $reponse['perks'] ?? '';
    }
    $donnees = $bdd->prepare('SELECT * FROM products WHERE id=:product_id');
    $donnees->execute([':product_id' => $product]);


  }
  else{
    header('Location: 404');
  }
?>

<div class="single-product-container">
    <div class="single-product-main">
      <div class="single-product-images">
        <div class="swiper singleImageSwiper">
          <div class="swiper-wrapper">
            <?php 
             while ($reponse = $donnees->fetch()){
              $imageFilename = getFiles('assets/img/product_images/'.$reponse['id'].'');
              unset($imageFilename['2']);
              foreach($imageFilename as $imageItem){
           
            ?>
               <div class="swiper-slide"><img src="assets/img/product_images/<?php echo $reponse['id']?>/<?php echo $imageItem ?>"></div>
            <?php
            }}
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
            <form action="<?= $router->generate('addbasket'); ?>" method="POST">
              <input type="number" name="quantity_prod" min="1" max="999" value="1" required>
              <input type="hidden" name="id_product" value="<?php echo $product ?>">
              <input type="hidden" name="product_price" value="<?php echo $price ?>">
              <button type="submit"> Ajouter au panier </button>
            </form>
          </div>
          <div class="single-product-infos-subheader-favorite"> 
          <?php if($_SESSION['verify']){ ?> 
            <?php if(in_array($product,$id_product_wishlist)){ ?>
              <a href="wishlistprocess?id_prod=<?php echo $product?>"><button class="active"><i class="fa-solid fa-heart"></i>Supprimer des favoris </button></a>
            <?php } else {?>
              <a href="wishlistprocess?id_prod=<?php echo $product?>"><button> <i class="fa-solid fa-heart"></i>Ajouter au favoris</button></a>
          <?php } ?>
        <?php } else{ ?>
          <a href="<?= $router->generate('login'); ?>"><button><i class="fa-solid fa-heart"></i> Ajouter au favoris</button></a>
        <?php  } ?>
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
          <p><?php echo $perks ?></p>
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

