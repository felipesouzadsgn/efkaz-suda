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
                96, 97, 98, 99];

            if (codigosDDD.indexOf(parseInt(telefone.substring(0, 2))) == -1) return false;
            // if (new Date().getFullYear() < 2017) return true;
            if (telefone.length == 10 && [2, 3, 4, 5, 7].indexOf(parseInt(telefone.substring(2, 3))) == -1) return true;

            return true;
        }

        $('#whatsapp').mask('(99) 9 9999-9999');

        $('#whatsapp').on('blur', function(){
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

    echo $session->get('visitHash'); ?>

    
<div class="container container-sm p-5">
    <form action="<?= base_url('/simulador/save') ?>" method="post" class="align-self-center" id="stepForm">

        <input type="hidden" name="step" value="2">

        <h1 class="mb-5">Olá <?= @$step1Data['nome'] ?>, como prefere falar?</h1>
        
        <!-- <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> -->
        
        <div class="mb-3 row">
            <input type="text" class="form-control form-control-lg text-center" id="email" name="email" placeholder="Seu melhor email" value="dyego@efkz.com.br" required>
        </div>

        <div class="mb-3 row">
            <input type="text" class="form-control form-control-lg text-center" id="telefone" name="telefone" placeholder="Seu número de WhatsApp" value="41999527868" required>
        </div>

        <div class="mb-5 row">
            <div class="">
              <input class="form-check-input" type="checkbox" id="confirma-2" name="confirma_2" required>
              <label class="form-check-label" for="confirma-2">
                Sim, concordo em enviar e receber informações.
              </label>
            </div>
        </div>

        <div class="row">
          <button type="submit" class="btn btn-primary btn-lg btn-full-width mb-2">Continuar</button>
          <button type="button" id="btn-voltar" class="btn btn-outline-secondary btn-lg full-width mt-1"> Voltar</button>
        </div>

    </form>
</div>
<?= $this->endSection() ?>

