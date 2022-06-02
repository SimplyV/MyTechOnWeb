<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="<?= $router->generate('page',['pageslug'=> 'accueil']); ?>">MyTechOnWebS</a>
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
          <form action="<?= $router->generate('addproduct'); ?>" method="POST" enctype="multipart/form-data">
            <div class="product-add-col">
                <div class="product-add-name">
                  <label for="name"> Nom du produit </label>
                  <input type="text" name="name" placeholder="Nom du produit">
              </div>
              <div class="product-add-subname">
                <div class="product-add-category">
                  <label for="name"> Catégorie du produit </label>
                  <select type="text" name="category" required>
                    <?php 
                     $donnees = $bdd->query('SELECT id, name FROM category');
                     while ($reponse = $donnees->fetch()){ ?>
                      <option value="<?php echo $reponse['id']; ?>"><?php echo $reponse['name']; ?></option> 
                    <?php 
                   }
                   $donnees->closeCursor();
                ?>
                  </select>
                </div>
                <div class="product-add-price">
                  <label for="price"> Prix </label>
                  <input type="number" name="price" placeholder="0" required>
                </div>
              </div>
              <div class="product-add-perks">
                <label for="brand"> Caractéristiques </label>
                <textarea type="text" name="perks" placeholder="Caractéristiques du produit" required></textarea>
              </div>
              <div class="product-add-description">
                <label for="introduction"> Introduction du produit </label>
                <textarea name="introduction" placeholder="Entrez une introduction du produit..." required></textarea>
              </div>
              <div class="product-add-description">
                <label for="description"> Description du produit </label>
                <textarea name="description" placeholder="Entrez une description du produit..." required></textarea>
              </div>
            </div>
            <div class="product-add-col">
              <div class="product-add-images">
                <div class="product-add-images-title">
                  <h2> Images du produit </h2>
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
                              required />
                            <div class="drag-text">
                              <h3>Appuyer sur le bouton + pour ajouter une image</h3>
                            </div>
                          </div>
                          <div class="file-upload-content">
                            <img class="file-upload-image" src="#" alt="your image" />
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
                              required />
                            <div class="drag-text">
                              <h3>Appuyer sur le bouton + pour ajouter une image</h3>
                            </div>
                          </div>
                          <div class="file-upload-content-1">
                            <img class="file-upload-image-1" src="#" alt="your image" />
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
                              required />
                            <div class="drag-text">
                              <h3>Appuyer sur le bouton + pour ajouter une image</h3>
                            </div>
                          </div>
                          <div class="file-upload-content-2">
                            <img class="file-upload-image-2" src="#" alt="your image" />
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
                <button class="btn btn-primary"type="submit"> Ajouter cet article </button>
              </div>
            </div>
          </form>
        </div>
          
      </div>
      
    </main>
  </div>
</div>

<script src="../assets/js/form-image.js"></script>
