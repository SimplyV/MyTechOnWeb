
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

  <div class="home-about">
    <div class="home-about-image">
      <img src="assets/img/about.jpg" alt="">
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
            <img src="assets/img/avatar1.jpg" alt="">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quaerat harum iure pariatur praesentium asperiores quidem, ipsum voluptatum voluptas, animi ab veritatis. Vitae cum, rerum deleniti incidunt nisi corrupti esse!</p>
          </div>
          <div class="swiper-slide">
            <img src="assets/img/avatar2.jpg" alt="">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quaerat harum iure pariatur praesentium asperiores quidem, ipsum voluptatum voluptas, animi ab veritatis. Vitae cum, rerum deleniti incidunt nisi corrupti esse!</p>
          </div>
          <div class="swiper-slide">
            <img src="assets/img/avatar3.jpg" alt="">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quaerat harum iure pariatur praesentium asperiores quidem, ipsum voluptatum voluptas, animi ab veritatis. Vitae cum, rerum deleniti incidunt nisi corrupti esse!</p>
          </div>
          <div class="swiper-slide">
            <img src="assets/img/avatar4.jpg" alt="">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quaerat harum iure pariatur praesentium asperiores quidem, ipsum voluptatum voluptas, animi ab veritatis. Vitae cum, rerum deleniti incidunt nisi corrupti esse!</p>
          </div>
          <div class="swiper-slide">
            <img src="assets/img/avatar5.jpg" alt="">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quaerat harum iure pariatur praesentium asperiores quidem, ipsum voluptatum voluptas, animi ab veritatis. Vitae cum, rerum deleniti incidunt nisi corrupti esse!</p>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
  </div>
  