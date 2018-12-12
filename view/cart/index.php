<?php require_once(ROOT . "/include/header.php"); ?>

<section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                              
                                <?php foreach($categories as $categoryItem): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="/category/<?php echo $categoryItem['id']; ?>">
                                                <?php echo $categoryItem['name']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                               <?php endforeach; ?>
                            </div><!--/category-products-->


                           

                        </div>
                    </div>
                      <?php if(isset($products)): ?>
                    <div class="col-sm-9 padding-right">
                        
                        <table>
                            <tr>
                                <th>Код товара</th>
                                <th>Название</th>
                                 <th>Количество, шт.</th>
                                <th>Стоимость в руб.</th>
                            </tr>
                            <?php foreach($products as $product): ?>
                            <tr>
                                <td><?php echo $product['code']; ?></td>
                                <td>
                                    <a href="/product/<?php echo $product['id']; ?>">
                                      <?php echo $product['name']; ?>
                                    </a>
                                </td>
                                <td><?php echo $productsInCart[$product['id']]; ?></td>
                                <td><?php echo $product['price']; ?></td> 
                            </tr>
                            
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3">Общая стоимость:</td>
                                <td><?php echo $totalPrice; ?></td>
                            </tr>
                        </table>
                        <a href="/cart/checkout">Оформить заказ.</a> 
                            
                    </div>
                    <?php else: ?>
                    <p>У вас нет товаров в корзине.</p>
                    <?php endif; ?>
                    </div>
                </div>
        </section>

<?php require_once(ROOT . "/include/footer.php"); ?>