
<section class="products-grid">
    <div class="container-fluid">
      <div class="row">
        <!-- product-->
        <div class="col-lg-6 col-sm-12">
          <div class="product-image">
            <img src="<?=$absoluteURL.'/'.$viewData['product']->getPicture()?>" alt="product" class="img-fluid">
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="mb-3">
            <h3 class="h3 text-uppercase mb-1"><?=$viewData['product']->getName()?></h3>
            <div>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
            </div>
          </div>
          <div class="my-2">
            <div class="text-muted"><span class="h4"><?=$viewData['product']->getPrice()?> €</span> TTC</div>
          </div>
          <div class="product-action-buttons">
              <a class="btn btn-dark btn-buy" href="<?=$router->generate('cart')?>"><i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span></a>
          </div>
          <div class="mt-5">
            <p>
            <?=$viewData['product']->getDescription()?>
            </p>
          </div>
        </div>
        <!-- /product-->
      </div>
      
    </div>
  </section>