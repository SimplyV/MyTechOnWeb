<?php 
  session_start();
  $categories = $_GET['categories'];
  $title = "Listing des produits";
?>
<?php include('template/parts/header.php'); ?>
<?php include('template/parts/navbar.php'); ?>

<div class="product-list-header">
  <h1> Smartphones </h1>
</div>

<div class="product-list-container">
  <div class="product-list-title">
    <h2> Tous les smartphones </h2>
  </div>
  <div class="product-list-content">
    <div class="product-list-content-topbar">
      <div class="product-list-filters">
        <button id="showFilters"> Filtres </button>
      </div>
      <div class="product-list-search">
        <form action="prod_search.php">
          <input type="text" name="search" autocomplete="off" placeholder="Votre recherche..." required>
          <i class="fa-solid fa-magnifying-glass"></i>
        </form>
      </div>
    </div>
    <div class="product-list-content-products">
      <div class="product-list-content-filters" id="filter-cont">
        <form action="filters.php" method="POST">
        <div class="list-price-slider">
          <div class="price-slider-title">
            <h3> Prix </h3>
          </div>
          <div class="price-slider"></div>
          <div class="list-price-slider-input">
            <input type="number" id="number_price_min">
            <input type="number" id="number_price_max">
          </div> 
        </div>
        <div class="list-brand-filter">
          <div class="list-brand-filter-title">
            <h3> Marques </h3>
          </div>
          <div class="list-brand-filter-content">
          <label class="filter-brand-cont">Marque
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>     
          </div>
          <div class="list-filters-submit">
            <button type="submit"> Filtrer </button>
          </div>
        </div>
        </form>
      </div>
      <div class="product-list-content-items">
        <div class="product-list-item">
          <div class="prod-list-item-brand">
            <button> <i class="fa-solid fa-heart"></i></button>
          </div>
          <div class="prod-list-item-content">
            <div class="prod-list-item-content-title">
              <h3> Produit n°1 </h3>
            </div>
            <div class="prod-list-item-content-infos">
              <div class="prod-list-item-price">
                <span> 345 €</span>
              </div>
              <div class="prod-list-item-button">
                <button> <i class="fa-solid fa-cart-shopping"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="product-list-item">
          <div class="prod-list-item-brand">
            <button> <i class="fa-solid fa-heart"></i></button>
          </div>
          <div class="prod-list-item-content">
            <div class="prod-list-item-content-title">
              <h3> Produit n°1 </h3>
            </div>
            <div class="prod-list-item-content-infos">
              <div class="prod-list-item-price">
                <span> 345 €</span>
              </div>
              <div class="prod-list-item-button">
                <button> <i class="fa-solid fa-cart-shopping"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="product-list-item">
          <div class="prod-list-item-brand">
            <button> <i class="fa-solid fa-heart"></i></button>
          </div>
          <div class="prod-list-item-content">
            <div class="prod-list-item-content-title">
              <h3> Produit n°1 </h3>
            </div>
            <div class="prod-list-item-content-infos">
              <div class="prod-list-item-price">
                <span> 345 €</span>
              </div>
              <div class="prod-list-item-button">
                <button> <i class="fa-solid fa-cart-shopping"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="product-list-item">
          <div class="prod-list-item-brand">
            <button> <i class="fa-solid fa-heart"></i></button>
          </div>
          <div class="prod-list-item-content">
            <div class="prod-list-item-content-title">
              <h3> Produit n°1 </h3>
            </div>
            <div class="prod-list-item-content-infos">
              <div class="prod-list-item-price">
                <span> 345 €</span>
              </div>
              <div class="prod-list-item-button">
                <button> <i class="fa-solid fa-cart-shopping"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="product-list-item">
          <div class="prod-list-item-brand">
            <button> <i class="fa-solid fa-heart"></i></button>
          </div>
          <div class="prod-list-item-content">
            <div class="prod-list-item-content-title">
              <h3> Produit n°1 </h3>
            </div>
            <div class="prod-list-item-content-infos">
              <div class="prod-list-item-price">
                <span> 345 €</span>
              </div>
              <div class="prod-list-item-button">
                <button> <i class="fa-solid fa-cart-shopping"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="product-list-item">
          <div class="prod-list-item-brand">
            <button> <i class="fa-solid fa-heart"></i></button>
          </div>
          <div class="prod-list-item-content">
            <div class="prod-list-item-content-title">
              <h3> Produit n°1 </h3>
            </div>
            <div class="prod-list-item-content-infos">
              <div class="prod-list-item-price">
                <span> 345 €</span>
              </div>
              <div class="prod-list-item-button">
                <button> <i class="fa-solid fa-cart-shopping"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include('template/parts/footer.php'); ?>