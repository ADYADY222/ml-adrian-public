const inputField = document.querySelector('input[name="nombre_lugar"]');
const maxLength = parseInt(inputField.getAttribute('maxlength'), 10);
const errorMessage = document.getElementById('error-message');

inputField.addEventListener('input', function(event) {
  console.log('Verificare limita de caractere');
  const inputLength = event.target.value.length;

  if (inputLength > maxLength) {
    errorMessage.innerHTML = 'Limita de caractere a fost atinsa!';
  } else {
    errorMessage.innerHTML = '';
  }
});