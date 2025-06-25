<div class="container mt-5">
    <div class="card shadow-lg rounded">
        <div class="card-header bg-dark text-white text-center">
            <h2 class="mb-0">Panel de Usuario</h2>
        </div>
        <div class="card-body">
            <!-- Mensaje de bienvenida -->
            <?php if(session()->get('nombre')): ?>
                <div class="alert alert-info text-center">
                    ¡Bienvenido, <strong><?= esc(session()->get('nombre')) ?></strong>! Gracias por ser parte de <strong>CódigoRoto</strong>.
                </div>
            <?php endif; ?>

            <h5 class="card-title">Accesos rápidos</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <i class="bi bi-pencil-square me-2 text-info"></i>
                    <a href="<?= base_url('/mis-publicaciones') ?>" class="text-decoration-none">Mis publicaciones</a>
                </li>
                <li class="list-group-item">
                    <i class="bi bi-person-circle me-2 text-secondary"></i>
                    <a href="<?= base_url('/mi-perfil') ?>" class="text-decoration-none">Editar perfil</a>
                </li>
                <li class="list-group-item">
                    <i class="bi bi-life-preserver me-2 text-danger"></i>
                    <a href="<?= base_url('/soporte') ?>" class="text-decoration-none">Contactar soporte</a>
                </li>
            </ul>
        </div>
    </div>
</div>
