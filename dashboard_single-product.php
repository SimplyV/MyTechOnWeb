<?php 

  session_start();
  $title = "Dashboard";
  global $router;

  include 'template/parts/header.php';
?>
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
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= $router->generate('page',['pageslug'=> 'dashboard']);?>">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('page',['pageslug'=> 'dashboard_orders']);?>">
              <span data-feather="file"></span>
              Commandes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= $router->generate('page',['pageslug'=> 'dashboard_products']);?>">
              <span data-feather="shopping-cart"></span>
              Produits
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('page',['pageslug'=> 'dashboard_users']);?>">
              <span data-feather="users"></span>
              Clients
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('page',['pageslug'=> 'dashboard_reviews']);?>">
              <span data-feather="bar-chart-2"></span>
              Avis produits
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Ajouter un produit  </h1>   
      </div>
      <div class="product-add-container">
          <form action="add_product.php" method="POST" enctype="multipart/form-data">
            <div class="product-add-col">
                <div class="product-add-name">
                  <label for="name"> Nom du produit </label>
                  <input type="text" name="name" placeholder="Nom du produit">
              </div>
              <div class="product-add-subname">
                <div class="product-add-category">
                  <label for="name"> Catégorie du produit </label>
                  <select type="text" name="category" required>
                    <option> 1</option> 
                    <option> 2</option> 
                    <option> 3</option> 
                    <option> 4</option> 
                  </select>
                </div>
                <div class="product-add-price">
                  <label for="price"> Prix </label>
                  <input type="number" name="price" placeholder="0" required>
                </div>
              </div>
              <div class="product-add-brand">
                <label for="brand"> Marque </label>
                <input type="text" name="brand" placeholder="Marque du produit" required>
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
                      <div class="plcholder-img">
                        <img src="#">
                      </div>           
                      <i class="fa-solid fa-image"></i>
                      <input type="file" name="image-first" required>
                    </div>
                    <div class="p-img-plcholder-big">
                    <div class="plcholder-img">
                        <img src="#">
                      </div>           
                      <i class="fa-solid fa-image"></i>
                      <input type="file" name="image-second" required>
                    </div>
                    <div class="p-img-plcholder-big">   
                      <div class="plcholder-img">
                        <img src="#">
                      </div>           
                      <i class="fa-solid fa-image"></i>
                      <input type="file" name="image-first" required>
                    </div>
                    <div class="p-img-plcholder-big">
                    <div class="plcholder-img">
                        <img src="#">
                      </div>           
                      <i class="fa-solid fa-image"></i>
                      <input type="file" name="image-second" required>
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

