<section class="hero">
    <div class="container">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="<?=$router->generate('home')?>">Home</a></li>
            <li class="breadcrumb-item active"><?=$viewData['category']->getName()?></li>
        </ol>
        <div class="hero-content pb-5 text-center">
            <h1 class="hero-heading"><?=$viewData['category']->getName()?></h1>
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <p class="lead text-muted"><?=$viewData['category']->getSubtitle()?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="products-grid">
    <div class="container-fluid">
    <header class="product-grid-header d-flex align-items-center justify-content-between">
        <div class="mr-3 mb-3">
          Affichage <strong>1-12 </strong>de <strong>158 </strong>résultats
        </div>
        <div class="mr-3 mb-3"><span class="mr-2">Voir</span><a href="#" class="product-grid-header-show active">12 </a><a
            href="#" class="product-grid-header-show ">24 </a><a href="#" class="product-grid-header-show ">Tout </a>
        </div>
        <div class="mb-3 d-flex align-items-center"><span class="d-inline-block mr-1">Trier par</span>
          <select class="custom-select w-auto border-0">
            <option value="orderby_0">Défaut</option>
            <option value="orderby_1">Nom</option>
            <option value="orderby_2">Note</option>
            <option value="orderby_3">Prix</option>
          </select>
        </div>
      </header>
        <div class="row">
            <?php 
            // Vérifiez le contenu de $viewData['products']
            if (is_array($viewData['products']) && count($viewData['products']) > 0) : 
                for ($i = 0; $i < count($viewData['products']); $i++) : 
                    $product = $viewData['products'][$i];?>
                    
                    <div class="product col-xl-3 col-lg-4 col-sm-6">
                    <div class="product-image">
                    <a href="<?=$router->generate('catalog-product', ['id' => $product->getId()])?>" class="product-hover-overlay-link">
                    <img src="<?=$baseRoute.'/'.$product->getPicture()?>" alt="product" class="img-fluid">
                    </a>
                  <p><?=$product->getName()?></p>
                </div>
                <div class="product-action-buttons">
                  <a href="#" class="btn btn-outline-dark btn-product-left"><i class="fa fa-shopping-cart"></i></a>
                  <a href="<?=$router->generate('catalog-product', ['id' => $product->getId()])?>" class="btn btn-dark btn-buy"><i class="fa-search fa"></i><span class="btn-buy-label ml-2">Voir</span></a>
                </div>
                    </div>

                <?php endfor; ?>
            <?php else : ?>
                <p>J'ai rien dedans wesh</p>
            <?php endif; ?>
        </div>
    </div>
</section>



