<?php $this->setTitle('Add New Blog'); ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<!--  try add ajax here -->
<?php
if (Session::exists('status')) {

    echo Session::get('status');

    Session::delete('status');
}
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Write a Blog</h6>
    </div>
    <div class="card-body ">
        <form class="user" enctype="multipart/form-data" method="POST" action="<?= PROOT ?>admin/adding">
            <div class="form-group">
                <img loading="lazy" src="" class="col-5" id="d_img">
                <input type="file" name="img" class="form-control col-5 " onchange="readURL(this)" id="img" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <input type="text" class="form-control " name="title" id="title" placeholder="Titel">
            </div>
            <div class="form-group">
                <textarea class="form-control " name="text" id="text" cols="30" rows="10">

                </textarea>
            </div>

            <input type="submit" name="post" value="post" class="btn btn-secondary  btn-block">

        </form>
    </div>
</div>



<?php $this->end(); ?>

<?php $this->start('footer'); ?>
<script src="<?= PROOT ?>assets/js/showImgInUpload.js"></script>

<?php $this->end(); ?>