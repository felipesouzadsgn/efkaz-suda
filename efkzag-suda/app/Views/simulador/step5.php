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
        $('#btn-cadastro').on('click', function(e){
            // e.preventDefault(); // Previne o envio padrão do formulário
            $('#input-escolha').val($(this).text()); // Preenche com o texto do botão
            $('#input-cadastro').val('true'); // Marca como cadastro verdadeiro
            // $('#stepForm').off('submit').submit(); // Envia o formulário manualmente
        });

        // Evento de clique no botão "Não, obrigado!"
        $('#btn-obrigado').on('click', function(e){
            // e.preventDefault(); // Previne o envio padrão do formulário
            $('#input-escolha').val($(this).text()); // Preenche com o texto do botão
            $('#input-cadastro').val('false'); // Marca como cadastro falso
            // $('#stepForm').submit(); // Envia o formulário manualmente
        });
    // });

</script>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="container p-5 bg-light">
    
    <form action="<?= base_url('/simulador/save') ?>" method="post" class="align-self-center" id="stepForm">

        <input type="hidden" name="step" value="5">

        <input type="text" name="escolha" id="input-escolha" value="">
        <input type="text" name="cadastro" id="input-cadastro" value="">


        <h1 class="mb-5">Ótima escolha <?= $step1Data['nome'] ?></h1>

        <div class="row">
            <div class="col text-start">Seguro SudaSeg</div>
            <div class="col text-end">R$1.000.000</div>
        </div>
        <div class="row">

            <div class="col mt-5 mb-5">
                <div class="col-12 text-start">Nome Segurado</div>
                <div class="col-12 text-start">João do Carmo</div>
            </div>
            <div class="col mt-5 mb-5">
                <div class="col-12 text-end">Mensalidade</div>
                <div class="col-12 text-end">R$147,00</div>
            </div>

        </div>


        <div class="row mt-5">
            <button type="submit" id="btn-cadastro" class="btn btn-primary btn-lg btn-full-width mb-2">Gostei, quero contratar agora</button>
            <button type="submit" id="btn-obrigado" class="btn btn-outline-secondary btn-lg btn-full-width btn-obrigado">Não, obrigado!</button>
        </div>

    </form>
</div>
<?= $this->endSection() ?>
