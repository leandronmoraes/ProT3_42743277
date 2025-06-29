<?php
    $msg = session()->getFlashdata('msg');
    $success = $msg === 'Mensaje enviado correctamente. Gracias por contactarnos.';
?>

<?php if ($msg): ?>
    <div class="alert alert-info mt-5">
        <?= $msg ?>
    </div>
<?php endif; ?>

<div class="container mt-5 formularioContacto">
  <h2>Contacto</h2>

  <form class="needs-validation" method="post" action="<?= base_url('contacto/enviar') ?>" novalidate>
    <div class="mb-3">
      <input
        type="text"
        class="form-control <?= session('errors.nombre') ? 'is-invalid' : '' ?>"
        id="nombre"
        name="nombre"
        placeholder="Tu nombre"
        required
        value="<?= $success ? '' : old('nombre') ?>"
      >
      <div class="invalid-feedback">
        <?= session('errors.nombre') ?? 'Por favor, ingresa tu nombre.' ?>
      </div>
    </div>

    <div class="mb-3">
      <input
        type="email"
        class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>"
        id="email"
        name="email"
        placeholder="Tu email"
        required
        value="<?= $success ? '' : old('email') ?>"
      >
      <div class="invalid-feedback">
        <?= session('errors.email') ?? 'Por favor, ingresa un email válido.' ?>
      </div>
    </div>

    <div class="mb-3">
      <textarea
        class="form-control <?= session('errors.mensaje') ? 'is-invalid' : '' ?>"
        id="mensaje"
        name="mensaje"
        rows="4"
        placeholder="Tu mensaje"
        required
      ><?= $success ? '' : old('mensaje') ?></textarea>
      <div class="invalid-feedback">
        <?= session('errors.mensaje') ?? 'Por favor, ingresa un mensaje.' ?>
      </div>
    </div>


    <div class="d-flex gap-2">
  <input type="submit" class="btn btn-primary" value="Enviar mensaje">
  <button type="reset" class="btn btn-secondary">Limpiar</button>
</div>
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
