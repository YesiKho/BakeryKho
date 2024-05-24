<div class="w-full min-h-8  mt-3 mb-1">
    <?php if (isset($_SESSION['flash'])) : ?>
        <div class="w-full flash-<?= $_SESSION['flash']['status'] ?> <?= $_SESSION['flash']['status'] == 'info' ? 'text-bistre' : 'text-linen' ?> font-medium py-2 px-4 rounded-lg">
            <p class="truncate"><?= $_SESSION['flash']['message']; ?></p>
        </div>
    <?php endif; ?>
</div>