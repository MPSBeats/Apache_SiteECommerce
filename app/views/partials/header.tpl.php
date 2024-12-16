<!DOCTYPE html>
<html lang="fr">
<?php
  $baseRoute = $_SERVER['BASE_URI'];
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="<?=$absoluteURL?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=$absoluteURL?>/assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=$absoluteURL?>/assets/css/styles.css">
  <title>Ecomm</title>
</head>

<body>
  <header>
    <div class="top-bar">
      <div class="container-fluid">
        <div class="row d-flex align-items-center">
          <div class="col-sm-7 d-none d-sm-block">
            <ul class="list-inline mb-0">
              <li class="list-inline-item pr-3 mr-0">
              <img src="<?=$absoluteURL?>/assets/images/logo.jpg" alt="Ecomm Logo" width="50px"> Ecomm
              </li>
              <li class="list-inline-item px-3 border-left d-none d-lg-inline-block">Livraison offerte à partir de Demain</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-sticky navbar-airy navbar-light">
      <div class="container-fluid">
        <!-- Navbar Header  -->
        <a href="<?=$router->generate('home')?>" class="navbar-brand">Ecomm</a>
        <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse"
          aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
        <!-- Navbar Collapse -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a href="<?=$router->generate('home')?>" class="nav-link active">Accueil</a>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Catégories</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <?php foreach($categories as $currentCategory): ?>
                    <!-- <a class="dropdown-item" href="<?=$absoluteURL.'/catalogue/categorie/'.$currentCategory->getId()?>"><?=$currentCategory->getName()?></a> -->
                    <a class="dropdown-item" href="<?=$router->generate('catalog-category', ['id' => $currentCategory->getId()])?>"><?=$currentCategory->getName()?></a>

                  <?php endforeach ?>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Types de produits</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php foreach($types as $currentType): ?>
                    <a class="dropdown-item" href="<?=$router->generate('catalog-type', ['id' => $currentType->getId()])?>"><?=$currentType->getName()?></a>
                  <?php endforeach ?>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Marques</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <?php foreach($brands as $currentBrand): ?>
                    <a class="dropdown-item" href="<?=$router->generate('catalog-brand', ['id' => $currentBrand->getId()])?>"><?=$currentBrand->getName()?></a>
                  <?php endforeach ?>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
