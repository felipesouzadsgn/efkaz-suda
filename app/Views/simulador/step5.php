<?php
$step1Data = session()->get('step1Data');
$sessionID = session()->get('visitHash');
?>

<?= $this->extend('layouts/simulador') ?>

<?= $this->section('head') ?>
<style>
    .main-content {
        max-width: 980px;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // $(document).ready(function () {
    // Evento de clique no botão "Gostei, quero contratar agora"
    $('#btn-cadastro').on('click', function (e) {
        // e.preventDefault(); // Previne o envio padrão do formulário
        $('#input-escolha').val($(this).text()); // Preenche com o texto do botão
        $('#input-cadastro').val('true'); // Marca como cadastro verdadeiro
        // $('#stepForm').off('submit').submit(); // Envia o formulário manualmente
    });

    // Evento de clique no botão "Não, obrigado!"
    $('#btn-obrigado').on('click', function (e) {
        // e.preventDefault(); // Previne o envio padrão do formulário
        $('#input-escolha').val($(this).text()); // Preenche com o texto do botão
        $('#input-cadastro').val('false'); // Marca como cadastro falso
        // $('#stepForm').submit(); // Envia o formulário manualmente
    });
    // });

</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section__content">
        <h1 class="section__title">Ótima escolha <?= $step1Data['nome'] ?></h1>

        <form action="<?= base_url('/simulador/save') ?>" method="post" class="form" id="stepForm">
            <input type="hidden" name="step" value="5">

            <input type="hidden" name="escolha" id="input-escolha" value="">
            <input type="hidden" name="cadastro" id="input-cadastro" value="">

            <div class="section__data-list">
                <div class="section__data-item">
                    <span class="section__data-item-name">Seguro Sudaseg</span>
                    <span class="section__data-item-result">R$ 1.000,00</span>
                </div>
                <hr>
                <div class="section__data-item">
                    <span class="section__data-item-name">Nome</span>
                    <span class="section__data-item-result"><?= $step1Data['nome'] ?></span>
                </div>
                <div class="section__data-item">
                    <span class="section__data-item-name">Mensalidade</span>
                    <span class="section__data-item-result">R$ 147,00/mês</span>
                </div>

                <div class="form__btns">
                    <div class="">
                        <?= view('components/button_with_icon', [
                            'type' => 'submit',
                            'variant' => 'primary',
                            'icon' => null,
                            'text' => 'Finalizar proposta',
                            'id' => 'btn-cadastro'
                        ]) ?>
                    </div>
                    <div class="mt-2">
                        <?= view('components/button_with_icon', [
                            'type' => 'button',
                            'variant' => 'secondary',
                            'icon' => null,
                            'text' => 'Não brigado!',
                            'id' => 'btn-obrigado'
                        ]) ?>
                    </div>
                </div>
        </form>
    </div>
</section>
<?= $this->endSection() ?>