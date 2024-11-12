<?php
$step1Data = session()->get('step1Data');
$visitHash = session()->get('visitHash');
if (!isset($visitHash) || !is_array($step1Data)) {
    return redirect()->to('/simulador/1');
}
?>

<?= $this->extend('layouts/simulador') ?>

<?= $this->section('head') ?>
<style>
    /**/
</style>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('/assets/maskedinput/maskedinput.min.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    function validarTelefone(telefone) {
        telefone = telefone.replace(/\D/g, '');

        if (!(telefone.length >= 10 && telefone.length <= 11)) return false;

        if (telefone.length == 11 && parseInt(telefone.substring(2, 3)) != 9) return false;

        for (var n = 0; n < 10; n++) {
            if (telefone == new Array(11).join(n) || telefone == new Array(12).join(n)) return false;
        }

        var codigosDDD = [11, 12, 13, 14, 15, 16, 17, 18, 19,
            21, 22, 24, 27, 28, 31, 32, 33, 34,
            35, 37, 38, 41, 42, 43, 44, 45, 46,
            47, 48, 49, 51, 53, 54, 55, 61, 62,
            64, 63, 65, 66, 67, 68, 69, 71, 73,
            74, 75, 77, 79, 81, 82, 83, 84, 85,
            86, 87, 88, 89, 91, 92, 93, 94, 95,
            96, 97, 98, 99
        ];

        if (codigosDDD.indexOf(parseInt(telefone.substring(0, 2))) == -1) return false;
        // if (new Date().getFullYear() < 2017) return true;
        if (telefone.length == 10 && [2, 3, 4, 5, 7].indexOf(parseInt(telefone.substring(2, 3))) == -1) return true;

        return true;
    }

    $('#whatsapp').mask('(99) 9 9999-9999');

    $('#whatsapp').on('blur', function () {
        const numero = $(this).val();
        const ddd = numero.substring(1, 3);
        if (!validarTelefone(ddd)) {
            console.log('Problema');
        } else {
            console.log('Número de telefone válido!');
        }
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php

$session = session();

// echo $session->get('visitHash'); 
?>

<section class="section">

    <?= view('components/progress_bar', ['totalSteps' => 3, 'currentStep' => 2]) ?>

    <div class="section__content">

        <h1 class="section__title">Olá <?= @$step1Data['nome'] ?>, <br> como prefere falar?</h1>

        <form action="<?= base_url('/simulador/save') ?>" method="post" class="form" id="stepForm">

            <input type="hidden" name="step" value="2">

            <div class="mb-3 row">
                <?= view('components/input_with_icon', [
                    'type' => 'text',
                    'name' => 'email',
                    'icon' => 'ph-envelope-simple',
                    'label' => 'Qual seu e-mail?',
                    'placeholder' => 'Digite seu melhor e-mail',
                    'id' => 'email',
                    'value' => 'dyego@efkz.com.br',
                    'required' => true
                ]) ?>
            </div>

            <div class="mb-3 row">
                <?= view('components/input_with_icon', [
                    'type' => 'tel',
                    'name' => 'telefone',
                    'icon' => 'ph-phone',
                    'label' => 'Qual seu WhatsApp?',
                    'placeholder' => '(00) 0 0000-0000',
                    'id' => 'telefone',
                    'value' => '13996432357',
                    'required' => true
                ]) ?>
            </div>

            <div class="mb-4 row">
                <div class="">
                    <input class="form-check-input" type="checkbox" id="confirma-2" name="confirma_2" required>
                    <label class="form-check-label" for="confirma-2">
                        Sim, concordo em enviar e receber informações.
                    </label>
                </div>
            </div>

            <div class="">
                <?= view('components/button_with_icon', [
                    'type' => 'submit',
                    'variant' => 'primary',
                    'icon' => null,
                    'text' => 'Continuar',
                    'id' => 'btn-avancar'
                ]) ?>
            </div>
            <div class="mt-2">
                <?= view('components/button_with_icon', [
                    'type' => 'button',
                    'variant' => 'secondary',
                    'icon' => null,
                    'text' => 'Voltar',
                    'id' => 'btn-voltar'
                ]) ?>
            </div>
        </form>
    </div>

    <div class="section__footer">
        <h4 class="section__footer-title">A sua seguradora.</h4>
        <p class="section__footer-description">Confira nossos produtos no site.</p>
    </div>
    <section />
    <?= $this->endSection() ?>