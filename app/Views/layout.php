<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Livro caixa</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/f048f5a1e0.js"></script>

</head>
<body>

<?php
    $session = session();
    $errors = $session->getFlashdata('errors');
    $success = $session->getFlashdata('success');
?>

<!-- HEADER: MENU + HEROE SECTION -->
<header>

    <div class="menu">
        <ul>
            <li class="logo">
                <a href="<?= base_url('dashboard/index') ?>" style="color:green;"> 
                    <i class="fa fa-usd"></i> Cashbook
                </a>
            </li>
            <li class="menu-toggle">
                <button onclick="toggleMenu();">&#9776;</button>
            </li>
            <li class="menu-item hidden"><a href="<?= base_url('dashboard/index') ?>">Dashboard</a></li>
            <li class="menu-item hidden"><a href="<?= base_url('user/index') ?>">User</a>
            </li>
            <li class="menu-item hidden"><a href="<?= base_url('moviment/index') ?>" >Moviment</a></li>
            <li class="menu-item hidden"><a href="<?= base_url('auth/logout') ?>">Logout (<?= $session->name ?>)</a>
            </li>
        </ul>
    </div>


</header>

<!-- CONTENT -->

<section>

    <?php if($errors): ?>
        <div class="alert alert-danger">
            <p class="text-center">
                <?php foreach($errors as $err): ?>
                    <?= $err ?><br>
                <?php endforeach ?>
            </p>
        </div>
    <?php endif ?>

    <?php if($success): ?>
        <div class="alert alert-success">
            <p class="text-center"><?= $success ?><br></p>
        </div>
    <?php endif ?>

    <?= $this->renderSection('content') ?>
    <?= $this->renderSection('script') ?>

</section>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>

    <div class="copyrights">

        <p>&copy; <?= date('Y') ?> cashbook</p>

    </div>

</footer>

<!-- SCRIPTS -->

<script>
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!-- -->

</body>
</html>
