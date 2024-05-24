<div class="w-full h-80 flex justify-evenly items-center relative">
    <img src="public/images/footer.jpg" alt="footer-image" class="w-full h-full object-cover object-center">
    <div class="absolute w-full h-full bg-black/65 top-0 mix-blend-multiply"></div>
    <div class="absolute w-2/3 h-full py-10 px-16 top-0 flex flex-col justify-center gap-6 text-linen">
        <div class="flex items-center gap-4">
            <img src="public/images/aflogo-sm.png" alt="BakeryKho" class="w-12">
            <p class="font-semibold text-lg leading-loose">BakeryKho</p>
        </div>

        <div class="flex justify-between items-center">
            <div class="flex flex-col gap-4">
                <p class="font-semibold text-base"><?= $contacts['title']; ?></p>
                <div class="flex flex-col justify-center gap-3">
                    <?php foreach ($contacts['sub-title'] as $sub_title) : ?>
                        <p><?= $sub_title; ?></p>
                    <?php endforeach ?>
                </div>
                <div class="flex items-center gap-5">
                    <?php if (isset($contacts['social_media'])) : ?>
                        <?php foreach ($contacts['social_media'] as $social_media) : ?>
                            <a href="#" class="hover:text-sage">
                                <i class="<?= $social_media; ?> text-lg"></i>
                            </a>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
            <?php foreach ($footerMenus as $menu) : ?>
                <div class="h-full min-w-36 flex flex-col gap-4">
                    <p class="font-semibold text-base"><?= $menu['title']; ?></p>
                    <div class="flex flex-col justify-center gap-3">
                        <?php foreach ($menu['sub-title'] as $sub_title) : ?>
                            <a href="#" class="hover:text-error hover:font-medium"><?= $sub_title; ?></a>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>