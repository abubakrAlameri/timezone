<?php $this->setTitle('Cart'); ?>

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
                            <h2>Cart List</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $subTotle = 0; ?>
                            <?php foreach ($this->cart as $item) : ?>
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img loading="lazy" src="<?= product($item->p_id)->img ?>" alt="" />
                                            </div>
                                            <div class="media-body">
                                                <p><?= product($item->p_id)->name ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>

                                        <h5>$ <?= product($item->p_id)->cost ?></h5>
                                    </td>
                                    <td>
                                        <div class="product_count">

                                            <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                                            <input class="input-number" form="updateForm" name="<?= $item->p_id ?>" type="text" value="<?= $item->quantity ?>" min="1" max="<?= product($item->p_id)->quantity ?>">
                                            <span class="input-number-increment"> <i class="ti-plus"></i></span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        $total_cost = (float)$item->total_cost * (int)$item->quantity;
                                        $subTotle += $total_cost;
                                        ?>
                                        <h5>$ <?= $total_cost ?></h5>
                                    </td>
                                    <td>
                                        <form action="<?= PROOT ?>shop/deleteCartItem" method="post">
                                            <input type="hidden" name="p_id" value="<?= $item->p_id ?>">
                                            <button type="submit" name="delete_cart" class="btn btn-danger">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="bottom_button">
                                <td>
                                    <form action="<?= PROOT ?>shop/updateCart" id="updateForm" method="post">
                                        <button class="btn_1" type="submit">Update Cart</button>
                                    </form>

                                </td>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5><?= $subTotle ?></h5>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <div class=" ">
                                        <a class="btn_1 " href="<?= PROOT ?>shop/checkout">Proceed to checkout</a>
                                    </div>
                                </td>
                                <td></td>
                                <td>

                                </td>
                                <td>
                                    <div class="float-right">
                                        <a class="btn_1" href="<?= PROOT ?>shop/index"> Continue Shopping</a>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->
</main>
<?php $this->end(); ?>

<?php $this->start('footer'); ?>

<?php $this->end(); ?>