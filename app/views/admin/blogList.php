<?php $this->setTitle('Edite Blogs'); ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="container-fluid row">
    <div class="col">
        <?php
        if (Session::exists('status')) {

            echo Session::get('status');

            Session::delete('status');
        }
        ?>
    </div>
    <div class="w-100"></div>
    <?php foreach ($this->content as $blog) : ?>

        <div class="col-5  card shadow m-4 align-self-start">
            <!-- Card Header - Accordion -->
            <a href="#b<?= $blog->b_id ?>" class="d-block card-header py-3" data-toggle="collapse" role="button" >
                <img loading="lazy" class='img-fluid' src="<?= $blog->img ?>" alt="">
                <h6 id='title' class="mt-4 font-weight-bold text-primary"><?= $blog->title ?></h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="b<?= $blog->b_id ?>">
                <div class="card-body">
                    <p><?= $blog->text ?></p>

                </div>
                <div class="card-footer">
                    <form action="<?= PROOT ?>admin/editeBlog" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $blog->b_id ?>" class="form-control">
                            <button type="submit" name="edite" class=" btn-info  btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-fw fa-cog"></i>
                                </span>
                                <span class="text">Edite</span>
                            </button>
                            <button type="submit" name="delete" class=" btn-danger btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="w-100"></div>
    <nav class="m-auto justify-content-center d-flex">
        <ul class="pagination">
            <li class="page-item">
                <?php
                $next = (BlogModel::$currentPage < BlogModel::$pagesNumber) ? BlogModel::$currentPage + 1 : BlogModel::$pagesNumber;
                $prev = (BlogModel::$currentPage > 1) ? BlogModel::$currentPage - 1 : 1;
                ?>
                <a href="<?= PROOT ?>admin/blogList/<?= $prev ?>" class="page-link" aria-label="Previous">
                    <i class="fas fa-arrow-circle-left"></i>
                </a>
            </li>
            <?php for ($i = 1; $i <= BlogModel::$pagesNumber; $i++) : ?>
                <?php if ($i == BlogModel::$currentPage) : ?>
                    <li class="page-item active">
                        <a href="<?= PROOT ?>admin/blogList/<?= $i ?>" class="page-link"><?= $i ?></a>
                    </li>
                <?php else : ?>
                    <li class="page-item">
                        <a href="<?= PROOT ?>admin/blogList/<?= $i ?>" class="page-link"><?= $i ?></a>
                    </li>
                <?php endif; ?>
            <?php endfor; ?>
            <li class="page-item">
                <a href="<?= PROOT ?>admin/blogList/<?= $next ?>" class="page-link" aria-label="Next">
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </li>
        </ul>
    </nav>
</div>
<?php $this->end(); ?>

<?php $this->start('footer'); ?>

<?php $this->end(); ?>