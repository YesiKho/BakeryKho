<?php
require_once('src/libs/products.php');
if (isset($_GET['product_id'])) {
    $res = Product::delete($_GET['product_id']);
    header("refresh:2;url=index.php");
}
// $res = array('message' => "berhasil menghapus", "status" => 200);
$products = Product::getAll();
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

        <section class="container">
            <div class="main-content">
                <div class="header-content">
                    <h1 class="font-semibold text-xl leading-loose">BakeryKho</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, asperiores.</p>
                </div>

                <div class="table-cake-wrap">
                    <div class="w-full flex justify-between">
                        <div>
                            <?php if (isset($res['message'])) : ?>
                                <?php if ($res['status'] == 201) : ?>
                                    <p class="max-w-[30rem] px-6 py-2 bg-info rounded-lg text-black font-medium truncate"> <?= $res['message']; ?></p>
                                <?php endif ?>
                            <?php endif ?>
                        </div>
                        <a href="./form.php" class="a-wrap">
                            <button type="button" class="button btn-sage">Tambah</button>
                        </a>
                    </div>
                    <table class="table-cake">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0 ?>
                            <?php foreach ($products['data'] as $product) : $i++ ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><img class="table-profile-image" src="src/assets/images/products/<?= $product['image']; ?>" alt="<?= $product['name']; ?>" /></td>
                                    <td>
                                        <p><?= $product['name']; ?></p>
                                    </td>
                                    <td>
                                        <p>
                                            Rp.
                                            <?= number_format($product['price']) ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p><?= $product['stock']; ?></p>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="form.php?product_id=<?= $product['id']; ?>">
                                                <button class="button button-icon btn-success" type="button"><i class="bi bi-pencil icon"></i></button>
                                            </a>
                                            <a href="?product_id=<?= $product['id']; ?>">
                                                <button class="button button-icon btn-warning" type="button"><i class="bi bi-trash icon"></i></button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <?php include_once('./src/views/includes/modal-logout.php') ?>
    </main>
</body>

<script src="src/assets/js/script.js"></script>

</html>