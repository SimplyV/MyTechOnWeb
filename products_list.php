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
        <button onclick='showFilters()'> Filtres </button>
        <button onclick='showSorting()'> Trier par </button>
      </div>
      <div class="product-list-search">

      </div>
    </div>
    <div class="product-list-content-products">

    </div>
  </div>
</div>


<?php include('template/parts/footer.php'); ?>