<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? 'Minha Aplicação' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="theme-color" content="#712cf9">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="<?= base_url('css/box.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/simulator.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/input-style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/button-style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/progress-bar-style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/form-style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/section.css') ?>">

    <style>
        body {
            overflow-x: hidden;
        }

        .main {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>

    <?= $this->renderSection('head') ?>
</head>

<body>
    <div class="simulator">
        <div class="simulator__container">
            <div class="simulator__side">
                <header class="simulator__header"></header>
                <a href="/" class="">
                    <img src="<?= base_url('img/logo-suda.png') ?>" alt="Logo Suda" class="simulator__logo">
                </a>
                <footer class="simulator__footer">
                    <h4 class="simulator__footer-title">A sua seguradora.</h4>
                    <p class="simulator__footer-description">Confira nossos produtos no site.</p>
                </footer>
            </div>
        </div>
        <main class="main">
            <header class="header">
                <a href="/" class="">
                    <img src="<?= base_url('img/logo-suda.png') ?>" alt="Logo Suda" class="simulator__logo-mobile">
                </a>
            </header>
            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('js/wizard.js') ?>"></script>

    <?= $this->renderSection('scripts') ?>
</body>