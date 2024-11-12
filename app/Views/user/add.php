<form action="<?= base_url('/user/registrar') ?>" method="post">
    <input type="text" name="name" placeholder="Nome" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Cadastrar</button>
</form>