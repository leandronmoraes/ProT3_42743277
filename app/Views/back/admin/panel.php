<div class="container mt-5">
    <div class="card shadow-lg rounded">
        <div class="card-header bg-dark text-white text-center">
            <h2 class="mb-0">Panel de Administración</h2>
        </div>
        <div class="card-body">
            <!-- Mensaje de bienvenida -->
            <?php if(session()->get('nombre')): ?>
                <div class="alert alert-info text-center">
                    ¡Bienvenido, <strong><?= esc(session()->get('nombre')) ?></strong>! Aquí podés administrar el sistema.
                </div>
            <?php endif; ?>

            <h5 class="card-title">Accesos rápidos</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <i class="bi bi-people-fill me-2 text-primary"></i>
                    <a href="<?= base_url('/usuarios') ?>" class="text-decoration-none">Gestión de usuarios</a>
                </li>
                <li class="list-group-item">
                    <i class="bi bi-bar-chart-fill me-2 text-success"></i>
                    <a href="<?= base_url('/reportes') ?>" class="text-decoration-none">Ver reportes</a>
                </li>
                <li class="list-group-item">
                    <i class="bi bi-gear-fill me-2 text-warning"></i>
                    <a href="<?= base_url('/configuracion') ?>" class="text-decoration-none">Configuración del sistema</a>
                </li>
            </ul>
        </div>
    </div>
</div>
