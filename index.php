<?php
require('assets/data/cake-list.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yesi Kho Sutrisno - 222410103007</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <main>
        <?php include('component/sidebar.php') ?>
        <?php include('component/navbar.php') ?>

        <section class="container">
            <div class="main-content">
                <div class="header-content">
                    <h1>BakeryKho</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, asperiores.</p>
                </div>

                <div class="table-cake-wrap">
                    <a href="#" class="a-wrap">
                        <button type="button" class="button btn-sage">Tambah</button>
                    </a>
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
                            <?php foreach ($cakes as $cake) : $i++ ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><img class="table-profile-image" src="assets/images/<?= $cake['image']; ?>" alt="<?= $cake['name']; ?>" /></td>
                                    <td>
                                        <p><?= $cake['name']; ?></p>
                                    </td>
                                    <td>
                                        <p>
                                            Rp.
                                            <?= number_format($cake['price']) ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p><?= $cake['stock']; ?></p>
                                    </td>
                                    <td>
                                        <div>
                                            <button class="button button-icon btn-success" type="button"><i class="bi bi-pencil icon"></i></button>
                                            <button class="button button-icon btn-warning" type="button"><i class="bi bi-trash icon"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <div class="container-modal">
            <div class="wrap-modal">
                <div class="modal">
                    <p>Apakah anda yakin untuk logout?</p>
                    <div>
                        <button class="button button-modal btn-success" type="button" onclick="handleBatalLogout()">Batal</button>
                        <a href="./sign-in.php"><button class="button button-modal btn-warning" type="button">Logout</button></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

<script src="assets/js/script.js"></script>

</html>