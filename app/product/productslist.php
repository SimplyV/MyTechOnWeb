<?php 

  if(check($_GET['cat'])){
    $categories = $_GET['cat'];

    $donnees = $bdd->prepare('SELECT * FROM category WHERE id=:category_id');
    $donnees->execute([':category_id' => $categories]);

    while ($reponse = $donnees->fetch()){
        $catname = $reponse['name'];
        $category_id[] = $reponse['id']; 
    }

<<<<<<< HEAD:app/product/productslist.php
    if(isset($_SESSION['id_user'])){
=======
    if(check($_SESSION['id_user'])){
>>>>>>> b55c60ca3f618f598e4c38a12fa0493f433c238f:product/productslist.php
      $datawishlist = $bdd->prepare('SELECT * FROM wishlist WHERE user_id=:user_id');
      $datawishlist->execute([':user_id' => $_SESSION['id_user']]);
      while($reponsewishlist = $datawishlist->fetch()){ 
      $id_product_wishlist[] = $reponsewishlist['product_id'];
      }
    }
    
  }
  else{
    $donnees = $bdd->query('SELECT name FROM category WHERE id=1');
    while ($reponse = $donnees->fetch()){
        $catname = $reponse['name'];
    }
  }
   $imageFilename = getFiles('assets/img/category_images/'.$_GET['cat'].''); 
?>

<div class="product-list-header" style="background-image: url('assets/img/category_images/<?php echo $_GET['cat'] ?>/<?php echo $imageFilename['3'] ?>')">
  <h1><?php if(!empty($catname)){echo $catname;} ?></h1>
</div>

<div class="product-list-container">
  <div class="product-list-content">
    <div class="product-list-content-topbar">
      <!-- <div class="product-list-filters">
        <button id="showFilters"> Filtres </button>
      </div> -->
      <div class="product-list-search">
        <form action="<?= $router->generate('search'); ?>">
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
        <?php 
        $donnees = $bdd->prepare('SELECT products.id, products.name, products.price FROM products JOIN product_category ON products.id = product_category.product_id WHERE product_category.category_id=:category_id');
        $donnees->execute([':category_id' => $categories]);
        while ($reponse = $donnees->fetch()){ ?>
        <?php $imageFilename = getFiles('assets/img/product_images/'.$reponse['id'].''); ?>
        <div class="product-list-item">
            <div class="prod-list-item-brand" style="background-image: url('assets/img/product_images/<?php echo $reponse['id'] ?>/<?php echo $imageFilename['3']?> ');">
            <?php if($_SESSION['verify']){ ?> 
              <?php if(in_array($reponse['id'],$id_product_wishlist)){ ?>
                <a href="wishlistprocess?id_prod=<?php echo $reponse['id']?>"><button class="active"> <i class="fa-solid fa-heart"></i></button></a>
              <?php } else {?>
                <a href="wishlistprocess?id_prod=<?php echo $reponse['id']?>"><button> <i class="fa-solid fa-heart"></i></button></a>
            <?php } ?>
          <?php } else{ ?>
            <a href="<?= $router->generate('login'); ?>"><button><i class="fa-solid fa-heart"></i></button></a>
          <?php  } ?>
            </div>
            <div class="prod-list-item-content">
              <div class="prod-list-item-content-title">
                <h3><a href="singleproduct?prod_id=<?php echo $reponse['id'];?>"> <?php echo $reponse['name']; ?> </a></h3>
              </div>
              <div class="prod-list-item-content-infos">
                <div class="prod-list-item-price">
                  <span> <?php echo $reponse['price']; ?> €</span>
                </div>
                <div class="prod-list-item-button">
                  <form action="<?= $router->generate('addbasket'); ?>" method="POST">
                    <button> <i class="fa-solid fa-cart-shopping"></i></button>
                    <input type="hidden" name="quantity_prod" value="1" required>
                    <input type="hidden" name="id_product" value="<?php echo $reponse['id'] ?>">
                     <input type="hidden" name="product_price" value="<?php echo $reponse['price'] ?>">
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php 
          }
          $donnees->closeCursor();
          ?>
      </div>
    </div>
  </div>
</div>

