<?php
require_once('src/libs/products.php');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $title = 'update';
    $res = Product::getById($product_id);
} else {
    $title = 'create';
    $product_id = null;
}

if (isset($_POST['product'])) {
    if ($title == 'create') {
        $res = Product::insert($_POST['product']);
        if ($res['status'] == 201) {
            header("refresh:2;url=index.php");
        }
    } elseif ($title == 'update') {
        $res = Product::update($_POST['product'], $product_id);
        if ($res['status'] == 200) {
            // header("refresh:2;url=index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yesi Kho Sutrisno - 222410103007</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="src/assets/css/style.css" />
    <link rel="stylesheet" href="src/assets/css/output.css" />
</head>

<body>
    <main>
        <?php include('src/views/includes/sidebar.php') ?>
        <?php include('src/views/includes/navbar.php') ?>

        <div class="container">
            <div class="main-content border border-sage rounded-lg">
                <h1 class="text-xl font-medium capitalize"><?= $title; ?> Product</h1>
                <div class="w-full overflow-hidden">
                    <?php if (isset($res['message'])) : ?>
                        <?php if ($res['status'] == 200) : ?>
                            <p class="px-6 py-2 bg-info rounded-lg text-black font-medium truncate"> <?= $res['message']; ?></p>
                        <?php elseif ($res['status'] == 201) : ?>
                            <p class="px-6 py-2 bg-success rounded-lg text-white font-medium truncate"> <?= $res['message']; ?></p>
                        <?php elseif ($res['status'] == 400) : ?>
                            <p class="px-6 py-2 bg-warning rounded-lg text-black font-medium truncate"> <?= $res['message']; ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <form action="" method="post" enctype="multipart/form-data" class="form">
                    <div class="grid grid-cols-2 gap-5 mb-4">
                        <div class="w-full relative group/input">
                            <label for="name" id="label-image" class="absolute text-sage ml-2 mt-2 px-2 bg-white -translate-y-4 text-sm">Image</label>
                            <input type="file" name="image" id="image" accept="image/jpeg, image/jpg, image/png" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none transition-all ease-in-out file:rounded-lg file:bg-sage/80 file:border-none file:px-4 file:py-1 file:hover:cursor-pointer file:hover:bg-sage">
                        </div>
                        <div class="w-full flex flex-col items-start relative group/input">
                            <label for="name" id="label-name" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm">Name Product</label>
                            <input type="text" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none focus-within:border" name="product[name]" id="name" value="<?= $product_id ? $res['data']['name'] : null; ?>" required>
                        </div>
                        <div class="w-full flex flex-col items-start relative group/input">
                            <label for="price" id="label-price" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm">Price</label>
                            <input type="text" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none" name="product[price]" id="price" value="<?= $product_id ? $res['data']['price'] : null; ?>" required>
                        </div>
                        <div class="w-full flex flex-col items-start relative group/input">
                            <label for="stock" id="label-stock" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm ">Stock</label>
                            <input type="text" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none" name="product[stock]" id="stock" value="<?= $product_id ? $res['data']['stock'] : null; ?>" required>
                        </div>
                    </div>
                    <div class="flex justify-end items-center gap-4">
                        <a href="./index.php"><button class="button button-secondary" type="button">Kembali</button></a>
                        <button class="button button-primary capitalize" type="submit"><?= $title; ?></button>
                    </div>
                </form>
            </div>
        </div>

    </main>
</body>

<script src="src/assets/js/script.js"></script>

</html>