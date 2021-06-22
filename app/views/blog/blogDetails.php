<?php $this->setTitle('Blog Details'); ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body');?>
<div class="col-lg-8 posts-list">
    <div class="single-post">
        <div class="feature-img">
            <!-- //////////////////////////////////////////////////////// -->
            <img loading="lazy" class="img-fluid" src="<?= $this->content->img ?>" alt="">
        </div>
        <div class="blog_details">
            <!-- //////////////////////////////////////////////////////// -->
            <h2><?= $this->content->title ?>
            </h2>
            <ul class="blog-info-link mt-3 mb-4">
                <!-- //////////////////////////////////////////////////////// -->

                <li><a><i class="fa fa-comments"></i><?= $this->content->comments_num ?> Comments</a></li>
            </ul>
            <!-- //////////////////////////////////////////////////////// -->
            <p class="excert">
                <?= $this->content->text ?>
            </p>

        </div>
    </div>

    <div class="comments-area">
        <h4><?= $this->content->comments_num ?> Comments</h4>
        <?php foreach ($this->comments as $com) : ?>
            <div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <div class="thumb">
                            <img loading="lazy" src="<?= PROOT ?>assets/img/face.webp" alt="">
                        </div>
                        <div class="desc">
                            <p class="comment">
                                <?= $com->comm_txt ?>
                            </p>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <h5>
                                        <?= $com->name ?>
                                    </h5>
                                    <p class="date"><?= $com->c_date ?> </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

    <div class="comment-form">
        <h4>Leave a Reply</h4>
        <form class="form-contact comment_form" method="POST" action="<?= PROOT ?>blog/addComment/<?= $this->content->b_id ?>" id="commentForm">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                    </div>
                </div>

            </div>
            <div class="form-group">
                <button type="submit" name="sbmt_cmmt" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
            </div>
        </form>
    </div>
</div>
<?php $this->end(); ?>

<?php $this->start('footer'); ?>

<?php $this->end(); ?>
 