<?php 
    session_start();

  try{
    $bdd = new PDO('mysql:host=localhost;dbname=MyTechOnWeb;charset=utf8', 'root', 'root');
  }

  catch(Exception $e){
    die('Erreur : '.$e->getMessage());
  }
  $title = "Acceuil";
  // require 'routes.php';
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
          <a class="swiper-slide" href="#">
            <span> Smartphones </span>
          </a>
          <a class="swiper-slide">
            <span> Ordinateur </span>
          </a>
          <a class="swiper-slide">
            <span> Accessoires </span>
          </a>
          <a class="swiper-slide">
            <span> Tablette </span>
          </a>
          <a class="swiper-slide">
            <span> Écran </span>
          </a>
          <a class="swiper-slide">
            <span> Périphériques </span>
          </a>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
       </div>
      </div>
  </div>
  
<?php include('template/parts/footer.php'); ?>