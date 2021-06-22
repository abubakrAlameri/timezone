<?php $this->setTitle('Products'); ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<!--  try add ajax here -->

<div class="card shadow mb-4">
    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary"><?= isset($this->product) ? 'update' : 'add' ?></h6>
        <?php

        if (Session::exists('status')) {
            echo  Session::get('status');
            Session::set('status', null);
            Session::delete('status');
        }
        ?>
    </div>
    <div class="card-body ">
        <form class="user" method="POST" enctype="multipart/form-data" action="<?= PROOT ?>admin/editeProducts">
            <div class="form-group">
                <input type="hidden" name="id" value="<?= isset($this->product->p_id)? $this->product->p_id:''?>">
                <img loading="lazy" src="<?= isset($this->product->img) ? $this->product->img : '' ?>" id="d_img">
                <input type="file" class="form-control " onchange="readURL(this)" id="img" name="img">
            </div>
            <div class="form-group">
                <label for="">name</label>
                <input type="text" class="form-control " name="name" value="<?= isset($this->product->name) ? $this->product->name : '' ?>" placeholder=Name">
            </div>
            <div class="form-group">
                <label for="">description</label>
                <textarea class="form-control " name="description" id="desc">
                    <?= isset($this->product->description) ? $this->product->description : '' ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="">quantity</label>
                <input type="number" class="form-control " name="quantity" value="<?= isset($this->product->quantity) ? $this->product->quantity : '' ?>" placeholder="number in stock">
            </div>
            <div class="form-group">
                <label for="">cost</label>
                <input type="text" class="form-control " name="cost" value="<?= isset($this->product->cost) ? $this->product->cost : '' ?>" placeholder="cost">
            </div>

            <input type="submit" name="insert" value="<?= isset($this->product) ? 'update' : 'add' ?>" class="btn btn-secondary  btn-block">

        </form>
    </div>
</div>



<?php $this->end(); ?>

<?php $this->start('footer'); ?>
<script src="<?= PROOT ?>assets/js/showImgInUpload.js"></script>
<?php $this->end(); ?>