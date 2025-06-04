 const form = document.getElementById('registerForm');
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('confirm-password');
    const passMsg = document.getElementById('password-msg');

    function verificarContraseñas() {
      const pass = passwordInput.value;
      const confirm = confirmInput.value;

      if (pass && confirm && pass !== confirm) {
        passMsg.textContent = 'Las contraseñas no coinciden.';
        passMsg.style.display = 'block';
        return false;
      } else {
        passMsg.textContent = '';
        passMsg.style.display = 'none';
        return true;
      }
    }

    confirmInput.addEventListener('input', verificarContraseñas);
    passwordInput.addEventListener('input', verificarContraseñas);

    form.addEventListener('submit', function (event) {
      if (!verificarContraseñas()) {
        event.preventDefault();
      }
    });
    
     const emailInput = document.getElementById('email');
  const emailStatus = document.getElementById('email-status');
  let emailValid = false;

  emailInput.addEventListener('input', function() {
    const correo = emailInput.value.trim();

    if (correo.length === 0) {
      emailStatus.style.display = 'none';
      emailValid = false;
      return;
    }

    fetch('verificar_correo.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: `correo=${encodeURIComponent(correo)}`
    })
    .then(response => response.text())
    .then(data => {
      if (data === 'usado') {
        emailStatus.textContent = 'Este correo ya está registrado.';
        emailStatus.style.color = 'red';
        emailStatus.style.display = 'block';
        emailValid = false;
      } else {
        emailStatus.textContent = 'Correo disponible.';
        emailStatus.style.color = 'green';
        emailStatus.style.display = 'block';
        emailStatus.style.marginTop = '20px';
        emailValid = true;
      }
    });
  });

  form.addEventListener('submit', function(event) {
    if (!emailValid) {
      event.preventDefault();
      alert('Por favor usa un correo electrónico disponible.');
      emailInput.focus();
    }
  });