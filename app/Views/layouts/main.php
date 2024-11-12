<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title><?= $title ?? 'Minha Aplicação' ?></title>
    <?= $this->renderSection('head') ?>
</head>

<body>
    <div class="container h-100 p-3 mx-auto flex-column">
        <main class="px-3">
            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <script src="<?= base_url('assets/jquery/jquery.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?= $this->renderSection('scripts') ?>
</body>