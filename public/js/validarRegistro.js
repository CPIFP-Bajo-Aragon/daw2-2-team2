function validarEmail(email) {
    var emailPatron = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPatron.test(email);
  }
  
  function validarNIF(nif) {
    var dniPatron = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i;
    return dniPatron.test(nif);
  }
  
  function validarInput(input, validarFunc) {
    var esValido = validarFunc(input.value.trim());
    
    if (!esValido) {
      alert('Error en la validación');
      input.classList.add('needs-validation');
    } else {
      alert('Validación exitosa');
      input.classList.remove('needs-validation');
    }
    
  }
  
  var emailInput = document.getElementById('email');
  var nifInput = document.getElementById('nif');
  
  emailInput.addEventListener('input', function () {
    validarInput(emailInput, validarEmail);
  });
  
  nifInput.addEventListener('input', function () {
    validarInput(nifInput, validarNIF);
  });
  