<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<link href="<?= base_url('css/login.css') ?>" rel="stylesheet">
<main class="form-signin w-100 m-auto">
  <form action="<?= base_url('/user/autorizar') ?>" method="post">
    <h2>SudaSeg</h2>
    <h1 class="h3 mb-3 fw-normal">Faça login</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="seu@email.com">
      <label for="floatingInput">E-mail</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Senha">
      <label for="floatingPassword">Senha</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Manter conectado
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2020</p>
  </form>
</main>


<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>
<?= $this->endSection() ?>