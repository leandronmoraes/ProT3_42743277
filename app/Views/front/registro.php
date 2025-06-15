<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card shadow-lg rounded overflow-hidden" style="max-width: 800px; width: 100%;">
    <div class="row g-0">

      <!-- Columna de la imagen -->
      <div class="col-md-5 d-none d-md-block">
        <img src="<?= base_url('assets/img/banner1.jpg') ?>" alt="Registro" class="img-fluid h-100" style="object-fit: cover;">
      </div>

      <!-- Columna del formulario -->
      <div class="col-md-7 p-4">
        <h3 class="text-center mb-3">Crear cuenta</h3>
        <p class="text-center text-muted">Unite a <span class="codigo">Código</span><span class="roto">Roto</span> y comenzá a compartir tu pasión por la programación.</p>

        <form action="<?= base_url('registro/procesar') ?>" method="post" class="needs-validation" novalidate>
          <!-- Nombre -->
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Juan Pérez" required>
              <div class="invalid-feedback">Por favor, ingresa tu nombre completo.</div>
            </div>
          </div>

          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
              <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@correo.com" required>
              <div class="invalid-feedback">Por favor, ingresa un email válido.</div>
            </div>
          </div>

          <!-- Contraseña -->
          <div class="mb-3 position-relative">
            <label for="password" class="form-label">Contraseña</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
              <input type="password" class="form-control password-input" id="password" name="password" placeholder="********" required minlength="6">
              <button type="button" class="btn btn-outline-secondary toggle-password d-none" tabindex="-1">
                <i class="bi bi-eye"></i>
              </button>
              <div class="invalid-feedback">Por favor, ingresa una contraseña de al menos 6 caracteres.</div>
            </div>
          </div>

          <!-- Confirmar contraseña -->
          <div class="mb-3 position-relative">
            <label for="confirmar" class="form-label">Confirmar contraseña</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
              <input type="password" class="form-control password-input" id="confirmar" name="confirmar" placeholder="********" required minlength="6">
              <button type="button" class="btn btn-outline-secondary toggle-password d-none" tabindex="-1">
                <i class="bi bi-eye"></i>
              </button>
              <div class="invalid-feedback" id="confirmar-feedback">Por favor, confirma tu contraseña.</div>
            </div>
          </div>

          <!-- Botones -->
          <div class="d-grid mb-3">
            <button type="submit" class="btn btn-success">Registrarse</button>
          </div>
          <div class="d-grid mb-2">
            <button type="reset" class="btn btn-secondary">Limpiar</button>
          </div>

          <!-- Ya tenés cuenta -->
          <div class="text-center text-muted small">
            ¿Ya tenés cuenta? <a href="<?= base_url('login') ?>">Iniciar sesión</a>
          </div>

          <!-- GitHub -->
          <div class="text-center mt-3">
            <button type="button" class="btn btn-outline-dark btn-sm" onclick="window.location.href='https://github.com/login'">
              <i class="bi bi-github me-1"></i> Registrarse con GitHub
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  (() => {
    'use strict';
    const form = document.querySelector('.needs-validation');
    const password = form.querySelector('#password');
    const confirmar = form.querySelector('#confirmar');
    const confirmarFeedback = form.querySelector('#confirmar-feedback');

    // Mostrar/ocultar icono del ojo según foco o texto
    const inputs = form.querySelectorAll('.password-input');
    inputs.forEach(input => {
      const toggleBtn = input.parentElement.querySelector('.toggle-password');
      input.addEventListener('input', () => {
        toggleBtn.classList.toggle('d-none', !input.value);
      });
      input.addEventListener('focus', () => {
        if (input.value) toggleBtn.classList.remove('d-none');
      });
      input.addEventListener('blur', () => {
        if (!input.value) toggleBtn.classList.add('d-none');
      });
    });

    // Lógica del botón ojo
    const toggleButtons = document.querySelectorAll('.toggle-password');
    toggleButtons.forEach(button => {
      button.addEventListener('click', () => {
        const input = button.parentElement.querySelector('.password-input');
        const icon = button.querySelector('i');
        if (input.type === 'password') {
          input.type = 'text';
          icon.classList.remove('bi-eye');
          icon.classList.add('bi-eye-slash');
        } else {
          input.type = 'password';
          icon.classList.remove('bi-eye-slash');
          icon.classList.add('bi-eye');
        }
      });
    });

    // Validación al enviar el formulario
    form.addEventListener('submit', event => {
      event.preventDefault();

      if (password.value !== confirmar.value) {
        confirmar.setCustomValidity('Las contraseñas no coinciden');
        confirmarFeedback.textContent = 'Las contraseñas no coinciden.';
      } else {
        confirmar.setCustomValidity('');
        confirmarFeedback.textContent = 'Por favor, confirma tu contraseña.';
      }

      if (!form.checkValidity()) {
        event.stopPropagation();
        form.classList.add('was-validated');
      } else {
        alert('Registro exitoso');

        // Limpiar
        form.reset();
        form.classList.remove('was-validated');
        confirmar.setCustomValidity('');
        confirmarFeedback.textContent = 'Por favor, confirma tu contraseña.';

        // Ocultar iconos del ojo
        document.querySelectorAll('.toggle-password').forEach(icon => {
          icon.classList.add('d-none');
        });
      }
    });

    // Reset limpia validaciones y oculta ojos
    form.addEventListener('reset', () => {
      form.classList.remove('was-validated');
      confirmar.setCustomValidity('');
      confirmarFeedback.textContent = 'Por favor, confirma tu contraseña.';
      document.querySelectorAll('.toggle-password').forEach(icon => {
        icon.classList.add('d-none');
      });
    });
  })();
</script>