<?php
require_once __DIR__ .  '/../models/products.php';

$searchProduct = $_GET['search'] ? Product::searchProduct($_GET['search']) : Product::getAll();
?>

<?php foreach ($searchProduct['data'] as $product) : ?>
    <div class='w-full rounded-xl shadow-md overflow-hidden flex flex-col justify-between mb-10'>
        <div>
            <div class='transition duration-300 hover:brightness-75'>
                <img src='public/images/products/<?= $product['image']; ?>' alt='<?= $product['title']; ?>' class='object-cover w-full h-44 md:h-56' />
            </div>
            <div class='flex flex-col gap-2 p-6'>
                <p class='text-lg font-bold capitalize'>
                    <?= $product['title']; ?>
                </p>
                <p class='text-sm font-medium capitalize'>
                    <?= $product['description']; ?>
                </p>
            </div>
        </div>
        <div class='flex flex-col gap-4 p-6'>
            <div class='flex justify-between items-center'>
                <p class='text-lg font-semibold py-2'>
                    IDR <?= number_format($product['price']) ?>
                </p>
                <a href='' class='button button-primary font-medium text-white capitalize'>Order Now</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>