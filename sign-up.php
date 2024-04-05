<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Yesi Kho Sutrisno - 222410103007</title>
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <main class="main-authentication">
        <section class="container-form">
            <div class="authentication">
                <div class="authentication-title">
                    <h1 class="heading-title">Sign Up</h1>
                    <p class="sub-heading-title">Create your <b>BakeryKho</b> account.</p>
                </div>
                <div class="authentication-form-container">
                    <div class="authentication-form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" maxlength="35" required />
                        </div>
                        <div class="form-group-wrap">
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" maxlength="15" required />
                            </div>
                            <div class="form-group">
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone" maxlength="13" pattern="[0-9]" required />
                            </div>
                        </div>
                        <div class="form-group-wrap">
                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" maxlength="15" required />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password" maxlength="15" required />
                            </div>
                        </div>
                    </div>
                    <div class="authentication-button-wrap">
                        <a href="./login.php">
                            <button class="button btn-sage">Sign Up</button>
                        </a>
                    </div>
                </div>
                <p class="text-authentication">Already have an Account <a href="./sign-in.php">Sign In</a></p>
            </div>
            <div class="image-form">
                <img src="assets/images/cake-shop-cute.png" alt="" />
            </div>
        </section>
    </main>
</body>

</html>