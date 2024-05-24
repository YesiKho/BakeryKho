<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BakeryKho - Admin</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEDIR . "public/images/aflogo-light.png" ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEDIR . "public/css/output.css" ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
</head>

<body>
    <main class="w-screen h-screen flex justify-center flex-wrap items-center relative overflow-hidden">
        <section class="grid grid-cols-2 items-center border border-sage rounded-xl p-8 max-w-[70rem] box-border">
            <?= $content ?? ''; ?>
            <div class="image-form inline-flex justify-center">
                <img src="public/images/cake-shop-cute.png" alt="" />
            </div>
        </section>
    </main>
</body>
<script src="<?= BASEDIR . "public/js/script.js" ?>"></script>

</html>