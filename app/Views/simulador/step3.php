<?php

$session = session();

$step1Data = session()->get('step1Data');

?>

<?= $this->extend('layouts/simulador') ?>

<?= $this->section('head') ?>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script> -->
<script src="<?= base_url('/assets/maskedinput/maskedinput.min.js') ?>" type="text/javascript"></script>

<script type="text/javascript">
  // $("#nascimento").datepicker({ 
  //     changeYear: true,
  //     changeMonth: true,
  //     yearRange: "-80:+0", // this is the option you're looking for
  //     // showOn: "both", 
  //     // buttonImage: "templates/images/calendar.gif", 
  //     // buttonImageOnly: true 
  // });

  // $('#nascimento').mask('99/99/9999',{placeholder:"dd/mm/yyyy"});
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
// echo $session->get('visitHash'); 
?>


<section class="section">

  <?= view('components/progress_bar', ['totalSteps' => 4, 'currentStep' => 3]) ?>

  <div class="section__content">

    <h1 class="section__title">Agora nos conte um <br> pouco sobre você!</h1>

    <form action="<?= base_url('/simulador/save') ?>" method="post" class="form" id="stepForm">

      <input type="hidden" name="step" value="3">

      <h3 class="form__title">Qual sua data de nascimento?</h3>

      <div class="form__wrapper">
        <?= view('components/input_with_icon', [ // Dia
          'type' => 'text',
          'name' => 'dia',
          'icon' => null,
          'label' => 'Dia',
          'placeholder' => '00',
          'maxlength' => 2,
          'id' => 'input-dia',
          'required' => true
        ]) ?>

        <?= view('components/input_with_icon', [ // Mês
          'type' => 'text',
          'name' => 'mes',
          'icon' => null,
          'label' => 'Mês',
          'placeholder' => '00',
          'maxlength' => 2,
          'id' => 'input-mes',
          'required' => true
        ]) ?>

        <?= view('components/input_with_icon', [ // Ano
          'type' => 'text',
          'name' => 'ano',
          'icon' => null,
          'label' => 'Ano',
          'placeholder' => '0000',
          'maxlength' => 4,
          'id' => 'input-ano',
          'required' => true
        ]) ?>
      </div>

      <div class="form__btns">
        <?= view('components/button_with_icon', [ // Button
          'type' => 'submit',
          'variant' => 'primary',
          'icon' => null,
          'text' => 'Continuar',
          'id' => 'btn-avancar'
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