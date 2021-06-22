<?php $this->setTitle('Product Detials'); ?>

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
    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="product_img_slide owl-carousel">
                        <div class="single_product_img">
                            <img loading="lazy" src="<?= $this->content->img ?>" alt="#" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="single_product_text text-center">
                        <h3><?= $this->content->name ?></h3>
                        <p>
                            <?= $this->content->description ?>
                        </p>
                        <div class="card_area">
                            
                            <div class="add_to_cart">
                                <a class="add-to-cart btn_3" id="<?= $this->content->p_id ?>"><span>Add to cart</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->
    <!-- subscribe part here -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Get promotions & updates!</h2>
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                        <div class="subscribe_form">
                            <input type="email" placeholder="Enter your mail">
                            <a href="#" class="btn_1">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subscribe part end -->
</main>
<?php $this->end(); ?>

<?php $this->start('footer'); ?>

<?php $this->end(); ?>