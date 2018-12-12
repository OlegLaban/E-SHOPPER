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
                    
                    <div class="col-sm-3" >
                        <?php if(!$result): ?>
                         <div>
                            <?php if($errors): ?>
                                <?php foreach($errors as $error): ?>
                                 <p>-<?php echo $error; ?></p>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <p></p>
                        </div>
                        <div class="login-form">
                            <p>Выбрано товаров: <?=$countProduct;?> на сумму <?=$price;?>, руб.</p>
                            <form action="#" method="post">
                                <p>Ваше имя</p>
                                <input type="text" name="userName" value="<?=$userName;?>">
                                <p>Номер телефона</p>
                                <input type="text" name="userPhone">
                                <p>Коментарий к заказу</p>
                                <textarea placeholder="Сообщение" name="userMess"></textarea><br><br>
                                <input type="submit" name="submit">
                            </form>
                        </div>
                        <?php else: ?>
                            <p>Заказ оформлен!</p>
                        <?php endif; ?>
                    </div>
                </div>
                    
                </div>
        </section>



<?php require_once(ROOT . "/include/footer.php"); ?>