<?php 

  if(check($_GET['id'])){
    $product_id = $_GET['id'];
  }
  else{
<<<<<<< HEAD:app/backend/modify-product.php
    header('Location: app/backend/dashboard');
=======
    header('Location: backend/dashboard');
>>>>>>> b55c60ca3f618f598e4c38a12fa0493f433c238f:backend/modify-product.php
  }

  $joinquery = $bdd->prepare('SELECT products.id, products.name, products.price, products.perks, products.introduction, products.description, category.name, category.id
  FROM products 
  INNER JOIN product_category ON products.id=product_category.product_id 
  INNER JOIN category ON product_category.category_id = category.id 
  WHERE products.id =:product_id 
  GROUP BY products.id');
  $joinquery->execute([':product_id' => $product_id]);

  while($reponse = $joinquery->fetch()){
    $productname = $reponse[1];
    $categoryname = $reponse['name'];
    $price = $reponse['price'];
    $perks = $reponse['perks'];
    $introduction = $reponse['introduction'];
    $description = $reponse['description'];
    $categoryid = $reponse[7]; 
  }
  $imageFilename = getFiles('assets/img/product_images/'.$product_id.'');
  unset($imageFilename['2']);

  if(check($imageFilename['3'])){
    $firstimage = $imageFilename['3'];
  }
  if(check($imageFilename['4'])){
    $secondimage = $imageFilename['4'];
  }
  if(check($imageFilename['5'])){
    $thirdimage = $imageFilename['5'];
  }

?>


<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/MyTechOnWebS/">MyTechOnWebS</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="form-control form-control-dark w-100h" style="padding: 24px;"></div>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="<?= $router->generate('page',['pageslug'=> 'logout']);?>">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <?php include 'includes/backend-nav.php'; ?>
  
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Ajouter un produit  </h1>   
      </div>
      <div class="product-add-container">
          <form action="<?= $router->generate('modifyproduct'); ?>" method="POST" enctype="multipart/form-data">
            <div class="product-add-col">
                <div class="product-add-name">
                  <label for="name"> Nom du produit </label>
                  <input type="text" name="name" placeholder="Nom du produit" value="<?php echo $productname ?>">
              </div>
              <div class="product-add-subname">
                <div class="product-add-category">
                  <label for="name"> Catégorie du produit </label>
                  <select type="text" name="category" required>
                    <?php 
                     $donnees = $bdd->query('SELECT id, name FROM category');
                     while ($reponse = $donnees->fetch()){ ?>
                      <?php if ($reponse['id'] == $categoryid) {?>
                        <option value="<?php echo $reponse['id']; ?>" selected><?php echo $reponse['name']; ?></option> 
                      <?php } else{ ?>
                        <option value="<?php echo $reponse['id']; ?>"><?php echo $reponse['name']; ?></option> 
                      <?php } ?>
                    <?php 
                   }
                   $donnees->closeCursor();
                ?>
                  </select>
                </div>
                <div class="product-add-price">
                  <label for="price"> Prix </label>
                  <input type="number" name="price" placeholder="0" value="<?php echo $price ?>" required>
                </div>
              </div>
              <div class="product-add-perks">
                <label for="brand"> Caractéristiques </label>
                <textarea type="text" name="perks" placeholder="Caractéristiques du produit" required><?php echo $perks ?></textarea>
              </div>
              <div class="product-add-description">
                <label for="introduction"> Introduction du produit </label>
                <textarea name="introduction" placeholder="Entrez une introduction du produit..." required><?php echo $introduction ?></textarea>
              </div>
              <div class="product-add-description">
                <label for="description"> Description du produit </label>
                <textarea name="description" placeholder="Entrez une description du produit..." required><?php echo $description ?></textarea>
              </div>
            </div>
            <div class="product-add-col">
              <div class="product-add-images">
                <div class="product-add-images-title">
                  <h2> Images du produit </h2>
                </div>
                <div class="product-add-images-content">
                   <div class="product-add-images-item">
                     <div class="product-add-image-item-brand">
                       <img src="#">
                     </div>
                     <div class="product-add-image-item-actions">
                       <label for="imageproduct">
                         <span> Ajouter une image </span>
                         <i class="fa-solid fa-file-image"></i>
                         <input type="file" accept="image/*">
                        </label>
                       
                     </div>
                   </div>
                </div>


                <div class="product-image-placeholder">
                  <div class="product-image-placeholder-brand">
                    <div class="p-img-plcholder-big">   
                      <div class="file-wrapper">
                        <div class="file-upload">
                          <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )"><i
                              class="fas fa-plus"> </i></button>
                          <div class="image-upload-wrap">
                            <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="image_prod"
                               />
                            <div class="drag-text">
                              <h3>Appuyer sur le bouton + pour ajouter une image</h3>
                            </div>
                          </div>
                          <div class="file-upload-content" style="display: block;">
                            <img class="file-upload-image" src="../assets/img/product_images/<?php echo $product_id ?>/<?php echo $firstimage ?>" alt="your image" />
                            <div class="image-title-wrap">
                              <button type="button" onclick="removeUpload()" class="remove-image">Supprimer <span
                                  class="image-title">Uploaded Image</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="p-img-plcholder-big">
                    <div class="file-wrapper">
                        <div class="file-upload">
                          <button class="file-upload-btn" type="button" onclick="$('.file-upload-input-1').trigger( 'click' )"><i
                              class="fas fa-plus"> </i></button>
                          <div class="image-upload-wrap-1">
                            <input class="file-upload-input-1" type='file' onchange="readURL1(this);" accept="image/*" name="image_prod_1"
                               />
                            <div class="drag-text">
                              <h3>Appuyer sur le bouton + pour ajouter une image</h3>
                            </div>
                          </div>
                          <div class="file-upload-content-1" style="display: block;">
                            <img class="file-upload-image-1" src="../assets/img/product_images/<?php echo $product_id ?>/<?php echo $secondimage ?>" alt="your image" />
                            <div class="image-title-wrap">
                              <button type="button" onclick="removeUpload1()" class="remove-image">Supprimer <span
                                  class="image-title-1">Uploaded Image</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="p-img-plcholder-big">
                    <div class="file-wrapper">
                        <div class="file-upload">
                          <button class="file-upload-btn" type="button" onclick="$('.file-upload-input-2').trigger( 'click' )"><i
                              class="fas fa-plus"> </i></button>
                          <div class="image-upload-wrap-2">
                            <input class="file-upload-input-2" type='file' onchange="readURL2(this);" accept="image/*" name="image_prod_2"
                               />
                            <div class="drag-text">
                              <h3>Appuyer sur le bouton + pour ajouter une image</h3>
                            </div>
                          </div>
                          <div class="file-upload-content-2" style="display: block;">
                            <img class="file-upload-image-2" src="../assets/img/product_images/<?php echo $product_id ?>/<?php echo $thirdimage ?>" alt="your image" />
                            <div class="image-title-wrap">
                              <button type="button" onclick="removeUpload2()" class="remove-image">Supprimer <span
                                  class="image-title-2">Uploaded Image</span></button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  
                  
                </div>
              </div>
              <div class="product-add-article">
                <input type="hidden" name="id" value="<?php echo $product_id ?>">
                <button class="btn btn-primary"type="submit"> Modifier cet article </button>
              </div>
            </div>
          </form>
        </div>
          
      </div>
      
    </main>
  </div>
</div>


