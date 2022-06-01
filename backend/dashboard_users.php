<?php 
  $donnees = $bdd->query('SELECT * FROM users');
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
        <h1 class="h2"> Utilisateurs </h1>   
      </div>

    
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID Client</th>
              <th scope="col">Prénom </th>
              <th scope="col">Nom</th>
              <th scope="col"> Pseudo </th>
              <th scope="col"> Adresse e-mail </th>
              <th scope="col"> Action </th>
            </tr>
          </thead>
          <tbody>
          <?php 
              while ($reponse = $donnees->fetch()){ ?>
              <tr>
                <td><?php echo $reponse['id_user']; ?></td>
                <td><?php echo $reponse['firstname']; ?></td>
                <td><?php echo $reponse['lastname']; ?></td>
                <td><?php echo $reponse['nickname']; ?></td>
                <td><?php echo $reponse['email']; ?></td>
                <td><button class="btn btn-danger"> Supprimer </button></td>
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

