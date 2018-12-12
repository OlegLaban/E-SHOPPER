<?php include(ROOT . '/include/header.php');  ?>

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


                            <div class="shipping text-center"><!--shipping-->
                                <img src="/template/images/home/shipping.jpg" alt="" />
                            </div><!--/shipping-->

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <?php foreach( $lastProduct as  $lastProductItem): ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="<?php echo $lastProductItem['image']; ?>" alt="" />
                                                <h2>$<?php echo $lastProductItem['price']; ?></h2>
                                                <a href="/product/<?php echo $lastProductItem['id']; ?>"><p><?php echo $lastProductItem['name']; ?></p>
                                                <a data-id="<?=$lastProductItem['id'];?>" href="#" class="btn btn-default add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>В корзину
                                                </a>
                                            </div>
                                            <?php if($lastProductItem['is_new'] == 1): ?>
                                                <img src="/template/images/home/new.png" class="new" alt="" >
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div><!--features_items-->
                        </div>

                    </div>
                </div>
        </section>

<?php include(ROOT . '/include/footer.php');  ?>