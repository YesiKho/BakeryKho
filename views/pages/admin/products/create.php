<?php $title = 'products' ?>

<?php ob_start() ?>
<main>
    <div class="container">
        <div class="main-content border border-sage rounded-lg p-8">
            <h1 class="text-xl font-semibold capitalize">Create Product</h1>
            <?php include 'views/includes/flasher.php' ?>
            <form action="<?= route('products.store'); ?>" method="post" enctype="multipart/form-data" class="mt-4">
                <div class="grid grid-cols-2 gap-5 mb-4">
                    <div class="w-full relative group/input">
                        <label for="image" id="label-image" class="absolute text-sage ml-2 mt-2 px-2 bg-white -translate-y-4 text-sm">Image</label>
                        <input type="file" name="image" id="image" accept="image/jpeg, image/jpg, image/png" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none transition-all ease-in-out file:rounded-lg file:bg-sage/80 file:border-none file:px-4 file:py-1 file:hover:cursor-pointer file:hover:bg-sage">
                    </div>
                    <div class="w-full flex flex-col items-start relative group/input">
                        <label for="title" id="label-title" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm">Title Product</label>
                        <input type="text" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none focus-within:border" name="product[title]" id="title" value="<?= $_SESSION['form_alert']['data']['title'] ?? $_SESSION['flash']['data']['title'] ?? ''; ?>" required>
                        <div class="w-full min-h-7">
                            <?php if (isset($_SESSION['form_alert']['error']['title'])) : ?>
                                <p class="px-4 pt-2 text-sm text-red-500 font-medium"><?= $_SESSION['form_alert']['error']['title']; ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="w-full flex flex-col items-start relative group/input">
                        <label for="price" id="label-price" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm">Price</label>
                        <input type="text" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none" name="product[price]" id="price" value="<?= $_SESSION['form_alert']['data']['price'] ?? $_SESSION['flash']['data']['price'] ?? ''; ?>" required>
                        <div class="w-full min-h-7">
                            <?php if (isset($_SESSION['form_alert']['error']['price'])) : ?>
                                <p class="px-4 pt-2 text-sm text-red-500 font-medium"><?= $_SESSION['form_alert']['error']['price']; ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="w-full flex flex-col items-start relative group/input">
                        <label for="stock" id="label-stock" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm ">Stock</label>
                        <input type="text" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none" name="product[stock]" id="stock" value="<?= $_SESSION['form_alert']['data']['stock'] ?? $_SESSION['flash']['data']['stock'] ?? ''; ?>" required>
                        <div class="w-full min-h-7">
                            <?php if (isset($_SESSION['form_alert']['error']['stock'])) : ?>
                                <p class="px-4 pt-2 text-sm text-red-500 font-medium"><?= $_SESSION['form_alert']['error']['stock']; ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-col items-start relative group/input">
                    <label for="description" id="label-description" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm ">Description</label>
                    <input type="text" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none" name="product[description]" id="description" maxlength="100" value="<?= $_SESSION['form_alert']['data']['description'] ?? $_SESSION['flash']['data']['description'] ?? ''; ?>">
                    <div class="w-full min-h-7">
                        <?php if (isset($_SESSION['form_alert']['error']['description'])) : ?>
                            <p class="px-4 pt-2 text-sm text-red-500 font-medium"><?= $_SESSION['form_alert']['error']['description']; ?></p>
                        <?php endif ?>
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

<?php require 'views/layouts/admin.php'; ?>