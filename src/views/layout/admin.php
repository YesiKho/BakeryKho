<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? ''; ?> - BAKERY KHO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="/bakerykho/src/assets/css/style.css">
    <link rel="stylesheet" href="/bakerykho/src/assets/css/output.css">
    <style>
        <?= $style ?? ''; ?>
    </style>
</head>

<body class="scroll-smooth main">
    <?php include_once('src/views/includes/admin/navbar.php') ?>
    <?php include_once('src/views/includes/admin/sidebar.php') ?>
    <?= $content ?? ''; ?>
</body>
<script src="/bakerykho/src/assets/js/script.js"></script>

</html>