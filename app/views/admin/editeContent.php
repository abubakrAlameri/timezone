<?php $this->setTitle('Home Page content'); ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Landing Page</h6>
    </div>
    <div class="card-body">
        <?php

        if (Session::exists('status')) {
            echo  Session::get('status');
            Session::set('status', null);
            Session::delete('status');
        }
        ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PAGE</th>
                        <th>item</th>
                        <th>contetn</th>
                        <th>URL</th>
                        <th>EDIT</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>PAGE</th>
                        <th>item</th>
                        <th>content</th>

                        <th>URL</th>
                        <th>EDIT</th>
                    </tr>
                </tfoot>
                <tbody id="lp">
                    <!-- content from database -->
                    <?php
                    echo $this->buildTable($this->content->getContent('home', ['id', 'type', 'page', 'location', 'text', 'url']));
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Pages</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>page</th>
                        <th>item</th>
                        <th>content</th>
                        <th>URL</th>
                        <th>EDIT</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>page</th>
                        <th>item</th>
                        <th>content</th>

                        <th>URL</th>
                        <th>EDIT</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    echo $this->buildTable($this->content->query("SELECT * FROM content WHERE page != ?", ['home'])->results());

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->end(); ?>

<?php $this->start('footer'); ?>
<script src="<?= PROOT ?>assets/js/showImgInUpload.js"></script>
<?php $this->end(); ?>