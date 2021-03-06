<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="regis" content="">

    <title>
        <?= $this->getTitle() ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= PROOT ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= PROOT ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <?= $this->getContent('head') ?>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <?= $this->getContent('body') ?>

    </div>



    <?= $this->getContent('footer') ?>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= PROOT ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= PROOT ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= PROOT ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= PROOT ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>