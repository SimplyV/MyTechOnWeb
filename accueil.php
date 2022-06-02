<?php

  $donnees = $bdd->query('SELECT * from products LIMIT 5');
 
?>

  <div class="featured-product-header">
    <div class="featured-prod-text">
      <h1> Bienvenue sur <br><b>MyTechOnWebS.</b></h1>
      <p> Vous retrouverez ici un large assortiment de produits éléctroniques.</p>
    </div>
    <div class="featured-prod-img">
      <img src="assets/img/utilities/header-section.svg">
    </div>
  </div>

  <div class="products-showcase">
    <div class="products-showcase-title">
      <h2> Produits populaires</h2>
    </div>
    <div class="products-showcase-swiper">
      <div class="swiper popularProdSwiper">
        <div class="swiper-wrapper">
          <?php 
          $donnees = $bdd->query('SELECT * from products LIMIT 6'); 
          while($reponse = $donnees->fetch()){
          $imageFilename = getFiles('assets/img/product_images/'.$reponse['id'].'');
          ?>
          <a class="swiper-slide" href="singleproduct?prod_id=<?php echo $reponse['id'] ?>" style="background-image: url('assets/img/product_images/<?php echo $reponse['id'] ?>/<?php echo $imageFilename['3'];?>')">
            <div>
              <span><?php echo $reponse['name'] ?> </span>
            </div>
          </a>
          <?php }?>
          
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
            $donnees = $bdd->query('SELECT id, name FROM category');
            while ($reponse = $donnees->fetch()){ ?>
            <?php $imageFilename = getFiles('assets/img/category_images/'.$reponse['id'].''); ?>
              <a href="productslist?cat=<?php echo $reponse['id'] ?>"class="swiper-slide" style="background-image: url('assets/img/category_images/<?php echo $reponse['id']?>/<?php echo $imageFilename['4'] ?>');">
                <span> <?php echo $reponse['name']?> </span>
              </a>
            <?php 
          }
        ?>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
       </div>
      </div>
  </div>

  <div class="home-about">
    <div class="home-about-image">
      <img src="assets/img/utilities/about.jpg" alt="">
    </div>
    <div class="home-about-text">
      <h2> À propos</h2>
      <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus laboriosam sunt possimus, esse architecto, reprehenderit magni est vel ipsam itaque veniam molestias velit obcaecati repellat atque quos quisquam quam dolore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus laboriosam sunt possimus, esse architecto, reprehenderit magni est vel ipsam itaque veniam molestias velit obcaecati repellat atque quos quisquam quam dolore.</p>
    </div>
  </div>

  <div class="home-testimonials">
    <div class="home-testimonials-title">
      <h2> Témoignages</h2>
    </div>
      <div class="swiper swiperTestimonials">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="assets/img/utilities/avatar1.jpg" alt="">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quaerat harum iure pariatur praesentium asperiores quidem, ipsum voluptatum voluptas, animi ab veritatis. Vitae cum, rerum deleniti incidunt nisi corrupti esse!</p>
          </div>
          <div class="swiper-slide">
            <img src="assets/img/utilities/avatar2.jpg" alt="">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quaerat harum iure pariatur praesentium asperiores quidem, ipsum voluptatum voluptas, animi ab veritatis. Vitae cum, rerum deleniti incidunt nisi corrupti esse!</p>
          </div>
          <div class="swiper-slide">
            <img src="assets/img/utilities/avatar3.jpg" alt="">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quaerat harum iure pariatur praesentium asperiores quidem, ipsum voluptatum voluptas, animi ab veritatis. Vitae cum, rerum deleniti incidunt nisi corrupti esse!</p>
          </div>
          <div class="swiper-slide">
            <img src="assets/img/utilities/avatar4.jpg" alt="">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quaerat harum iure pariatur praesentium asperiores quidem, ipsum voluptatum voluptas, animi ab veritatis. Vitae cum, rerum deleniti incidunt nisi corrupti esse!</p>
          </div>
          <div class="swiper-slide">
            <img src="assets/img/utilities/avatar5.jpg" alt="">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quaerat harum iure pariatur praesentium asperiores quidem, ipsum voluptatum voluptas, animi ab veritatis. Vitae cum, rerum deleniti incidunt nisi corrupti esse!</p>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
  </div>
  