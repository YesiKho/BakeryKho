<div class="container-modal hidden" id="modal-logout">
    <div class="wrap-modal">
        <div class="modal">
            <div class="modal-body gap-10">
                <p>Apakah anda yakin untuk logout?</p>
                <form action="<?= route('login.destroy'); ?>" method="post" class="flex justify-evenly">
                    <button class="button button-primary" type="button" onclick="handleModal('#modal-logout')">Batal</button>
                    <button class="button button-modal button-warning" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>