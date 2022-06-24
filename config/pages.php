<?php

$pages = [];
$pages['app/product/products'] = [
  'title' => 'Nos produits',
  'css' => [
    'assets/css/products.css'
  ]
];
$pages['app/register/register'] = [
  'title' => 'S\'enregistrer',
  'css' => [
    'assets/css/register.css'
  ]
];
$pages['app/login/login'] = [
  'title' => 'Se connecter',
  'css' => [
    'assets/css/login.css'
  ]
];
$pages['app/profile/profile'] = [
  'title' => 'Mon profil',
  'css' => [
    'assets/css/profile.css'
  ]
];
$pages['app/contact/contact'] = [
  'title' => 'Contact',
  'css' => [
    'assets/css/contact.css'
  ]
];
$pages['app/checkout/checkout'] = [
  'title' => 'Mon panier',
  'css' => [
    'assets/css/check.css'
  ]
];
$pages['app/product/productslist'] = [
  'title' => 'Listing des produits',
  'css' => [
    'assets/css/listing_product.css',
    'node_modules/nouislider/dist/nouislider.css'
  ],
  'js' => [
    'node_modules/nouislider/dist/nouislider.min.js'
  ]
];
$pages['app/product/singleproduct'] = [
  'title' => 'Page produit',
  'css' => [
    'assets/css/single_product.css'
  ] 
];
$pages['app/backend/dashboard'] = [
  'title' => 'Dashboard',
  'css' => [
    '../../assets/css/dashboard.css',
  ],
  'cssWithOptions' => [
    '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">'
  ],
  'js' => [
    'node_modules/nouislider/dist/nouislider.min.js'
  ],
  'jsWithOptions' => [
    '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>',
    '<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>',
    '<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>',
    '<script src="../../assets/js/form-image.js" defer></script>'
  ]
];

?>