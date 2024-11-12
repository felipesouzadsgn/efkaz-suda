<?= $this->extend('layouts/cadastro') ?>

<?php 
    $this->setVar('currentStep', 3); // Ajuste o valor conforme a etapa atual (1, 2, 3...)
?>

<?= $this->section('head') ?>
<style>
	.payment-options-container {
		display: flex;
		justify-content: space-around;
		margin-bottom: 20px;
		border: 1px solid #ddd;
		border-radius: 8px;
		background-color: #f9f9f9;
		width: 100%;
	}

	.payment-option {
		padding: 10px 20px;
		cursor: pointer;
		border-radius: 5px;
		flex: 1;
		text-align: center;
		font-weight: bold;
		transition: background-color 0.3s, color 0.3s;
	}

	.payment-option.active {
		background-color: #007bff;
		color: white;
		box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
	}

	.payment-option.inactive {
		background-color: #f0f0f0;
		color: #888;
	}

	/* Formatação para o select de banco */
	.select-container {
		display: flex;
		flex-direction: column;
		gap: 1rem;
	}

	.select-container select {
		padding: 10px;
		border: 1px solid #ccc;
		border-radius: 5px;
		width: 100%;
	}

	.form__wrapper-custom {
		display: flex;
		gap: 1rem;
	}

	/* Botão de pagamento verde (fundo verde, texto branco) */
	.btn-custom--payment {
		background-color: #28a745;
		/* Verde */
		color: white;
		/* Texto branco */
	}

	.btn-custom--payment:hover {
		background-color: #218838;
		/* Verde mais escuro no hover */
	}

	.btn-custom--payment:focus {
		outline: 2px solid #80bfff;
		box-shadow: 0 0 0.3125rem rgba(0, 123, 255, 0.5);
	}

	/* Botão secundário cinza (fundo cinza, texto escuro) */
	.btn-custom--gray {
		background-color: #6c757d;
		/* Cinza */
		color: white;
		/* Texto branco */
		border: none;
	}

	.btn-custom--gray:hover {
		background-color: #5a6268;
		/* Cinza mais escuro no hover */
	}

	.btn-custom--gray:focus {
		outline: 2px solid #80bfff;
		box-shadow: 0 0 0.3125rem rgba(0, 123, 255, 0.5);
	}

</style>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function () {
		const debitCardForm = document.getElementById('debitCardForm');
		const creditCardForm = document.getElementById('creditCardForm');
		const debitOption = document.getElementById('debitOption');
		const creditOption = document.getElementById('creditOption');

		function toggleForm(selectedForm) {
			if (selectedForm === 'debit') {
				debitCardForm.style.display = 'block';
				creditCardForm.style.display = 'none';
				debitOption.classList.add('active');
				creditOption.classList.remove('active');
			} else {
				creditCardForm.style.display = 'block';
				debitCardForm.style.display = 'none';
				creditOption.classList.add('active');
				debitOption.classList.remove('active');
			}
		}

		debitOption.addEventListener('click', function () {
			toggleForm('debit');
		});
		creditOption.addEventListener('click', function () {
			toggleForm('credit');
		});

		toggleForm('credit');
	});
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
	<div></div>

	<div class="section__content">
		<h2 class="section__title">Escolha sua forma de pagamento</h2>

		<!-- Formulário de Pagamento -->
		<form class="form" id="stepForm" action="" method="post">
			<input type="hidden" name="step" value="3">

			<!-- Caixa de alternância entre Cartão de Crédito e Cartão de Débito -->
			<div class="payment-options-container">
				<span id="creditOption" class="payment-option active">Cartão de Crédito</span>
				<span id="debitOption" class="payment-option inactive">Cartão de Débito</span>
			</div>

			<!-- Formulário de Cartão de Crédito -->
			<div id="creditCardForm">
				<?= view('components/input_with_icon', [
					'type' => 'text',
					'name' => 'cardcredit',
					'icon' => null,
					'label' => 'Nome do titular como aparece no cartão',
					'placeholder' => 'Ex.: María Lópes',
					'id' => 'full-name',
					'value' => '',
					'required' => true
				]) ?>

				<?= view('components/input_with_icon', [
					'type' => 'text',
					'name' => 'cardnumber',
					'icon' => null,
					'label' => 'Número do cartão',
					'placeholder' => '0000 0000 0000 0000',
					'id' => 'input-card-number',
					'value' => '',
					'required' => true
				]) ?>

				<div class="form__wrapper-custom">
					<?= view('components/input_with_icon', [
						'type' => 'text',
						'name' => 'validade',
						'icon' => null,
						'label' => 'Válidade',
						'placeholder' => 'mm/aa',
						'maxlength' => 4,
						'id' => 'input-validade',
						'required' => true
					]) ?>

					<?= view('components/input_with_icon', [
						'type' => 'text',
						'name' => 'cvc',
						'icon' => null,
						'label' => 'Código de segurança',
						'placeholder' => '123',
						'maxlength' => 3,
						'id' => 'input-cvc',
						'required' => true
					]) ?>
				</div>
			</div>

			<!-- Formulário de Cartão de Débito -->
			<div id="debitCardForm" style="display: none;">
				<div class="select-container">
					<label for="bank">Selecione seu Banco:</label>
					<select name="bank" id="bank" required>
						<option value="">Escolha o banco</option>
						<option value="itau">Itaú</option>
						<option value="bradesco">Bradesco</option>
						<option value="caixa">Caixa Econômica</option>
						<option value="santander">Santander</option>
						<!-- Adicionar mais opções conforme necessário -->
					</select>

					<div>
						<?= view('components/input_with_icon', [
							'type' => 'text',
							'name' => 'agency',
							'icon' => null,
							'label' => 'Agência',
							'placeholder' => 'Ex.: 1234-5',
							'id' => 'agency',
							'value' => '',
							'required' => true
						]) ?>
					</div>

					<div>
						<?= view('components/input_with_icon', [
							'type' => 'text',
							'name' => 'account',
							'icon' => null,
							'label' => 'Número da conta:',
							'placeholder' => 'Ex.: 987654321',
							'id' => 'account',
							'value' => '',
							'required' => true
						]) ?>
					</div>
				</div>
			</div>

			<div class="mt-4">
				<?= view('components/button_with_icon', [
					'type' => 'submit',
					'variant' => 'payment',
					'icon' => null,
					'text' => 'Finalizar pagamento',
					'id' => 'btn-pagamento'
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