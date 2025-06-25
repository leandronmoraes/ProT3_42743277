<div class="container mt-5">
    <div class="card shadow-lg rounded border-0">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0">
                <i class="bi bi-person-circle me-2"></i>Mi Perfil
            </h2>
        </div>
        <div class="card-body">
            <p class="text-muted text-center mb-4">
                Información básica y opciones para editar tus datos personales.
            </p>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <i class="bi bi-person-fill me-2 text-primary"></i>
                    <strong>Nombre:</strong> <?= esc(session('nombre')) ?>
                </li>
                <li class="list-group-item">
                    <i class="bi bi-person-lines-fill me-2 text-primary"></i>
                    <strong>Apellido:</strong> <?= esc(session('apellido')) ?>
                </li>
                <li class="list-group-item">
                    <i class="bi bi-envelope-fill me-2 text-primary"></i>
                    <strong>Email:</strong> <?= esc(session('email')) ?>
                </li>
                <li class="list-group-item">
                    <i class="bi bi-person-badge-fill me-2 text-prima
