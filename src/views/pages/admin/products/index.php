<?php $title = 'Product' ?>
<?php ob_start() ?>
<main>
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
                    <a href="<?= route('products.create'); ?>" class="a-wrap">
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
                                <td><img class="table-profile-image" src="/src/assets/images/products/<?= $product['image']; ?>" alt="<?= $product['name']; ?>" /></td>
                                <td>
                                    <p class="capitalize"><?= $product['name']; ?></p>
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
                                    <div class="flex justify-center items-center gap-4">
                                        <a href="<?= route('products.edit?product_id=' . $product['product_id']); ?>">
                                            <button class="button button-icon btn-success" type="button"><i class="bi bi-pencil icon"></i></button>
                                        </a>
                                        <button class="button button-icon btn-warning" type="button" onclick="handleModal('#modal-delete-<?= $product['product_id']; ?>')"><i class="bi bi-trash icon"></i></button>

                                        <?php include('src/views/includes/admin/modal-delete.php') ?>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<?php $content = ob_get_clean() ?>

<?php include 'src/views/layout/admin.php' ?>