<?php $title = 'products' ?>

<?php ob_start() ?>
<section class="container">
  <div class="main-content">
    <div class="header-content">
      <h1 class="font-semibold text-xl leading-loose">BakeryKho</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, asperiores.</p>
    </div>

    <div class="w-full mt-6">
      <div class="flex justify-between items-center">
        <div class="max-w-[50rem] overflow-hidden">
          <?php include 'views/includes/flasher.php' ?>
        </div>
        <a href="<?= route('products.create'); ?>">
          <button type="button" class="button button-success font-medium">Add Product</button>
        </a>
      </div>
      <table class="table-auto w-full mt-8 border border-solid border-sage rounded-lg border-separate border-spacing-0 overflow-hidden [&:nth-child(1)]:*:*:*:text-center [&:nth-child(2)]:*:*:*:text-center [&:nth-child(5)]:*:*:*:text-center last:*:*:*:text-center *:*:text-left *:*:*:py-3 *:*:*:px-2">
        <thead>
          <tr class="">
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="odd:*:bg-sage/30 hover:*:bg-sage/50 *:*:border-t *:*:border-sage">
          <?php if ($products['data'] && count($products['data']) > 0) : ?>
            <?php $i = 0 ?>
            <?php foreach ($products['data'] as $product) : $i++ ?>
              <tr>
                <td><?= $i; ?></td>
                <td><img class="w-14 h-14 block m-auto object-center object-cover border border-sage bg-desertSand rounded-full" src="public/images/products/<?= $product['image']; ?>" /></td>
                <td>
                  <p><?= $product['title']; ?></p>
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
                    <a href="<?= route("products.edit.{$product['product_id']}"); ?>">
                      <button class="button button-icon button-success" type="button"><i class="bi bi-pencil icon"></i></button>
                    </a>
                    <button class="button button-icon button-warning" type="button" onclick="handleModal('#modal-delete-<?= $product['product_id']; ?>')"><i class="bi bi-trash icon"></i></button>
                    <?php include 'views/includes/admin/modal-delete-product.php' ?>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="6" class="text-center">product data is empty</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

  </div>
</section>

<?php $content = ob_get_clean() ?>

<?php require 'views/layouts/admin.php'; ?>