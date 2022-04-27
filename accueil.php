<?php

  session_start();
  $title = "Acceuil";

  include 'template/parts/db.php';


?>
<?php include('template/parts/header.php'); ?>
<?php include('template/parts/navbar.php');?>

  <div class="featured-product-swiper">
    <div class="swiper featuredSwiper">
      <div class="swiper-wrapper">
        <a class="swiper-slide" href="#">
          
        </a>
        <div class="swiper-slide">
          Slide 2
        </div>
        <div class="swiper-slide">
          Slide 3
        </div>
        <div class="swiper-slide">
          Slide 4
        </div>
        <div class="swiper-slide">
          Slide 5
        </div>
      </div>
    </div>
  </div>

  <div class="products-showcase">
    <div class="products-showcase-title">
      <h2> Produits populaires</h2>
    </div>
    <div class="products-showcase-swiper">
      <div class="swiper popularProdSwiper">
        <div class="swiper-wrapper">
          <a class="swiper-slide" href="#">
            <div>
              <span> Article °1 </span>
            </div>
          </a>
          <a class="swiper-slide">
            <div>
                <span> Article °1 </span>
              </div>
            </a>
          <a class="swiper-slide">
            <div>
                <span> Article °1 </span>
              </div>
            </a>
          <a class="swiper-slide">
            <div>
                <span> Article °1 </span>
              </div>
            </a>
          <a class="swiper-slide">
            <div>
                <span> Article °1 </span>
              </div>
            </a>
          <a class="swiper-slide">
            <div>
                <span> Article °1 </span>
            </div>
          </a>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
       </div>
      </div>
  </div>

  <div class="categories-showcase">
  <div class="categories-showcase-title">
      <h2> Catégories populaires</h2>
    </div>
    <div class="categories-showcase-swiper">
      <div class="swiper popularCatSwiper">
        <div class="swiper-wrapper">
        <?php 
            $donnees = $bdd->query('SELECT id, name, cover_image FROM category');
            while ($reponse = $donnees->fetch()){ ?>
              <a class="swiper-slide" style="background-image: url('assets/img/category_images/<?php echo $reponse['cover_image'] ?>');">
                <span> <?php echo $reponse['name']?> 
              </a>
            <?php 
          }
          $donnees->closeCursor();
        ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
       </div>
      </div>
  </div>
  
<?php include('template/parts/footer.php'); ?>