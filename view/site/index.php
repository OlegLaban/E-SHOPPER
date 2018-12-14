<?php require_once ROOT . '/include/header.php'; ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products">
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
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <h2 class="title text-center">Последние товары</h2>
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

                        <div class="recommended_items"><!--recommended_items-->
                            <h2 class="title text-center">Рекомендуемые товары</h2>
                            <div id="slider">
                                <a id="to-left">&lt;</a>
                                <div id="now">
                                    <div id='slider-old-wrap'>
                                        <div id="slider-wrap">
                                            <?php foreach ($recomendedProduct as $recomended): ?>
                                                <div class="product-car">
                                                    <a href="/product/<?php echo $recomended['id']; ?>"><img class="image-slider" src="<?php echo $recomended['image']; ?>"></a>
                                                     <h2>$ <?php echo $recomended['price']; ?></h2>
                                                     <p><a href="/product/<?php echo $recomended['id']; ?>"><?php echo $recomended['name']; ?></a></p>
                                                          
                                                </div>
                                            <?php endforeach; ?>
                                                                                      
                                        </div>
                                    </div>
                               </div>
                               <a id="to-rigth">&gt;</a>
                               
                            </div>                          		
                          
                        </div><!--/recommended_items-->

                    </div>
                </div>
            </div>
        </section>

<?php require_once ROOT . '/include/footer.php'; ?>        