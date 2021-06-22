<?php $this->setTitle('Error'); ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<main>

    <!-- Main Content -->
    <div id="content">



        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- 404 Error Text -->
            <div class="text-center">
                <div class="error mx-auto" d>Error</div>
                <p class="lead text-gray-800 mb-5">Something want wrong</p>
                <p class="text-gray-500 mb-0"></p>
                <a href="<?= PROOT ?>shop/checkout">&larr; Back To Checkout</a>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div >
</main>
<?php $this->end(); ?>

<?php $this->start('footer'); ?>

<?php $this->end(); ?>