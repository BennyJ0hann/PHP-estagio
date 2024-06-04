const checkbox = document.getElementById('checkbox');
const botao = document.getElementById('botao');

// Adiciona um ouvinte de eventos ao checkbox
checkbox.addEventListener('change', function() {
  // Se o checkbox estiver marcado, habilita o botão, caso contrário, desabilita
  if (this.checked) {
    botao.removeAttribute('disabled');
  } else {
    botao.setAttribute('disabled', true);
  }
});