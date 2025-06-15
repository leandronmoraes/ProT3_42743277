<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card shadow-lg rounded overflow-hidden" style="max-width: 800px; width: 100%;">
    <div class="row g-0">

      <!-- Columna de la imagen -->
      <div class="col-md-5 d-none d-md-block">
        <img src="<?= base_url('assets/img/logoprincipal.png') ?>" alt="Login CódigoRoto" class="img-fluid h-100" style="object-fit: cover;">
      </div>

      <!-- Columna del formulario -->
      <div class="col-md-7 p-4">
        <h3 class="text-center mb-3">Iniciar Sesión</h3>
        <p class="text-center text-muted">Bienvenido de nuevo a <span class="codigo">Código</span><span class="roto">Roto</span></p>

        <form action="<?= base_url('login/validar') ?>" method="post" class="needs-validation" novalidate>

          <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-envelope"></i></span>
              <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@correo.com" required>
              <div class="invalid-feedback">Por favor, ingresa un correo electrónico válido.</div>
            </div>
          </div>

          <!-- Contraseña -->
          <div class="mb-3 position-relative">
            <label for="password" class="form-label">Contraseña</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock"></i></span>
              <input type="password" class="form-control password-input" id="password" name="password" placeholder="********" required minlength="6">
              <button type="button" class="btn btn-outline-secondary toggle-password d-none" tabindex="-1">
                <i class="bi bi-eye"></i>
              </button>
              <div class="invalid-feedback">Por favor, ingresa una contraseña de al menos 6 caracteres.</div>
            </div>
          </div>

          <!-- Recordarme y enlace -->
          <div class="mb-3 d-flex justify-content-between align-items-center">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="recordar" name="recordar">
              <label class="form-check-label" for="recordar">Recordarme</label>
            </div>
            <a href="#" class="text-decoration-none small" id="forgot-password-link">¿Olvidaste tu contraseña?</a>
          </div>

          <!-- Botones -->
          <div class="d-grid mb-2">
            <button type="submit" class="btn btn-primary">Ingresar</button>
          </div>
          <div class="d-grid mb-3">
            <button type="reset" class="btn btn-secondary">Limpiar</button>
          </div>

          <!-- Enlace a registro -->
          <div class="text-center text-muted small">
            ¿No tenés cuenta? <a href="<?= base_url('registro') ?>">Registrate</a>
          </div>

          <!-- GitHub -->
          <div class="text-center mt-3">
            <button type="button" class="btn btn-outline-dark btn-sm" onclick="window.location.href='https://github.com/login'">
              <i class="bi bi-github me-1"></i> Iniciar sesión con GitHub
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- SCRIPTS -->
<script>
  (() => {
    'use strict';

    const form = document.querySelector('.needs-validation');
    const passwordInput = document.querySelector('#password');
    const toggleBtn = passwordInput.parentElement.querySelector('.toggle-password');

    // Mostrar/ocultar botón de ojo
    const toggleVisibility = () => {
      if (passwordInput.value.trim()) {
        toggleBtn.classList.remove('d-none');
      } else {
        toggleBtn.classList.add('d-none');
      }
    };

    passwordInput.addEventListener('input', toggleVisibility);
    passwordInput.addEventListener('focus', toggleVisibility);
    passwordInput.addEventListener('blur', toggleVisibility);

    // Alternar visibilidad contraseña
    toggleBtn.addEventListener('click', () => {
      const icon = toggleBtn.querySelector('i');
      const isPassword = passwordInput.type === 'password';
      passwordInput.type = isPassword ? 'text' : 'password';
      icon.classList.toggle('bi-eye', !isPassword);
      icon.classList.toggle('bi-eye-slash', isPassword);
    });

    // Validación y reinicio
    form.addEventListener('submit', (event) => {
      event.preventDefault();

      if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return;
      }

      // Si es válido:
      alert('Inicio de sesión correcto');

      // Limpiar y reiniciar
      form.reset();
      form.classList.remove('was-validated');

      // Forzar ocultar ícono y errores
      toggleBtn.classList.add('d-none');
      passwordInput.type = 'password';
      const icon = toggleBtn.querySelector('i');
      icon.classList.remove('bi-eye-slash');
      icon.classList.add('bi-eye');
    });

    // Botón reset manual
    form.addEventListener('reset', () => {
      form.classList.remove('was-validated');
      toggleBtn.classList.add('d-none');
      const icon = toggleBtn.querySelector('i');
      icon.classList.remove('bi-eye-slash');
      icon.classList.add('bi-eye');
    });
  })();
</script>
<script>
  document.querySelector('#forgot-password-link').addEventListener('click', function(e) {
    e.preventDefault();
    alert('Te enviamos un mensaje a tu correo para restablecer tu contraseña.');
  });
</script>