<?php 

  session_start();
  $title = "Nos produits";

?>

<?php include('template/parts/header.php'); ?>
<?php include('template/parts/navbar.php'); ?>

<!-- hisense.global.com exemple catégories -->

  <div class="product-container">
    <div class="product-container-title">
      <h1> Nos produits </h1>
    </div>
    <div class="product-container-content" id="prod-cat">
    <?php 
    // $categories = [
    //   'categories_name' => 'smartphone',
    //   'subcategories' => ['Apple', 'Samsung', 'Huawei', 'Xiaomi', 'Google']
    // ];
    function getCategories($subcategories){
      ?>
      
      <div class="Swiper CatSwiper">
      <div class="product-cat-title">
          <div class="product-cat-title-content">
              <h2>Catégories</h2>
            </div>
          <div class="product-cat-subcategories"></div>
      </div>
        <div class="swiper-wrapper">
          <div class="swiper-slide" data-nav-title="Catégories 1">
              <div class="product-content">
                <div class="product-content-image">
                  <img src="assets/img/tv-1.jpg" alt="">
                </div>
                <div class="product-cat-infos">
                  <div class="product-cat-infos-brand">
                    <span>New</span>
                    <h3>ULED 8K TV U80G</h3>
                  </div>
                  <div class="product-cat-infos-more">
                    <a href="#"><button>More</button></a>
                    <a href="#">View all TV</a>
                  </div>
                </div>
            </div>
          </div>
          <div class="swiper-slide" data-nav-title="Catégories 2">
            <div class="product-content"> 
              <div class="product-content-image">
                <img src="assets/img/tv-2.jpg" alt="">
              </div> 
              <div class="product-cat-infos">
                <div class="product-cat-infos-brand">
                  <span>New</span>
                  <h3>ULED 8K TV U80G</h3>
                </div>
                <div class="product-cat-infos-more">
                  <a href="#"><button>More</button></a>
                  <a href="#">View all TV</a>
                </div>
              </div>
          </div>
        </div>
          
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </div>

  <?php 
    } 
  getCategories(1);
  ?>
  </div>
  </div>

  
<?php include('template/parts/footer.php'); ?>