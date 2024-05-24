<?php ob_start() ?>

<section>

    <div class="w-full h-screen overflow-hidden relative">
        <img src="public/images/hero-image3.jpg" alt="hero-image" class="w-full h-full object-cover object-center">
        <div class="absolute w-full h-full bg-black/20 top-0 mix-blend-multiply"></div>
        <div class="absolute top-0 left-0 w-full h-full py-10 px-44 flex flex-col justify-center gap-6 text-linen">
            <div class="w-1/3 flex flex-col gap-5">
                <p class="text-7xl font-medium">Full Flavor, All Natural</p>
                <p class="tracking-wide">Cakes designed with the 'wow' factor in mind. Impress your
                    quests with these amazing looking and tasting cakes.</p>
                <div class="flex mt-10">
                    <button class="button button-error !px-16">Discover Menu</button>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full min-h-screen py-24 px-44 ">
        <div class="w-full mt-5 mb-16 flex justify-center items-center">
            <div class="w-2/3 flex justify-center items-center relative">
                <label for="search" class="absolute right-5 text-xl"><i class="bi bi-search"></i></label>
                <input type="text" id="search" placeholder="Search for products..." class="w-full bg-slate-100 px-4 py-3 outline-none rounded-md shadow-md">
            </div>
        </div>
        <p class="text-xl text-center font-bold">Our Exclusive Cakes</p>
        <div class="grid grid-cols-3 gap-8 mt-10" id="results">
            <?php foreach ($products['data'] as $product) : ?>
                <div class="w-full rounded-xl shadow-md overflow-hidden flex flex-col justify-between mb-10">
                    <div>
                        <div class="transition duration-300 hover:brightness-75">
                            <img src="public/images/products/<?= $product['image']; ?>" alt="<?= $product['title']; ?>" class="object-cover w-full h-44 md:h-56" />
                        </div>
                        <div class="flex flex-col gap-2 p-6">
                            <p class="text-lg font-bold capitalize">
                                <?= $product['title']; ?>
                            </p>
                            <p class="text-sm font-medium capitalize">
                                <?= $product['description']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 p-6">
                        <div class="flex justify-between items-center">
                            <p class="text-lg font-semibold py-2">
                                IDR <?= number_format($product['price']); ?>
                            </p>
                            <a href="<?php route('login') ?>" class="button button-error font-medium text-white capitalize">Order Now</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

<?php $content = ob_get_clean() ?>

<?php require 'views/layouts/app.php';
