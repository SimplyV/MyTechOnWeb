<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= $router->generate('backend',['backendslug'=> 'dashboard']);?>">
              <span data-feather="home"></span>
              Produits
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('backend',['backendslug'=> 'orders']);?>">
              <span data-feather="file"></span>
              Commandes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('backend',['backendslug'=> 'users']);?>">
              <span data-feather="users"></span>
              Clients
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('backend', ['backendslug'=> 'reviews']);?>">
              <span data-feather="bar-chart-2"></span>
              Avis produits
            </a>
          </li>
        </ul>
      </div>
    </nav>