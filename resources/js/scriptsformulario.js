const formulario = document.getElementById('formulario');
const atrasBtn = document.getElementById('atras');
const siguienteBtn = document.getElementById('siguiente');

let currentStep = 0;
const steps = formulario.querySelectorAll('.step');

function showStep(step) {
  steps.forEach((step, index) => {
    if (index === currentStep) {
      step.classList.remove('hidden');
    } else {
      step.classList.add('hidden');
    }
  });
}

function goToNextStep() {
  if (currentStep < steps.length - 1) {
    currentStep++;
    showStep(currentStep);
  }
}

function goToPreviousStep() {
  if (currentStep > 0) {
    currentStep--;
    showStep(currentStep);
  }
}

atrasBtn.addEventListener('click', goToPreviousStep);
siguienteBtn.addEventListener('click', goToNextStep);

showStep(currentStep);