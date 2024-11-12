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


    echo $session->get('visitHash'); ?>

    
<div class="container container-sm p-5">
    <form action="<?= base_url('/simulador/save') ?>" method="post" class="align-self-center" id="stepForm">

        <input type="hidden" name="step" value="3">
        
        <h1 class="mb-5"><?= $step1Data['nome'] ?>, conte sobre você!</h1>
        
        <!-- <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> -->
        
        <div class="mb-5 row justify-content-center">
            <div class="col-2 text-center">
              <label for="input-dia" class="form-label">Dia</label>
              <input name="dia" type="text" class="form-control text-center form-select-lg" id="input-dia" placeholder="00" maxlength="2" required>
            </div>
            <div class="col-2 text-center">
              <label for="input-mes" class="form-label">Mês</label>
              <input name="mes" type="text" class="form-control text-center form-select-lg" id="input-mes" placeholder="00" maxlength="2" required>
            </div>
            <div class="col-3 text-center">
              <label for="input-ano" class="form-label">Ano</label>
              <input name="ano" type="text" class="form-control text-center form-select-lg" id="input-ano" placeholder="0000" maxlength="4" required>
            </div>
        </div>

        <!-- <input type="text" class="form-control text-center" id="nascimento" name="nascimento" placeholder="Sua data de nascimento" autocomplete="off" required> -->


        <div class="row">
          <button type="submit" class="btn btn-primary btn-lg btn-full-width mb-2">Continuar</button>
          <!-- <button type="button" class="btn btn-outline-secondary btn-lg btn-full-width" onclick="window.history.back()">Voltar</button> -->
        </div>

    </form>
</div>
<?= $this->endSection() ?>
