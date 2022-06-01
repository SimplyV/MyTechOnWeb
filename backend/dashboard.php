<?php 

  $donnees = $bdd->query('SELECT * FROM products');

?>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="<?= $router->generate('page',['pageslug'=> 'accueil']); ?>">MyTechOnWebS</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="form-control form-control-dark w-100h" style="padding: 24px;"></div>  <div class="navbar-nav">
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
        <h1 class="h2">Dashboard</h1>
        <a href="<?= $router->generate('backend',['backendslug'=> 'dashboard_single-product']);?>"><button class="btn btn-primary"> Ajouter un produit</button></a>
      </div>

      
      <h2>Produits </h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Introduction</th>
              <th scope="col">Prix</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              while ($reponse = $donnees->fetch()){ ?>
              <tr class="row-tr">
                <td><?php echo $reponse['id']; ?></td>
                <td><?php echo $reponse['name']; ?></td>
                <td><?php echo $reponse['introduction']; ?></td>
                <td><?php echo $reponse['price']; ?>€</td>
                <td>
                  <a href="dashboard_modify-product?id=<?php echo $reponse['id'] ?>">
                    <button class="btn btn-primary"> Modifier</button>
                  </a>
                  <form action="<?= $router->generate('removeproduct'); ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $reponse['id'] ?>">
                    <button class="btn btn-danger"> Supprimer</button>
                  </form>
                </td>
              </tr>

            <?php 
              } 
              $donnees->closeCursor();
            ?>
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

