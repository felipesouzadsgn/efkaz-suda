// Arquivo: public/js/progressBar.js

function updateProgressBar(currentStep) {
    const steps = document.querySelectorAll(".custom-progress-step");
    const lines = document.querySelectorAll(".custom-progress-line");

    steps.forEach((step, index) => {
        if (index < currentStep) {
            step.classList.add("custom-completed");
        } else {
            step.classList.remove("custom-completed");
        }
    });

    lines.forEach((line, index) => {
        if (index < currentStep - 1) {
            line.classList.add("custom-completed-line");
        } else {
            line.classList.remove("custom-completed-line");
        }
    });
}

// Exemplo de chamada ao carregar a página
document.addEventListener('DOMContentLoaded', () => {
    updateProgressBar(1); // Define o passo inicial (substitua com o passo real)
});
