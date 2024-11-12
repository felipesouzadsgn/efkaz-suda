<?php
$this->setVar('currentStep', 1); // Ajuste o valor conforme a etapa atual (1, 2, 3...)
?>

<?= $this->extend('layouts/cadastro') ?>

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
<style>
	.form__wrapper-custom {
		display: grid;
		width: 100%;
		gap: 1rem;
		grid-template-columns: 1fr 2fr;
	}
</style>

<section class="section">
	<div></div>

	<div class="section__content">
		<h2 class="section__title">Dados de endereço</h2>
		<form class="form" id="stepForm" action="" method="post">

			<input type="hidden" name="step" value="1">

			<?= view('components/input_with_icon', [
				'type' => 'text',
				'name' => 'nome',
				'icon' => null,
				'label' => 'CPF',
				'placeholder' => '000.000.000-00',
				'id' => 'username',
				'value' => '',
				'required' => true
			]) ?>

			<?= view('components/input_with_icon', [
				'type' => 'text',
				'name' => 'nome',
				'icon' => null,
				'label' => 'Endereço',
				'placeholder' => 'Digite seu endereço',
				'id' => 'username',
				'value' => '',
				'required' => true
			]) ?>

			<div class="form__wrapper-custom">
				<?= view('components/input_with_icon', [ // Dia
					'type' => 'text',
					'name' => 'dia',
					'icon' => null,
					'label' => 'Número',
					'placeholder' => '0000',
					'maxlength' => 4,
					'id' => 'input-dia',
					'required' => true
				]) ?>

				<?= view('components/input_with_icon', [ // Mês
					'type' => 'text',
					'name' => 'mes',
					'icon' => null,
					'label' => 'Complemento',
					'placeholder' => 'Referência',
					'maxlength' => '',
					'id' => 'input-mes',
					'required' => true
				]) ?>
			</div>

			<div class="mt-4">
				<?= view('components/button_with_icon', [
					'type' => 'submit',
					'variant' => 'primary',
					'icon' => null,
					'text' => 'Avançar',
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