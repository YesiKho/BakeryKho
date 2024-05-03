<section class="container-modal hidden" id="modal-delete-<?= $product['product_id']; ?>">
    <div class="wrap-modal">
        <div class="modal">
            <div class="modal-body gap-10 max-w-[30rem]">
                <p>Apakah anda yakin ingin menghapus product <span class="font-medium capitalize"><?= $product['name']; ?></span>?</p>
                <div class="flex justify-evenly">
                    <button class="button button-modal btn-success" type="button" onclick="handleModal('#modal-delete-<?= $product['product_id']; ?>')">Batal</button>
                    <!-- <a href="?product_id=<?= $product['product_id']; ?>"><button class="button button-modal btn-warning" type="button">Delete</button></a> -->
                    <a href="<?= Route('products.destroy?product_id=' . $product['product_id']); ?>"><button class="button button-modal btn-warning" type="button">Delete</button></a>
                </div>
            </div>
        </div>
    </div>
</section>