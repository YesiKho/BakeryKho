<div class="container-modal hidden" id="modal-delete">
    <div class="wrap-modal">
        <div class="modal">
            <div class="modal-body gap-10">
                <p>Apakah anda yakin ingin menghapus product <?= $product['name']; ?></p>
                <div class="flex justify-evenly">
                    <button class="button button-modal btn-success" type="button" onclick="handleModal('#modal-delete')">Batal</button>
                    <a href="?product_id=<?= $product['id']; ?>"><button class="button button-modal btn-warning" type="button">Delete</button></a>
                </div>
            </div>
        </div>
    </div>
</div>