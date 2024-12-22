<section class="cart">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <h2 class="h2 text-uppercase mb-1">Votre Panier</h2>
                <?php if (!empty($viewData['cart'])): ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Image</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($viewData['cart'] as $item): ?>
                                <tr>
                                    <td><?=$item['product']->getName()?></td>
                                    <td><img src="<?=$absoluteURL.'/'.$item['product']->getPicture()?>" alt="product" class="img-fluid" style="width: 50px;"></td>
                                    <td><?=$item['product']->getPrice()?> €</td>
                                    <td><?=$item['quantity']?></td>
                                    <td><?=$item['product']->getPrice() * $item['quantity']?> €</td>
                                    <td>
                                        <form action="update_cart.html" method="post" class="d-inline">
                                            <input type="hidden" name="product_id" value="<?=$item['product']->getId()?>">
                                            <input type="number" name="quantity" value="<?=$item['quantity']?>" min="1" class="form-control d-inline w-50">
                                            <button type="submit" class="btn btn-sm btn-primary">Mettre à jour</button>
                                        </form>
                                        <form action="remove_from_cart.html" method="post" class="d-inline">
                                            <input type="hidden" name="product_id" value="<?=$item['product']->getId()?>">
                                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="text-right">
                        <h4>Total: <?=$viewData['cartTotal']?> €</h4>
                        <a href="checkout.html" class="btn btn-success">Passer à la caisse</a>
                    </div>
                <?php else: ?>
                    <p>Votre panier est vide.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<script>
document.querySelectorAll('.btn-primary').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const form = this.closest('form');
        const productId = form.querySelector('input[name="product_id"]').value;
        const quantity = form.querySelector('input[name="quantity"]').value;

        const xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert('Panier mis à jour');
                location.reload();
            }
        };
        xhr.send('product_id=' + productId + '&quantity=' + quantity);
    });
});

document.querySelectorAll('.btn-danger').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const form = this.closest('form');
        const productId = form.querySelector('input[name="product_id"]').value;

        const xhr = new XMLHttpRequest();
        xhr.open('POST', form.action, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert('Produit supprimé du panier');
                location.reload();
            }
        };
        xhr.send('product_id=' + productId);
    });
});
</script>