<?php $this->setTitle('Products'); ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
        <form action="<?= PROOT ?>admin/editeProducts" method="post">
            <button type="submit" name="add" class=" btn btn-primary  btn-md">
                Add Product
            </button>
        </form>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>description</th>
                        <th>Cost</th>
                        <th>Image-URL</th>
                        <th>Quentity</th>
                        <th>Selled</th>
                        <th>EDIT</th>
                        <th>DELET</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>description</th>
                        <th>Cost</th>
                        <th>Image-URL</th>
                        <th>Quentity</th>
                        <th>Selled</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($this->products as $prod) : ?>
                        <tr>
                            <td> <?= $prod->p_id ?></td>
                            <td><?= $prod->name ?></td>
                            <td><?= $prod->description ?></td>
                            <td><?= $prod->cost ?></td>
                            <td><img loading="lazy" width="100" src="<?= $prod->img ?>"></td>
                            <td><?= $prod->quantity ?></td>
                            <td><?= $prod->sealed ?></td>

                            <td>
                                <form id="form<?= $prod->p_id ?>" action="<?= PROOT ?>admin/editeProducts" method="POST">
                                    <input type="hidden" name="id" value="<?= $prod->p_id ?>">
                                </form>
                                <button type="submit" form="form<?= $prod->p_id ?>" name="edite" class="btn btn-info ">
                                    <i class="fas fa-fw fa-cog"></i> Edite
                                </button>
                            </td>
                            <td>
                                <button form="form<?= $prod->p_id ?>" type="submit" name="delete" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<nav class="blog-pagination justify-content-center d-flex">
    <ul class="pagination">
        <li class="page-item">
            <?php
            $next = (ProductModel::$currentPage < ProductModel::$pagesNumber) ? ProductModel::$currentPage + 1 : ProductModel::$pagesNumber;
            $prev = (ProductModel::$currentPage > 1) ? ProductModel::$currentPage - 1 : 1;
            ?>
            <a href="<?= PROOT ?>admin/products/<?= $prev ?>" class="page-link" aria-label="Previous">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
        </li>
        <?php for ($i = 1; $i <= ProductModel::$pagesNumber; $i++) : ?>
            <?php if ($i == ProductModel::$currentPage) : ?>
                <li class="page-item active">
                    <a href="<?= PROOT ?>admin/products/<?= $i ?>" class="page-link"><?= $i ?></a>
                </li>
            <?php else : ?>
                <li class="page-item">
                    <a href="<?= PROOT ?>admin/products/<?= $i ?>" class="page-link"><?= $i ?></a>
                </li>
            <?php endif; ?>
        <?php endfor; ?>
        <li class="page-item">
            <a href="<?= PROOT ?>admin/products/<?= $next ?>" class="page-link" aria-label="Next">
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </li>
    </ul>
</nav>

<?php $this->end(); ?>

<?php $this->start('footer'); ?>
<script src="<?= PROOT ?>assets/js/showImgInUpload.js"></script>
<?php $this->end(); ?>