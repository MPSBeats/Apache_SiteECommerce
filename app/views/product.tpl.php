<section class="products-grid">
  <div class="container-fluid">
    <div class="row">
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
          <form action="<?=$router->generate('cart')?>" method="post">
            <input type="hidden" name="product_id" value="<?=$viewData['product']->getId()?>">
            <input type="hidden" name="quantity" value="1">
            <button type="submit" class="btn btn-dark btn-buy"><i class="fa fa-shopping-cart"></i><span class="btn-buy-label ml-2">Ajouter au panier</span></button>
          </form>
        </div>
        <div class="mt-5">
          <p><?=$viewData['product']->getDescription()?></p>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
document.querySelector('.btn-buy').addEventListener('click', function(event) {
  const productId = document.querySelector('input[name="product_id"]').value;
  const quantity = document.querySelector('input[name="quantity"]').value;

  const xhr = new XMLHttpRequest();
  xhr.open('POST', '<?=$router->generate('cart')?>', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {
    window.location.href = '<?=$router->generate('cart')?>';
  }
  };
  xhr.send('product_id=' + productId + '&quantity=' + quantity);
});
</script>
