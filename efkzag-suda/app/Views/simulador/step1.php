<?= $this->extend('layouts/simulador') ?>



<?= $this->section('head') ?>
    <style>
        /**/
    </style>
<?= $this->endSection() ?>




<?= $this->section('scripts') ?>
    <script type="text/javascript">
        //
    </script>
<?= $this->endSection() ?>




<?= $this->section('content') ?>

<?php
    $session = session(); 
    $step1 = session()->get('step1Data');
?>
    
<div class="container text-center">

    <h1 class="mt-5 mb-5">Vamos começar?</h1>

    <div class="p-5 bg-light">

        <div class="row justify-content-center">

            <div class="col">
                <form action="<?= base_url('/simulador/save') ?>" method="post" class="align-self-center" id="stepForm">
                    

                    <input type="hidden" name="step" value="1">

                    
                    <div class="mb-3 row">
                        <label class="lead mb-3" for="">Como você se chama?</label>
                        <input type="text" class="form-control form-control-lg text-center" id="nome" name="nome" placeholder="Digite seu nome" value="<?= (isset($step1) && !empty($step1['nome']) ? @$step1['nome'] : '') ?>" required>
                    </div>


                    <div class="mt-5 row">
                        <div>
                          <input class="form-check-input" type="checkbox" name="confirma_1" id="confirma-1" checked required>
                          <label class="form-check-label" for="confirma-1">
                            Sim, concordo em enviar e receber informações.
                          </label>
                        </div>
                    </div>


                    <div class="row mt-5">
                        <button type="submit" id="btn-avancar" class="btn btn-primary btn-lg full-width">Começar agora</button>

                    </div>



                </form>


            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>




