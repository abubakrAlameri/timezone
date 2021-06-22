<?php $this->setTitle('Shop'); ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Watch Shop</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!-- Latest Products Start -->
    <section class="popular-items latest-padding">
        <div class="container">

            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <?php foreach ($this->content as $prod) : ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img loading="lazy" src="<?= $prod->img ?>" alt="">
                                        <div class="img-cap">
                                            <!-- ajax here -->
                                            <a class="add-to-cart" id="<?= $prod->p_id ?>"><span>Add to cart</span></a>
                                        </div>

                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="<?= PROOT ?>shop/productDetails/<?= $prod->p_id ?>"><?= $prod->name ?></a></h3>
                                        <span>$ <?= $prod->cost ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>

            </div>
            <!-- End Nav Card -->
            <nav class="blog-pagination justify-content-center d-flex">
                <ul class="pagination">
                    <li class="page-item">
                        <?php
                        $next = (ProductModel::$currentPage < ProductModel::$pagesNumber) ? ProductModel::$currentPage + 1 : ProductModel::$pagesNumber;
                        $prev = (ProductModel::$currentPage > 1) ? ProductModel::$currentPage - 1 : 1;
                        ?>
                        <a href="<?= PROOT ?>shop/index/<?= $prev ?>" class="page-link" aria-label="Previous">
                            <i class="ti-angle-left"></i>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= ProductModel::$pagesNumber; $i++) : ?>
                        <?php if ($i == ProductModel::$currentPage) : ?>
                            <li class="page-item active">
                                <a href="<?= PROOT ?>shop/index/<?= $i ?>" class="page-link"><?= $i ?></a>
                            </li>
                        <?php else : ?>
                            <li class="page-item">
                                <a href="<?= PROOT ?>shop/index/<?= $i ?>" class="page-link"><?= $i ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <li class="page-item">
                        <a href="<?= PROOT ?>shop/index/<?= $next ?>" class="page-link" aria-label="Next">
                            <i class="ti-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <!-- Latest Products End -->
    <!--? Shop Method Start-->
    <div class="shop-method-area">
        <div class="container">
            <div class="method-wrapper">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-package"></i>
                            <h6>Free Shipping Method</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-unlock"></i>
                            <h6>Secure Payment System</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-reload"></i>
                            <h6>Secure Payment System</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Method End-->
</main>
<?php $this->end(); ?>

<?php $this->start('footer'); ?>

<?php $this->end(); ?>