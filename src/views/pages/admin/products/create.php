<?php $title = 'CREATE' ?>

<?php ob_start() ?>
<main>
    <div class="container">
        <div class="main-content border border-sage rounded-lg">
            <h1 class="text-xl font-medium capitalize">Create Product</h1>
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
            <form action="<?= route('products.store'); ?>" method="post" enctype="multipart/form-data" class="form">
                <div class="grid grid-cols-2 gap-5 mb-4">
                    <div class="w-full relative group/input">
                        <label for="name" id="label-image" class="absolute text-sage ml-2 mt-2 px-2 bg-white -translate-y-4 text-sm">Image</label>
                        <input type="file" name="image" id="image" accept="image/jpeg, image/jpg, image/png" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none transition-all ease-in-out file:rounded-lg file:bg-sage/80 file:border-none file:px-4 file:py-1 file:hover:cursor-pointer file:hover:bg-sage">
                    </div>
                    <div class="w-full flex flex-col items-start relative group/input">
                        <label for="name" id="label-name" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm">Name Product</label>
                        <input type="text" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none focus-within:border" name="product[name]" id="name" required>
                    </div>
                    <div class="w-full flex flex-col items-start relative group/input">
                        <label for="price" id="label-price" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm">Price</label>
                        <input type="text" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none" name="product[price]" id="price" required>
                    </div>
                    <div class="w-full flex flex-col items-start relative group/input">
                        <label for="stock" id="label-stock" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm ">Stock</label>
                        <input type="text" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none" name="product[stock]" id="stock" required>
                    </div>
                </div>
                <div class="flex justify-end items-center gap-4">
                    <a href="<?= route('products'); ?>"><button class="button button-secondary" type="button">Kembali</button></a>
                    <button class="button button-primary capitalize" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>

</main>

<?php $content = ob_get_clean() ?>

<?php include 'src/views/layout/admin.php' ?>