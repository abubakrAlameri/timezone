<?php $this->setTitle('Blogs'); ?>

<?php $this->start('head');  ?>

<?php $this->end(); ?>

<?php $this->start('body');?>



<div class="col-lg-8 mb-5 mb-lg-0">
    <div class="blog_left_sidebar">
        <?php foreach ($this->content as $blog) : ?>
            <article class="blog_item">
                <div class="blog_item_img">
                    <img loading="lazy" class="card-img rounded-0" src="<?= $blog->img ?>" alt="">
                    <a href="<?= PROOT ?>blog/blogDetails/<?= $blog->b_id ?>" class="blog_item_date">
                        <?php $date = explode(' ', $blog->b_date); ?>
                        <h3><?= $date[0] ?></h3>
                        <p><?= strtoupper($date[1]) ?></p>
                    </a>
                </div>

                <div class="blog_details">
                    <a href="<?= PROOT ?>blog/blogDetails/<?= $blog->b_id ?>"" class=" d-inline-block" href="single-blog.html">
                        <h2><?= $blog->title ?></h2>
                    </a>
                    <p><?= implode(' ', array_slice(explode(' ', $blog->text), 0, 20)) . "..." ?></p>
                    <ul class="blog-info-link">

                        <li><a href="<?= PROOT ?>blog/blogDetails/<?= $blog->b_id ?>"><i class="fa fa-comments"></i> <?= $blog->comments_num ?> Comments</a></li>
                    </ul>
                </div>
            </article>
        <?php endforeach; ?>

        <nav class="blog-pagination justify-content-center d-flex">
            <ul class="pagination">
                <li class="page-item">
                    <?php
                    $next = (BlogModel::$currentPage < BlogModel::$pagesNumber) ? BlogModel::$currentPage + 1 : BlogModel::$pagesNumber;
                    $prev = (BlogModel::$currentPage > 1) ? BlogModel::$currentPage - 1 : 1;
                    ?>
                    <a href="<?= PROOT ?>blog/index/<?= $prev ?>" class="page-link" aria-label="Previous">
                        <i class="ti-angle-left"></i>
                    </a>
                </li>
                <?php for ($i = 1; $i <= BlogModel::$pagesNumber; $i++) : ?>
                    <?php if ($i == BlogModel::$currentPage) : ?>
                        <li class="page-item active">
                            <a href="<?= PROOT ?>blog/index/<?= $i ?>" class="page-link"><?= $i ?></a>
                        </li>
                    <?php else : ?>
                        <li class="page-item">
                            <a href="<?= PROOT ?>blog/index/<?= $i ?>" class="page-link"><?= $i ?></a>
                        </li>
                    <?php endif; ?>
                <?php endfor; ?>
                <li class="page-item">
                    <a href="<?= PROOT ?>blog/index/<?= $next ?>" class="page-link" aria-label="Next">
                        <i class="ti-angle-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?php $this->end(); ?>

<?php $this->start('footer'); ?>

<?php $this->end(); ?>