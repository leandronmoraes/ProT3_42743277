<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card shadow-lg rounded overflow-hidden" style="max-width: 800px; width: 100%;">

    <!-- Mensajes flash -->
    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-msg">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('msg')): ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert" id="warning-msg">
        <?= session()->getFlashdata('msg') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
      </div>
    <?php endif; ?>

    <div class="row g-0">

      <!-- Columna de la imagen -->
      <div class="col-md-5 d-none d-md-block">
        <img src="<?= base_url('assets/img/logoprincipal.png') ?>" alt="Login CódigoRoto" class="img-fluid h-100" style="object-fit: cover;">
      </div>

      <!-- Columna del formulario -->
      <div class="col-md-7 p-4">
        <h3 class="text-center mb-3">Iniciar Sesión</h3>
        <p class="text-center text-muted">Bienvenido de nuevo a <span class="codigo">Código</span><span class="roto">Roto</span></p>

        <form method="post" action="<?= base_url('/enviarlogin') ?>" class="needs-validation" novalidate>

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
              <input type="password" class="form-control password-input" id="pass" name="pass" placeholder="********" required minlength="6">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  (() => {
    'use strict';

    const form = document.querySelector('.needs-validation');
    const passwordInput = document.querySelector('#pass'); // campo "pass"
    const toggleBtns = document.querySelectorAll('.toggle-password');

    // Mostrar/ocultar icono del ojo en base al contenido
    const toggleVisibility = (input, toggleBtn) => {
      toggleBtn.classList.toggle('d-none', !input.value.trim());
    };

    // Inicializar cada campo de contraseña con botón de ojo
    document.querySelectorAll('.password-input').forEach(input => {
      const toggleBtn = input.parentElement.querySelector('.toggle-password');
      input.addEventListener('input', () => toggleVisibility(input, toggleBtn));
      input.addEventListener('focus', () => toggleVisibility(input, toggleBtn));
      input.addEventListener('blur', () => toggleVisibility(input, toggleBtn));
    });

    // Alternar visibilidad de contraseñas
    toggleBtns.forEach(toggleBtn => {
      toggleBtn.addEventListener('click', () => {
        const input = toggleBtn.parentElement.querySelector('.password-input');
        const icon = toggleBtn.querySelector('i');
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

    // Validación y envío real
    form.addEventListener('submit', (event) => {
      // Validación de HTML5 nativa funciona automáticamente
      if (!form.checkValidity()) {
        event.preventDefault();
        form.classList.add('was-validated');
      }
    });

    // Resetear el formulario
    form.addEventListener('reset', () => {
      form.classList.remove('was-validated');
      toggleBtns.forEach(btn => btn.classList.add('d-none'));
    });

    // Ocultar mensajes flash automáticamente después de 5 segundos
    setTimeout(() => {
      const successMsg = document.getElementById('success-msg');
      const warningMsg = document.getElementById('warning-msg');

      if (successMsg) {
        bootstrap.Alert.getOrCreateInstance(successMsg).close();
      }
      if (warningMsg) {
        bootstrap.Alert.getOrCreateInstance(warningMsg).close();
      }
    }, 5000);

  })();
</script>
