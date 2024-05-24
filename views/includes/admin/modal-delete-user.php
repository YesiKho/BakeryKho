<section class="container-modal hidden" id="modal-delete-<?= $user['user_id']; ?>">
    <div class="wrap-modal">
        <div class="modal">
            <div class="modal-body gap-10 max-w-[30rem]">
                <p>Are you sure you want to delete the account for <span class="font-medium capitalize"><?= $user['name']; ?></span>?</p>
                <form action="<?= Route("users.destroy.{$user['user_id']}"); ?>" method="post" class="flex justify-evenly">
                    <button class="button button-modal button-success" type="button" onclick="handleModal('#modal-delete-<?= $user['user_id']; ?>')">Batal</button>
                    <button class="button button-modal button-warning" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</section>