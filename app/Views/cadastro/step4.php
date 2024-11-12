<?= $this->extend('layouts/cadastro') ?>

<?= $this->section('head') ?>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
$this->setVar('currentStep', 3); // Ajuste o valor conforme a etapa atual (1, 2, 3...)
$this->setVar('showProgressBar', false); // Faz o progress bar ocultar.
$this->setVar('footerTitle', 'Obrigado'); // Faz o progress bar ocultar.
?>


<?php
$session = session();
$step1 = session()->get('step1Data');
?>

<style>
	.check-animation {
		width: 7rem;
	}
</style>

<section class="section">

	<h3>Pagamento Confirmado!</h3>
	<div class="section__content form">
		<div class="section__data">
			<img src="<?= base_url('img/check-animation.gif') ?>" alt="Logo Suda" class="check-animation">
			<h2 class="section__title">Obrigado por sua compra!</h2>
			<p class="section__description">Seu plano foi contratado com sucesso, <span
					class="section__description-emphasis">Dyego!</span></p>
			<hr>
			<div class="section__data-list">
				<div class="section__data-item">
					<span class="section__data-item-name">Seguro Sudaseg</span>
					<span class="section__data-item-result">R$ 1.000,00</span>
				</div>
				<div class="section__data-item">
					<span class="section__data-item-name">Nome</span>
					<span class="section__data-item-result">Dyego Severo</span>
				</div>
				<div class="section__data-item">
					<span class="section__data-item-name">Mensalidade</span>
					<span class="section__data-item-result">R$ 147,00/mês</span>
				</div>
			</div>
		</div>
	</div>
	<div class="section__footer">
		<h4 class="section__footer-title">A sua seguradora.</h4>
		<p class="section__footer-description">Confira nossos produtos no site.</p>
	</div>
</section>
<?= $this->endSection() ?>