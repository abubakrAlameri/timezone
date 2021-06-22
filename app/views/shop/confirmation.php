<?php $this->setTitle('Confirmation'); ?>

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
                            <h2>Confirmation</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================ confirmation part start =================-->
    <section class="confirmation_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="confirmation_tittle">
                        <span>Thank you. Your order has been received.</span>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>order info</h4>
                        <ul>
                            <li>
                                <p>order number</p><span><?= $this->info['id'] ?></span>
                            </li>
                            <li>
                                <p>data</p><span>:<?= $this->info['order_date'] ?></span>
                            </li>
                            <li>
                                <p>total</p><span>: USD <?= $this->info['total'] ?></span>
                            </li>
                            <li>
                                <p>mayment methord</p><span>: Check payments</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Billing Address</h4>
                        <ul>
                            <li>
                                <p>Street</p><span>:<?= $this->info['line1'] ?></span>
                            </li>
                            <li>
                                <p>city</p><span>:<?= $this->info['city'] ?></span>
                            </li>
                            <li>
                                <p>state</p><span>: <?= $this->info['state'] ?></span>
                            </li>
                            <li>
                                <p>postcode</p><span>: <?= $this->info['postal_code'] ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>shipping Address</h4>
                        <ul>
                            <li>
                                <p>Street</p><span>:<?= $this->info['line1'] ?></span>
                            </li>
                            <li>
                                <p>city</p><span>:<?= $this->info['city'] ?></span>
                            </li>
                            <li>
                                <p>state</p><span>: <?= $this->info['state'] ?></span>
                            </li>
                            <li>
                                <p>postcode</p><span>: <?= $this->info['postal_code'] ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
       
        </div>
    </section>
    <!--================ confirmation part end =================-->
</main>
<?php $this->end(); ?>

<?php $this->start('footer'); ?>

<?php $this->end(); ?>