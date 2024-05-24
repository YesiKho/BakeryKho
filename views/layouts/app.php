<?php require 'storage/app/data/footer.php' ?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAKERY KHO</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEDIR . "public/images/aflogo-light.png" ?>">
    <link rel="stylesheet" href="<?= BASEDIR . "public/css/output.css" ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <?php include 'views/includes/navbar.php' ?>

    <?= $content ?? ''; ?>

    <?php include 'views/includes/modal-logout.php' ?>
    <?php include 'views/includes/footer.php' ?>
</body>
<script src="<?= BASEDIR . "storage/app/lib/jquery.js" ?>"></script>
<script src="<?= BASEDIR . "public/js/script.js" ?>"></script>
<script src="<?= BASEDIR . "public/js/ajax.js" ?>"></script>

</html>