<?php 

  $_SESSION['prev_loc'] = $attempt;

  if(check($_SESSION['id_user'])){
    $id_user = $_SESSION['id_user'];

    $datawishlist = $bdd->prepare('SELECT * FROM wishlist WHERE user_id=:user_id');
    $datawishlist->execute(['user_id' => $_SESSION['id_user']]);
    while($reponsewishlist = $datawishlist->fetch()){ 
      $id_product_wishlist[] = $reponsewishlist['product_id'];
    }

  }

  $donnees = $bdd->query('SELECT * FROM products');

?>


<div class="cat-prod-header">
  <h1> Nos produits </h1>
</div>

<div class="cat-prod-products">
  <div class="cat-prod-products-title">
    <h2> Découvrez nos produits </h2>
  </div>
  <div class="cat-prod-products-content">
  <?php 
    
    while ($reponse = $donnees->fetch()){ ?>
    <?php 
      $imageFilename = getFiles('assets/img/product_images/'.$reponse['id'].'');
    ?>


      <div class="product-list-item">
        <div class="prod-list-item-brand" style="background-image: url('assets/img/product_images/<?php echo $reponse['id']?>/<?php echo $imageFilename['3']?>');">

        <?php if($_SESSION['verify']){ ?> 
            <?php if(in_array($reponse['id'],$id_product_wishlist)){ ?>
              <a href="wishlistprocess?id_prod=<?php echo $reponse['id']?>"><button class="active"> <i class="fa-solid fa-heart"></i></button></a>
            <?php } else {?>
              <a href="wishlistprocess?id_prod=<?php echo $reponse['id']?>"><button> <i class="fa-solid fa-heart"></i></button></a>
          <?php } ?>
        <?php } else{ ?>
          <a href="<?= $router->generate('page',['pageslug'=> 'login']); ?>"><button><i class="fa-solid fa-heart"></i></button></a>
        <?php  } ?>

        </div>
        <div class="prod-list-item-content">
          <div class="prod-list-item-content-title">
            <h3><a href="singleproduct?prod_id=<?php echo $reponse['id']?>"><?php echo $reponse['name'] ?></a></h3>
          </div>
          <div class="prod-list-item-content-infos">
            <div class="prod-list-item-price">
              <span><?php echo $reponse['price']?> €</span>
            </div>
            <div class="prod-list-item-button">
              <form action="<?= $router->generate('addbasket'); ?>" method="POST">
                <input type="hidden" name="quantity_prod" value="1" required>
                <input type="hidden" name="id_product" value="<?php echo $reponse['id'] ?>">
                <input type="hidden" name="product_price" value="<?php echo $reponse['price'] ?>">
                <button> <i class="fa-solid fa-cart-shopping"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php 
  }
  ?>
    </div>
</div>
      
        
    

<div class="cat-prod-container">
  <div class="cat-prod-title">
    <h2> Nos produits par catégories </h2>
  </div>
  <div class="cat-prod-content">

  <?php 
    $donnees = $bdd->query('SELECT id, name FROM category');
    while ($reponse = $donnees->fetch()){ ?>
    <?php $imageFilename = getFiles('assets/img/category_images/'.$reponse['id'].''); ?>
       <div class="cat-prod-block">
          <a href="productslist?cat=<?php echo $reponse['id']; ?>">
            <span> <?php echo $reponse['name']?> </span>
            <img src="assets/img/category_images/<?php echo $reponse['id']?>/<?php echo $imageFilename['4'];?>">
          </a>
    </div>
    <?php 
  }
  $donnees->closeCursor();
  ?>

  </div>
</div>