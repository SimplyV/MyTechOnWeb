<?php
  session_start();
  $title = "Page produit";
?>
<?php include('template/parts/header.php'); ?>
<?php include('template/parts/navbar.php'); ?>

<div class="single-product-container">
    <div class="single-product-main">
      <div class="single-product-images">
        <div class="swiper singleImageSwiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://via.placeholder.com/150"></div>
            <div class="swiper-slide"><img src="https://via.placeholder.com/150"></div>
            <div class="swiper-slide"><img src="https://via.placeholder.com/150"></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
      <div class="single-product-infos">
        <div class="single-product-infos-header">
          <div class="single-product-infos-title">
            <h2> Produit n°1 </h2>
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
            <h3> 100€</h3>
          </div>
        </div>
        <div class="single-product-infos-subheader">
          <div class="single-product-infos-subheader-description">
            <p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam placeat commodi impedit alias libero doloremque minus perspiciatis. Quasi nulla cumque libero vel quaerat. Earum fuga perspiciatis, fugiat id saepe laborum.</p>
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
    <div class="single-product-description">
      <div class="single-product-description-title">
        <h2> Description de l'article </h2>
      </div>
      <div class="single-product-description-content">
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi rem maiores magni eos totam ipsa explicabo praesentium unde voluptatem iusto deserunt perferendis cum, voluptate accusamus, a, earum laboriosam temporibus repudiandae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus vitae enim perferendis cumque quaerat commodi molestiae asperiores libero doloribus fuga ratione laboriosam et quas, architecto at dolor. Aut, illum praesentium.</p>
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