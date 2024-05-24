<?php $title = 'users' ?>

<?php ob_start() ?>
<main>
    <div class="container">
        <div class="main-content border border-sage rounded-lg p-8">
            <h1 class="text-xl font-semibold capitalize">Create User</h1>
            <?php include 'views/includes/flasher.php' ?>
            <form action="<?= route('users.store'); ?>" method="post" enctype="multipart/form-data" class="mt-4">
                <div class="w-full flex flex-col items-start relative group/input">
                    <label for="name" id="label-name" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm capitalize">Name</label>
                    <input type="text" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none focus-within:border" name="auth[name]" id="name" value="<?= $_SESSION['form_alert']['data']['name'] ?? $_SESSION['flash']['data']['name'] ?? ''; ?>">
                    <div class="w-full min-h-8">
                        <?php if (isset($_SESSION['form_alert']['error']['name'])) : ?>
                            <p class="px-4 pt-1 pb-2 text-sm text-red-500 font-medium capitalize"><?= $_SESSION['form_alert']['error']['name']; ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5">
                    <div class="w-full flex flex-col items-start relative group/input">
                        <label for="email" id="label-email" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm capitalize">Email</label>
                        <input type="email" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none focus-within:border" name="auth[email]" id="email" value="<?= $_SESSION['form_alert']['data']['email'] ?? $_SESSION['flash']['data']['email'] ?? ''; ?>">
                        <div class="w-full min-h-8">
                            <?php if (isset($_SESSION['form_alert']['error']['email'])) : ?>
                                <p class="px-4 pt-1 pb-2 text-sm text-red-500 font-medium capitalize"><?= $_SESSION['form_alert']['error']['email']; ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="w-full flex flex-col items-start relative group/input">
                        <label for="role" id="label-role" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm capitalize">Role</label>
                        <select name="auth[role]" id="role" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none focus-within:border">
                            <?php foreach ($roles['data'] as $role) : ?>
                                <option value="<?= $role['role_id'] ?>" <?= ($role['title'] == 'USER') ? 'selected="selected"' : '' ?>>
                                    <?= $role['title']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5">
                    <div class="w-full flex flex-col items-start relative group/input">
                        <label for="password" id="label-password" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm capitalize">password</label>
                        <input type="password" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none focus-within:border" name="auth[password]" id="password" value="<?= $_SESSION['form_alert']['data']['password'] ?? $_SESSION['flash']['data']['password'] ?? ''; ?>">
                        <?php if (!isset($_SESSION['form_alert']['error']['not_match_password'])) : ?>
                            <div class="w-full min-h-8">
                                <?php if (isset($_SESSION['form_alert']['error']['password'])) : ?>
                                    <p class="px-4 pt-1 pb-2 text-sm text-red-500 font-medium capitalize"><?= $_SESSION['form_alert']['error']['password']; ?></p>
                                <?php endif ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="w-full flex flex-col items-start relative group/input">
                        <label for="confirm_password" id="label-confirm_password" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm capitalize">Confirm Password</label>
                        <input type="password" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none focus-within:border" name="auth[confirm_password]" id="confirm_password">
                        <?php if (!isset($_SESSION['form_alert']['error']['not_match_password'])) : ?>
                            <div class="w-full min-h-8">
                                <?php if (isset($_SESSION['form_alert']['error']['confirm_password'])) : ?>
                                    <p class="px-4 pt-1 pb-2 text-sm text-red-500 font-medium capitalize"><?= $_SESSION['form_alert']['error']['confirm_password']; ?></p>
                                <?php endif ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <?php if (!isset($_SESSION['form_alert']['error']['password']) || !isset($_SESSION['form_alert']['error']['confirm_password'])) : ?>
                    <?php if (isset($_SESSION['form_alert']['error']['not_match_password'])) : ?>
                        <p class="px-4 pt-1 pb-2 text-sm text-red-500 font-medium lowercase"><?= $_SESSION['form_alert']['error']['not_match_password']; ?></p>
                    <?php endif ?>
                <?php endif ?>
                <div class="w-full flex flex-col items-start relative group/input">
                    <label for="address" id="label-address" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm capitalize">Address</label>
                    <input type="text" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none" name="auth[address]" id="address" maxlength="100" value="<?= $_SESSION['form_alert']['data']['address'] ?? $_SESSION['flash']['data']['address'] ?? ''; ?>">
                    <div class="w-full min-h-8">
                        <?php if (isset($_SESSION['form_alert']['error']['address'])) : ?>
                            <p class="px-4 pt-1 pb-2 text-sm text-red-500 font-medium capitalize"><?= $_SESSION['form_alert']['error']['address']; ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5 mb-4">
                    <div class="w-full flex flex-col items-start relative group/input">
                        <label for="postal_code" id="label-postal_code" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm capitalize">Postal Code</label>
                        <input type="text" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none focus-within:border" name="auth[postal_code]" id="postal_code" value="<?= $_SESSION['form_alert']['data']['postal_code'] ?? $_SESSION['flash']['data']['postal_code'] ?? ''; ?>">
                        <div class="w-full min-h-8">
                            <?php if (isset($_SESSION['form_alert']['error']['postal_code'])) : ?>
                                <p class="px-4 pt-1 pb-2 text-sm text-red-500 font-medium capitalize"><?= $_SESSION['form_alert']['error']['postal_code']; ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="w-full flex flex-col items-start relative group/input">
                        <label for="phone_number" id="label-phone_number" class="absolute text-sage ml-2 mt-2 px-2 transition-all ease-in-out duration-500 bg-white group-focus-within/input:-translate-y-4 group-focus-within/input:text-sm capitalize">Phone Number</label>
                        <input type="text" class="w-full text-sm border rounded-lg border-sage px-4 py-3 outline-none focus-within:border" name="auth[phone_number]" id="phone_number" value="<?= $_SESSION['form_alert']['data']['phone_number'] ?? $_SESSION['flash']['data']['phone_number'] ?? ''; ?>">
                        <div class="w-full min-h-8">
                            <?php if (isset($_SESSION['form_alert']['error']['phone_number'])) : ?>
                                <p class="px-4 pt-1 pb-2 text-sm text-red-500 font-medium capitalize"><?= $_SESSION['form_alert']['error']['phone_number']; ?></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end items-center gap-4">
                    <a href="<?= route('users'); ?>"><button class="button button-secondary" type="button">Kembali</button></a>
                    <button class="button button-primary capitalize" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>

</main>

<?php $content = ob_get_clean() ?>

<?php require 'views/layouts/admin.php'; ?>