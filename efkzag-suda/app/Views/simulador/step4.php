<?= $this->extend('layouts/simulador') ?>

<?= $this->section('head') ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.css" rel="stylesheet">
<style>
    .valor { 
        font-size: 48px;
        font-weight: 900;
    }
    .range {
        width: 100%;
        margin: 20px 0;
    }
    .slider-labels {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        font-size: 0.8em;
        align-items: baseline;
    }
    .slider-labels .slider-value {
        font-size: 2.2em;
        width: 150px !important;
        display: inline-block;
    }
    .main-content {
        max-width: 980px;
    }
</style>
<?= $this->endSection() ?>


<?= $this->section('scripts') ?>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js"></script>

<script type="text/javascript">



    // Função para coletar dados das ofertas ativas
    function coletarDadosOfertasAtivas() {
        
        let ofertasAtivas = [];

        // Adiciona oferta fixa
        ofertasAtivas.push({
            id: 0,
            valor: $('#input-oferta-0-valor').val(),
            preco: $('#input-oferta-0-preco').val()
        });

        // Percorre todas as ofertas
        $('.oferta-card').each(function () {
            var ofertaId = $(this).data('oferta-id');
            var switchOferta = $(this).find('.form-check-input.oferta-switch');

            // Verifica se o switch está ativado
            if (switchOferta.is(':checked')) {
                // Coleta os dados cruciais da oferta ativa
                let dadosOferta = {
                    id: ofertaId,
                    valor: $(this).find(`#input-oferta-${ofertaId}-valor`).val(),
                    preco: $(this).find(`#input-oferta-${ofertaId}-preco`).val()
                };

                // Adiciona ao array de ofertas ativas
                ofertasAtivas.push(dadosOferta);

            }
        });
        
        ofertasAtivasJSON = JSON.stringify(ofertasAtivas);
        $('#produtos').val(ofertasAtivasJSON);
    }

    // calcular custo
    function calcularCusto(valorCapital, taxaPercentual) {
        // Remove o prefixo 'R$' e pontos do valor, e converte para número
        var valorNumerico = parseFloat(valorCapital.replace('R$', '').replace(/\./g, ''));

        // Calcula a mensalidade fictícia: 0,13% do valor do capital
        var mensalidade = valorNumerico * taxaPercentual;

        // Formata o valor para o padrão 'R$XX,XX'
        return wNumb({
            decimals: 2,
            thousand: '.',
            prefix: 'R$'
        }).to(mensalidade);
    }

    // Função para atualizar o valor da mensalidade total com base nas ofertas ativas
    function atualizarMensalidadeTotal() {
        let mensalidadeTotal = 0;

        // Percorrer todas as ofertas
        $('.oferta-card').each(function () {
            var ofertaId = $(this).data('oferta-id');
            var checkbox = $(this).find('.form-check-input');

            // Verifica se a oferta está ativa
            if (checkbox.is(':checked')) {

                // Obtém o valor da mensalidade da oferta ativa
                var preco = parseFloat($(`#input-oferta-${ofertaId}-preco`).val().replace(/[^\d.-]/g, ''));
            
                // Adiciona à mensalidade total
                mensalidadeTotal += preco;
            }
        });

        // alert(mensalidadeTotal);

        if (mensalidadeTotal > 0) {
            $('#mensalidade').val(mensalidadeTotal);
            // Atualiza o valor total na interface
            $('#mensalidade-total').text(wNumb({
                decimals: 2,
                thousand: '.',
                prefix: 'R$'
            }).to(mensalidadeTotal));
        }

    }
    
    // Função para adicionar cards de ofertas
    function criarSlider(id, start, step, min, max, tax) {

        // encontra os elementos
        var slider = document.getElementById('slider-'+id);
        var sliderValue = document.getElementById('slider-'+id+'-value');
        var sliderPrice = document.getElementById('oferta-'+id+'-preco');



        // if (slider.length > 0 && sliderValue.length > 0) {

            // construir o slider
            noUiSlider.create(slider, {
                start: [start],
                step: step,
                // connect: [true, false],
                range: {
                    'min': min,
                    'max': max
                },
                format: wNumb({
                    decimals: 0,
                    thousand: '.',
                    prefix: 'R$'
                })
            });

            // função de formatação
            moenyFormat =  wNumb({
                decimals: 0,
                thousand: '.',
                prefix: 'R$'
            });

            // atualizar valor


            slider.noUiSlider.on('update', function (values, handle) {

                sliderValue.innerHTML = values[handle];
                sliderPrice.innerHTML = calcularCusto(values[handle], tax);
                $(`#input-oferta-${id}-valor`).val(values[handle]);
                $(`#input-oferta-${id}-preco`).val(calcularCusto(values[handle], tax));

                atualizarMensalidadeTotal();
                coletarDadosOfertasAtivas();

            });

            // valores iniciais
            $('#slider-'+id+'-min').html(moenyFormat.to(min));
            $('#slider-'+id+'-value').html(moenyFormat.to(start));
            $('#slider-'+id+'-max').html(moenyFormat.to(max));
        // }

    }


    // dados da primeira oferta
    criarSlider(0, 50000, 1000, 2000, 180000, 0.0013);

    // dados da segunda oferta
    criarSlider(1, 5000, 100, 3000, 5000, 0.003);

    // dados da segunda oferta
    criarSlider(2, 5000, 100, 3000, 5000, 0.003);

    // ativa/desativa oferta
    $('.oferta-switch').on('change', function() {

        var parentId = $(this).data('oferta-id');

        if ($(this).is(':checked')) {
            $('#oferta-'+parentId + ' .to-hide').removeClass('d-none');
        } else {
            $('#oferta-'+parentId + ' .to-hide').addClass('d-none');
        }

        atualizarMensalidadeTotal();
        coletarDadosOfertasAtivas();

    });
    
</script>
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<?php

    $session = session(); 

    // echo $session->get('visitHash');

?>

<div class="container p-5">
    <form action="<?= base_url('/simulador/save') ?>" method="post" class="align-self-center" id="stepForm">
        
        <input type="hidden" name="step" value="4">
        
        <input type="hidden" name="idade" id="idade" value="<?= @$idade ?>">
        <input type="hidden" name="produtos" id="produtos" value="" class="form-control">
        <input type="hidden" name="mensalidade" id="mensalidade" value="" class="form-control">

        <h1 class="mb-5">Escolha a melhor opção</h1>

        <!--  oferta 0 -->
        <div class="row bg-light pt-5 px-3 mb-3 oferta-card" data-oferta-id="0" id="oferta-0">
            
            <input type="hidden" name="oferta_0_valor" id="input-oferta-0-valor" value="50.000,00">
            <input type="hidden" name="oferta_0_preco" id="input-oferta-0-preco" value="65,00">

            <div class="row mb-3">
                
                <div class="col-6 text-start">
                    <h2>Seguro de Vida</h2>
                    <span class="text-body-tertiary">Seguro de vida individual SUSEP-128401</span>
                </div>
                <div class="col-6 text-end">
                    <div class="form-check form-switch d-inline-block">
                        <input class="form-check-input" type="checkbox" role="switch" id="oferta-0-switch" name="oferta_0_switch" checked disabled>
                        <label class="form-check-label" for="switch-0">
                        <span id="oferta-0-preco">R$65,00</span>/mês</label>
                    </div>
                </div>

            </div>


            <div class="row mb-3 p-4">
                <div class="slider-labels">
                    <span id="slider-0-min"></span>
                    <span id="slider-0-value" class="slider-value"></span>
                    <span id="slider-0-max"></span>
                </div>
                <div class="range" id="slider-0"></div>
            </div>

        </div>
        <!-- oferta 0 -->




        <!------------------ início dos módulos dinâmicos ------------------>


        <!-- início oferta 1 -->
        <div class="row bg-light px-3 mb-3 oferta-card" data-oferta-id="1" id="oferta-1">


            <input type="hidden" name="oferta_1_valor" id="input-oferta-1-valor" value="5.000,00">
            <input type="hidden" name="oferta_1_preco" id="input-oferta-1-preco" value="15,00">

            <div class="row">
                
                <div class="col-6 text-start">
                    <h2 class="fs-4 pt-3">Auxílio 1</h2>
                    <span class="text-body-tertiary to-hide">Valor para auxiliar mais</span>
                </div>
                <div class="col-6 text-end p-3 align-itens-center">
                    <div class="form-check form-switch d-inline-block">
                        <input class="form-check-input oferta-switch" data-oferta-id="1" type="checkbox" role="switch" name="oferta_1_switch" id="oferta-1-switch" checked>
                        <label class="form-check-label" for="oferta-1-switch">
                        <span id="oferta-1-preco">R$15,00</span>/mês</label>
                    </div>
                </div>

            </div>


            <div class="row p-4 to-hide">
                <div class="slider-labels">
                    <span id="slider-1-min"></span>
                    <span id="slider-1-value" class="slider-value"></span>
                    <span id="slider-1-max"></span>
                </div>
                <div class="range" id="slider-1" disabled> </div>
            </div>

        </div>
        <!-- fim oferta 1 -->


        <!-- início oferta 2 -->
        <div class="row bg-light px-3 mb-3 oferta-card" data-oferta-id="2" id="oferta-2">

            <input type="hidden" name="oferta_2_valor" id="input-oferta-2-valor" value="3.000,00">
            <input type="hidden" name="oferta_2_preco" id="input-oferta-2-preco" value="15,00">

            <div class="row">
                
                <div class="col-6 text-start">
                    <h2 class="fs-4 pt-3">Auxílio 2</h2>
                    <span class="text-body-tertiary to-hide d-none">Valor para auxiliar mais</span>
                </div>
                <div class="col-6 text-end p-3 align-itens-center">
                    <div class="form-check form-switch d-inline-block">
                        <input class="form-check-input oferta-switch" data-oferta-id="2" type="checkbox" role="switch" name="oferta_2_switch" id="oferta-2-switch">
                        <label class="form-check-label" for="oferta-2-switch">
                        <span id="oferta-2-preco">R$15,00</span>/mês</label>
                    </div>
                </div>

            </div>


            <div class="row p-4 to-hide d-none">
                <div class="slider-labels">
                    <span id="slider-2-min"></span>
                    <span id="slider-2-value" class="slider-value"></span>
                    <span id="slider-2-max"></span>
                </div>
                <div class="range" id="slider-2"> </div>
            </div>

        </div>
        <!-- fim oferta 2 -->


        <!------------------ fim dos módulos dinâmicos ------------------>




        <div class="row mt-5">
            <!-- valor inicial da mensalidade PHP -->
            <!-- <input type="text" name="mensalidade" id="input-mensalidade" value="65,00"> -->

            <div class="text-center fs-5">Mensalidade</div>
            <div class="text-center fs-3"><span id="mensalidade-total" class="fs-1">R$65,00</span>/mês</div>
        </div>


        <div class="row mt-5">
          <button type="submit" class="btn btn-primary btn-lg btn-full-width mb-2">Continuar</button>
          <!-- <button type="button" class="btn btn-light btn-lg btn-full-width" onclick="window.history.back()">Voltar</button> -->
        </div>


    </form>
</div>

<?= $this->endSection() ?>