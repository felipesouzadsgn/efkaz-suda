<?= $this->extend('layouts/simulador') ?>

<?= $this->section('head') ?>
<style>
    /**/
</style>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="text/javascript">
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
$session = session();
$step1 = session()->get('step1Data');
?>

<section class="section">

    <?= view('components/progress_bar', ['totalSteps' => 3, 'currentStep' => 1]) ?>

    <div class="section__content">
        <h2 class="section__title">Vamos começar?</h2>
        <form class="form" id="stepForm" action="<?= base_url('/simulador/save') ?>" method="post">
            <input type="hidden" name="step" value="1">

            <?= view('components/input_with_icon', [
                'type' => 'text',
                'name' => 'nome',
                'icon' => 'ph-user',
                'label' => 'Como podemos te chamar?',
                'placeholder' => 'Digite seu nome',
                'id' => 'username',
                'value' => (isset($step1) && !empty($step1['nome'])) ? $step1['nome'] : '',
                'required' => true
            ]) ?>

            <div class="my-3">
                <input class="form-check-input" type="checkbox" name="confirma_1" id="confirma-1" checked required>
                <label class="form-check-label" for="confirma-1">
                    Sim, concordo em enviar e receber informações.
                </label>
            </div>

            <div class="mt-4">
                <?= view('components/button_with_icon', [
                    'type' => 'submit',
                    'variant' => 'primary',
                    'icon' => null,
                    'text' => 'Começar agora',
                    'id' => 'btn-avancar'
                ]) ?>
            </div>
        </form>
    </div>
    <div class="section__footer">
        <h4 class="section__footer-title">A sua seguradora.</h4>
        <p class="section__footer-description">Confira nossos produtos no site.</p>
    </div>
</section>
<?= $this->endSection() ?>