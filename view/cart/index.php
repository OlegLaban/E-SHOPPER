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
                        
                        <table class="user_Cart_Table">
                            <tr>
                                <th>Код товара</th>
                                <th>Название</th>
                                 <th>Количество, шт.</th>
                                <th>Стоимость в руб.</th>
                                <th>Удалить шт.</th>
                                <th>Удалить товар полностью.</th>
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
                                <td> 
                                    <form action="/cart/delete/" method="POST">
                                        <input id="countDelProduct" type="number" value="1" name="count"> 
                                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>" >
                                        <button id="butDelProduct" type="submit" name="submit"><i class="fa fa-times"></i></button>
                                    </form>
                                    
                                    
                                </td>
                                <td> <a href="/cart/deleteAll/<?php echo $product['id']; ?>"><i class="fa fa-times"></i></a></td>
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