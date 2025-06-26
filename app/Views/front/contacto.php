<div class="container mt-5 formularioContacto">
  <h2>Contacto</h2>

  <?php if (session()->getFlashdata('msg')): ?>
    <div class="alert alert-info">
      <?= session()->getFlashdata('msg') ?>
    </div>
  <?php endif; ?>


  <form class="needs-validation" method="post" action="<?= base_url('contacto/enviar') ?>" novalidate>
    <div class="mb-3">
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required>
      <div class="invalid-feedback">
        Por favor, ingresa tu nombre.
      </div>
    </div>
    <div class="mb-3">
      <input type="email" class="form-control" id="email" name="email" placeholder="Tu email" required>
      <div class="invalid-feedback">
        Por favor, ingresa un email válido.
      </div>
    </div>
    <div class="mb-3">
      <textarea class="form-control" id="mensaje" name="mensaje" rows="4" placeholder="Tu mensaje" required></textarea>
      <div class="invalid-feedback">
        Por favor, ingresa un mensaje.
      </div>
    </div>

    <input type="submit" class="boton btn-primary" value="Enviar mensaje">
    <button type="reset" class="btn btn-secondary">Limpiar</button>
  </form>
</div>

<script>
  (() => {
    'use strict'
    const form = document.querySelector('.needs-validation')

    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
        form.classList.add('was-validated')
      }

    })

    form.addEventListener('reset', () => {
      form.classList.remove('was-validated')
    })
  })()
</script>