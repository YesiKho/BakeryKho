<?php $title = 'login'; ?>

<?php ob_start() ?>
<div class="authentication">
    <div class="authentication-title">
        <h1 class="heading-title">Sign In</h1>
        <p class="sub-heading-title">Login to stay connected with <b>BakeryKho</b></p>
    </div>
    <div class="authentication-form-container">
        <form action="<?= route('login.store'); ?>" method="post" class="authentication-form">
            <?php include 'views/includes/flasher.php' ?>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="auth[email]" placeholder="Email" value="<?= $_SESSION['form_alert']['data']['email'] ?? $_SESSION['flash']['data']['email'] ?? ''; ?>" maxlength="255" required />
                <div class="w-full min-h-7">
                    <?php if (isset($_SESSION['form_alert']['error']['email'])) : ?>
                        <p class="px-4 pt-2 text-sm text-red-500 font-medium lowercase"><?= $_SESSION['form_alert']['error']['email']; ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="auth[password]" placeholder="Password" maxlength="255" required />
                <div class="w-full min-h-7">
                    <?php if (isset($_SESSION['form_alert']['error']['password'])) : ?>
                        <p class="px-4 pt-2 text-sm text-red-500 font-medium lowercase"><?= $_SESSION['form_alert']['error']['password']; ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="authentication-button-wrap mt-4">
                <button class="button button-success" type="submit">Sign In</button>
            </div>
        </form>
    </div>
    <p class="text-authentication">Create an Account <a href="<?= route('register'); ?>">Sign Up</a></p>
</div>

<?php $content = ob_get_clean() ?>

<?php require 'views/layouts/authentication.php'; ?>