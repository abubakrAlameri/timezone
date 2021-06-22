<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="<?= PROOT ?>assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= PROOT ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= PROOT ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= PROOT ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= PROOT ?>assets/css/slicknav.css">
    <link rel="stylesheet" href="<?= PROOT ?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= PROOT ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= PROOT ?>assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= PROOT ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= PROOT ?>assets/css/slick.css">
    <link rel="stylesheet" href="<?= PROOT ?>assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= PROOT ?>assets/css/style.css">
    <!-- custom heads -->

    <title><?= $this->getTitle() ?></title>

    <?= $this->getContent('head') ?>
</head>

<body>
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img loading="lazy" src="<?= PROOT ?>assets/img/logo.webp" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="<?= PROOT ?>home/index">Home</a></li>
                                    <li><a href="<?= PROOT ?>shop/index">shop</a></li>
                                    <li><a href="<?= PROOT ?>home/about">about</a></li>
                                    <li><a href="<?= PROOT ?>blog/index">Blog</a></li>
                                    <li><a href="<?= PROOT ?>home/contact">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <ul>

                                <li><a href="<?= PROOT ?>shop/cart"><span class="flaticon-shopping-cart"></span></a> </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        <!--? Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2><?= $this->getTitle() ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--? Hero Area End-->
        <!--================Blog Area =================-->
        <section class="blog_area section-padding">
            <div class="container">
                <div class="row">
                    <!-- /////////// -->

                    <?= $this->getContent('body') ?>


                    <!-- ////////////// -->
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
               
                           

                            <aside class="single_sidebar_widget newsletter_widget">
                                <h4 class="widget_title">Newsletter</h4>

                                <form action="#">
                                    <div class="form-group">
                                        <input type="email" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Subscribe</button>
                                </form>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.html"><img loading="lazy" src="<?= PROOT ?>assets/img/logo.webp" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>Asorem ipsum adipolor sdit amet, consectetur adipisicing elitcf sed do eiusmod tem.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#"> Offers & Discounts</a></li>
                                    <li><a href="#"> Get Coupon</a></li>
                                    <li><a href="#"> Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>New Products</h4>
                                <ul>
                                    <li><a href="#">Woman Cloth</a></li>
                                    <li><a href="#">Fashion Accessories</a></li>
                                    <li><a href="#"> Man Accessories</a></li>
                                    <li><a href="#"> Rubber made Toys</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Support</h4>
                                <ul>
                                    <li><a href="#">Frequently Asked Questions</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Report a Payment Issue</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer bottom -->
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-8 col-md-7">
                        <div class="footer-copy-right">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-5">
                        <div class="footer-copy-right f-right">
                            <!-- social -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->
    <?= $this->getContent('footer') ?>
    <script src="<?= PROOT ?>/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="<?= PROOT ?>/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= PROOT ?>/assets/js/popper.min.js"></script>
    <script src="<?= PROOT ?>/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="<?= PROOT ?>/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="<?= PROOT ?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?= PROOT ?>/assets/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="<?= PROOT ?>/assets/js/wow.min.js"></script>
    <script src="<?= PROOT ?>/assets/js/animated.headline.js"></script>
    <script src="<?= PROOT ?>/assets/js/jquery.magnific-popup.js"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="<?= PROOT ?>/assets/js/jquery.scrollUp.min.js"></script>
    <script src="<?= PROOT ?>/assets/js/jquery.nice-select.min.js"></script>
    <script src="<?= PROOT ?>/assets/js/jquery.sticky.js"></script>

    <!-- contact js -->
    <script src="<?= PROOT ?>/assets/js/contact.js"></script>
    <script src="<?= PROOT ?>/assets/js/jquery.form.js"></script>
    <script src="<?= PROOT ?>/assets/js/jquery.validate.min.js"></script>
    <script src="<?= PROOT ?>/assets/js/mail-script.js"></script>
    <script src="<?= PROOT ?>/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="<?= PROOT ?>/assets/js/plugins.js"></script>
    <script src="<?= PROOT ?>/assets/js/main.js"></script>

</body>

</html>