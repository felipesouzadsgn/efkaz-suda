<style>
    /* Container da barra de progresso */
    .custom-progress-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        width: 100%;
        padding: 0 1rem;
    }

    /* Wrapper de cada passo, incluindo a linha */
    .custom-progress-step-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    /* Estilo do passo */
    .custom-progress-step {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2rem;
        height: 2rem;
        border-radius: 0.5rem;
        background-color: #ccc;
        /* Cor de fundo dos passos futuros */
        color: #fff;
        font-weight: bold;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    /* Linha entre os passos */
    .custom-progress-line {
        width: 8rem;
        height: 0.25rem;
        background-color: #ddd;
        /* Cor da linha para passos futuros */
        transition: background-color 0.3s ease;
    }

    /* Estilo da linha de progresso para passos completos */
    .custom-progress-line.completed {
        background-color: #4caf50;
        /* Linha verde para passos completos */
    }

    /* Estilo para os passos completos */
    .custom-progress-step.custom-completed {
        background-color: #4caf50;
        /* Cor verde para passos completos */
    }

    /* Ícones */
    .custom-step-icon {
        font-size: 1.5rem;
    }
</style>

<div class="custom-progress-bar">
    <?php for ($i = 1; $i <= $totalSteps; $i++): ?>
        <div class="custom-progress-step-wrapper">
            <div class="custom-progress-step <?= $i <= $currentStep ? 'custom-completed' : '' ?>" data-step="<?= $i ?>">
                <span class="custom-step-icon">
                    <?php if ($i <= $currentStep): ?>
                        <i class="ph ph-check"></i>
                    <?php else: ?>
                        <i class="ph ph-circle"></i>
                    <?php endif; ?>
                </span>
            </div>
            <?php if ($i < $totalSteps): ?>
                <div class="custom-progress-line <?= $i < $currentStep ? 'completed' : '' ?>"></div>
            <?php endif; ?>
        </div>
    <?php endfor; ?>
</div>