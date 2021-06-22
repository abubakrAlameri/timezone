<?php $this->setTitle('home'); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>

<?php $this->start('body'); ?>

<main>

    <!--? slider Area Start -->
    <div class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center slide-bg">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                            <div class="hero__caption">
                                <h1 id="lpHeadTxt" data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms"><?= $this->content[1]->text ?></h1>
                                <p id="lpParagraph" data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms"><?= $this->content[2]->text ?></p>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                    <!--///////////// -->
                                    <a id="lpLinke" href="<?= $this->content[3]->url ?>" class="btn hero-btn"><?= $this->content[3]->text ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
                            <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                <!-- ///////////////////////////////// -->
                                <img loading="lazy" id="lpImg" src="<?= $this->content[0]->url ?>" alt="" class=" heartbeat">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center slide-bg">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms"><?= $this->content[1]->text ?></h1>
                                <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms"><?= $this->content[2]->text ?></p>
                                <!-- Hero-btn -->
                                <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                    <a href="<?= $this->content[3]->url ?>" class="btn hero-btn"><?= $this->content[3]->text ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 d-none d-sm-block">
                            <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                                <img loading="lazy" src="<?= $this->content[0]->url ?>" alt="" class=" heartbeat">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!-- ? New Product Start -->
    <section class="new-product-area section-padding30">
        <div class="container">
            <!-- Section tittle -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="section-tittle mb-70">
                        <h2>New Arrivals</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($this->newArrivals as $pro) : ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-new-pro mb-30 text-center">
                            <div class="product-img">
                                <img loading="lazy" src="<?= $pro->img ?>" alt="">
                            </div>
                            <div class="product-caption">
                                <h3><a href="<?= PROOT ?>shop/productDetails/<?= $pro->p_id ?>"><?= $pro->name ?></a></h3>

                                <span>$ <?= $pro->cost ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <!--? Popular Items Start -->
    <div class="popular-items section-padding30">
        <div class="container">
            <!-- Section tittle -->
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-tittle mb-70 text-center">
                        <h2>Popular Items</h2>
                        <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($this->popular as $pro) : ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-popular-items mb-50 text-center">
                            <div class="popular-img">
                                <img loading="lazy" src="<?= $pro->img ?>" alt="">
                                <div class="img-cap">

                                    <a class="add-to-cart" id="<?= $pro->p_id ?>"><span>Add to cart</span></a>

                                </div>

                            </div>
                            <div class="popular-caption">
                                <h3><a href="<?= PROOT ?>shop/productDetails/<?= $pro->p_id ?>">Thermo Ball Etip Gloves</a></h3>
                                <span>$ 4<?= $pro->cost ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <!-- Button -->
            <div class="row justify-content-center">
                <div class="room-btn pt-70">
                    <a href="<?= PROOT ?>shop/" class="view-btn1">View More Products</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Items End -->

    <!--? Watch Choice  Start-->
    <div class="watch-area section-padding30">
        <div class="container">
            <div class="row align-items-center justify-content-between padding-130">
                <div class="col-lg-5 col-md-6">
                    <div class="watch-details mb-40">
                        <h2>Watch of Choice</h2>
                        <p id="wocp1"><?= $this->content[4]->text ?></p>
                        <a id="wocl1" href="<?= $this->content[5]->url ?>" class="btn"><?= $this->content[5]->text ?></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-10">
                    <div class="choice-watch-img mb-40">
                        <img loading="lazy" id="woci1" src="<?= $this->content[7]->url ?>" alt="">
                    </div>
                </div>
            </div>

            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 col-md-6 col-sm-10">
                    <div class="choice-watch-img mb-40">
                        <img loading="lazy" id="woci2" src="<?= $this->content[7]->url ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="watch-details mb-40">
                        <h2>Watch of Choice</h2>
                        <p id="wocp2"><?= $this->content[8]->text ?></p>
                        <a id="wocl2" href="<?= $this->content[9]->url ?>" class="btn"><?= $this->content[9]->text ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Watch Choice  End-->

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
<?php
// echo $this->loadContentTohtmlTags($this->content);
?>

<?php $this->end(); ?>