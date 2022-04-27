<?php 

  session_start();
  $title = "Nos produits";

?>

<?php include('template/parts/header.php'); ?>
<?php include('template/parts/navbar.php'); ?>

<div class="cat-prod-header">
  <h1> Nos produits </h1>
</div>

<div class="cat-prod-products">
  <div class="cat-prod-products-title">
    <h2> Découvrez nos produits </h2>
  </div>
  <div class="cat-prod-products-content">
  <?php 
    $donnees = $bdd->query('SELECT id, name, price, product_image FROM products');
    while ($reponse = $donnees->fetch()){ ?>
    <?php 
      $array = explode(",", $reponse['product_image']);
      $firstLine = $array[0];
      ?>
      <div class="product-list-item">
        <div class="prod-list-item-brand" style="background-image: url('assets/img/product_images/<?php echo $firstLine ?>');">
          <button> <i class="fa-solid fa-heart"></i></button>
        </div>
        <div class="prod-list-item-content">
          <div class="prod-list-item-content-title">
            <h3><a href="single-product?prod_id=<?php echo $reponse['id'];?>"> <?php echo $reponse['name']; ?> </a></h3>
          </div>
          <div class="prod-list-item-content-infos">
            <div class="prod-list-item-price">
              <span> <?php echo $reponse['price']; ?> €</span>
            </div>
            <div class="prod-list-item-button">
              <button> <i class="fa-solid fa-cart-shopping"></i></button>
            </div>
          </div>
        </div>
      </div>
    <?php 
  }
  $donnees->closeCursor();
  ?>
    </div>
      
      
        
    

<div class="cat-prod-container">
  <div class="cat-prod-title">
    <h2> Nos produits par catégories </h2>
  </div>
  <div class="cat-prod-content">

  <?php 
    $donnees = $bdd->query('SELECT id, name, cover_image FROM category');
    while ($reponse = $donnees->fetch()){ ?>
       <div class="cat-prod-block">
          <a href="products_list?cat=<?php echo $reponse['id']; ?>">
            <span> <?php echo $reponse['name']?> </span>
            <img src="assets/img/category_images/<?php echo $reponse['cover_image']?>">
          </a>
    </div>
    <?php 
  }
  $donnees->closeCursor();
  ?>
    
   
  
    

  </div>
</div>

 
<?php include('template/parts/footer.php'); ?>