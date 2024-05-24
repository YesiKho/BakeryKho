<section class="container-modal hidden" id="modal-delete-<?= $product['product_id']; ?>">
    <div class="wrap-modal">
        <div class="modal">
            <div class="modal-body gap-10 max-w-[30rem]">
                <p>Apakah anda yakin ingin menghapus product <span class="font-medium capitalize"><?= $product['title']; ?></span>?</p>
                <form action="<?= Route("products.destroy.{$product['product_id']}"); ?>" method="post" class="flex justify-evenly">
                    <button class="button button-modal button-success" type="button" onclick="handleModal('#modal-delete-<?= $product['product_id']; ?>')">Batal</button>
                    <button class="button button-modal button-warning" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</section>