<?php require_once 'storage/app/data/menu.php' ?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BakeryKho - Admin</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEDIR . "public/images/aflogo-light.png" ?>">
    <link rel="stylesheet" href="<?= BASEDIR . "public/css/output.css" ?> " />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body class="font-poppins">
    <?php include 'views/includes/admin/navbar.php' ?>
    <?php include 'views/includes/admin/sidebar.php' ?>

    <section class="w-full min-h-screen transition-all ease-in-out duration-500 py-24 pl-32 pr-8 admin-content-active" id="admin-content">
        <?= $content ?? ''; ?>
    </section>

    <?php include 'views/includes/modal-logout.php' ?>
</body>
<script src="<?= BASEDIR . "storage/app/lib/jquery.js" ?> "></script>
<script src="<?= BASEDIR . "public/js/script.js" ?>"></script>
<script src="<?= BASEDIR . "public/js/ajax.js" ?>"></script>

</html>