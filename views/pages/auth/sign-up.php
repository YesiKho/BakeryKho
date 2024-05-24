<?php $title = 'register' ?>

<?php ob_start() ?>
<div class="authentication">
    <div class="authentication-title">
        <h1 class="heading-titlee text-3xl font-semibold text-cardinal">Sign Up</h1>
        <p class="sub-heading-titlee font-medium text-buff">Create your <b>BakeryKho</b> account.</p>
    </div>
    <div class="authentication-form-container">
        <form action="<?= route('register.store'); ?>" method="post" class="authentication-form">
            <?php include 'views/includes/flasher.php' ?>
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="auth[name]" placeholder="Fullname" maxlength="255" value="<?= $_SESSION['form_alert']['data']['name'] ?? $_SESSION['flash']['data']['name'] ?? '' ?>" required />
                <div class="w-full min-h-7">
                    <?php if (isset($_SESSION['form_alert']['error']['name'])) : ?>
                        <p class="px-4 pt-2 text-sm text-red-500 font-medium lowercase"><?= $_SESSION['form_alert']['error']['name']; ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="auth[email]" placeholder="Email" maxlength="255" value="<?= $_SESSION['form_alert']['data']['email'] ?? $_SESSION['flash']['data']['email'] ?? ''; ?>" required />
                <div class="w-full min-h-7">
                    <?php if (isset($_SESSION['form_alert']['error']['email'])) : ?>
                        <p class="px-4 pt-2 text-sm text-red-500 font-medium lowercase"><?= $_SESSION['form_alert']['error']['email'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group-wrap">
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="auth[password]" placeholder="Password" maxlength="255" required />
                    <?php if (isset($_SESSION['form_alert']['error']['password'])) : ?>
                        <div class="w-full min-h-7">
                            <p class="px-4 pt-2 text-sm text-red-500 font-medium lowercase"><?= $_SESSION['form_alert']['error']['password']; ?></p>
                        </div>
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="confirm_password" name="auth[confirm_password]" placeholder="Confirm Password" maxlength="255" required />
                    <?php if (isset($_SESSION['form_alert']['error']['confirm_password'])) : ?>
                        <div class="w-full min-h-7">
                            <p class="px-4 pt-2 text-sm text-red-500 font-medium lowercase"><?= $_SESSION['form_alert']['error']['confirm_password']; ?></p>
                        </div>
                    <?php endif ?>
                </div>

            </div>
            <?php if (!isset($_SESSION['form_alert']['error']['password']) || !isset($_SESSION['form_alert']['error']['confirm_password'])) : ?>
                <div class="w-full min-h-7">
                    <?php if (isset($_SESSION['form_alert']['error']['not_match_password'])) : ?>
                        <p class="px-4 pt-2 text-sm text-red-500 font-medium lowercase"><?= $_SESSION['form_alert']['error']['not_match_password']; ?></p>
                    <?php endif ?>
                </div>
            <?php endif ?>
            <div class="form-group">
                <input type="text" class="form-control" id="address" name="auth[address]" placeholder="Address" value="<?= $_SESSION['form_alert']['data']['address'] ?? $_SESSION['flash']['data']['address'] ?? ''; ?>" />
                <div class="w-full min-h-7">
                    <?php if (isset($_SESSION['form_alert']['error']['address'])) : ?>
                        <p class="px-4 pt-2 text-sm text-red-500 font-medium lowercase"><?= $_SESSION['form_alert']['error']['address']; ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group-wrap">
                <div class="form-group">
                    <input type="text" class="form-control" id="postal_code" name="auth[postal_code]" placeholder="Postal Code" maxlength="8" value="<?= $_SESSION['form_alert']['data']['postal_code'] ?? $_SESSION['flash']['data']['postal_code'] ?? ''; ?>" />
                    <div class="w-full min-h-7">
                        <?php if (isset($_SESSION['form_alert']['error']['postal_code'])) : ?>
                            <p class="px-4 pt-2 text-sm text-red-500 font-medium lowercase"><?= $_SESSION['form_alert']['error']['postal_code']; ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" id="phone" name="auth[phone_number]" placeholder="Phone" maxlength="13" value="<?= $_SESSION['form_alert']['data']['phone_number'] ?? $_SESSION['flash']['data']['phone_number'] ?? ''; ?>" required />
                    <div class="w-full min-h-7">
                        <?php if (isset($_SESSION['form_alert']['error']['phone_number'])) : ?>
                            <p class="px-4 pt-2 text-sm text-red-500 font-medium lowercase"><?= $_SESSION['form_alert']['error']['phone_number']; ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="authentication-button-wrap mt-4">
                <button class="button button-primary" type="submit">Sign Up</button>
            </div>
        </form>
    </div>
    <p class="text-authentication">Already have an Account <a href="<?= route(''); ?>" class="text-sage font-medium hover:text-desertSand">Sign In</a></p>
</div>

<?php $content = ob_get_clean() ?>

<?php require 'views/layouts/authentication.php'; ?>