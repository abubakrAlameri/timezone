<?php $this->setTitle('Edite Blog'); ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<!--  try add ajax here -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edite the Blog</h6>
    </div>
    <div class="card-body ">
        <form class="user" action="<?= PROOT ?>admin/editeBlog" enctype="multipart/form-data" method="POST">
            <div class="form-group row">
                <img loading="lazy" class="col-5" id='d_img' src=" <?= $this->content->img ?>" alt="">
                <input type="file" class="form-control col-5 " name="img" onchange="readURL(this)">
            </div>
            <div class="form-group">
                <input type="text" class="form-control " name="title" value="<?= $this->content->title ?>" placeholder="Titel">
            </div>
            <div class="form-group">
                <textarea class="form-control " name="text" name="text" cols="30" rows="10">
                    <?= $this->content->text ?>
                </textarea>
            </div>s
            <input type="hidden" name="id" value="<?= $this->content->b_id ?>">

            <input type="submit" name="update" value="post" class="btn btn-secondary  btn-block">

        </form>
    </div>
</div>



<?php $this->end(); ?>

<?php $this->start('footer'); ?>
<script src="<?=PROOT?>assets/js/showImgInUpload.js"></script>
<?php $this->end(); ?>