<?= $this->extend('layouts/cadastro') ?>

<?= $this->section('head') ?>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<?php
$this->setVar('currentStep', 2); // Ajuste o valor conforme a etapa atual (1, 2, 3...)
?>

<style>
	.section {
		width: 100%;
		height: 100%;
		min-height: 100vh;
		max-width: 396px;
		display: flex;
		justify-content: space-between;
		align-items: center;
		flex-direction: column;
		padding: 2rem 0;
	}
</style>
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function () {
		const addButton = document.getElementById('btn-add-beneficiario');
		const beneficiariesContainer = document.getElementById('beneficiaries-container');

		addButton.addEventListener('click', function (event) {
			event.preventDefault();
			// Clona o conjunto de campos e altera IDs e valores
			const beneficiaryFields = document.querySelector('.beneficiary-group').cloneNode(true);
			// Limpa os valores dos campos clonados
			beneficiaryFields.querySelectorAll('input').forEach(input => {
				input.value = '';
			});
			// Adiciona o conjunto de campos ao container
			beneficiariesContainer.appendChild(beneficiaryFields);
		});
	});
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php $session = session(); ?>

<section class="section">
	<div></div>

	<div class="section__content">
		<h1 class="section__title">Beneficiários</h1>

		<form action="" method="post" class="form" id="stepForm">
			<input type="hidden" name="step" value="2">

			<!-- Container para armazenar os grupos de beneficiários -->
			<div id="beneficiaries-container">
				<div class="mb-3 row beneficiary-group">
					<?= view('components/input_with_icon', [
						'type' => 'text',
						'name' => 'beneficiario[]',
						'icon' => 'ph-user',
						'label' => 'Beneficiário',
						'placeholder' => 'Adicionar beneficiário',
						'id' => 'beneficiario',
						'value' => '',
						'required' => true
					]) ?>

					<?= view('components/input_with_icon', [
						'type' => 'date',
						'name' => 'data_nasc',
						'icon' => 'ph-calendar',
						'label' => 'Data de Nascimento',
						'placeholder' => '00/00/00',
						'id' => 'data',
						'value' => '',
						'required' => true
					]) ?>
				</div>
			</div>
			<!-- Botão para adicionar novos beneficiários -->
			<div class="mt-2">
				<?= view('components/button_with_icon', [
					'type' => 'button',
					'variant' => 'secondary',
					'icon' => 'ph-plus',
					'text' => 'Adicionar beneficiário',
					'id' => 'btn-add-beneficiario'
				]) ?>
			</div>

			<!-- Botões de navegação -->
			<div class="form__btns mt-4">
				<div>
					<?= view('components/button_with_icon', [
						'type' => 'submit',
						'variant' => 'primary',
						'icon' => null,
						'text' => 'Avançar',
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
			</div>
		</form>
	</div>

	<div class="section__footer">
		<h4 class="section__footer-title">A sua seguradora.</h4>
		<p class="section__footer-description">Confira nossos produtos no site.</p>
	</div>
</section>
<?= $this->endSection() ?>