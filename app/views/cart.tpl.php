<section class="cart">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <h2 class="h2 text-uppercase mb-1">Votre Panier</h2>
                <?php if (!empty($viewData['cartItems'])): ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($viewData['cartItems'] as $item): ?>
                                <tr>
                                    <td><?=$item['product']->getName()?></td>
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