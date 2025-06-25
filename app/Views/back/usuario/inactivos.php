<div class="container mt-5">
    <div class="card shadow-lg rounded">
        <div class="card-header bg-warning text-dark">
            <h2 class="mb-0"><?= $titulo ?></h2>
        </div>
        <div class="card-body">

            <a href="<?= base_url('usuarios') ?>" class="btn btn-outline-primary mb-3">
                <i class="bi bi-arrow-left me-1"></i> Ver usuarios activos
            </a>


            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Usuario</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $u): ?>
                            <tr>
                                <td><?= esc($u['nombre']) ?> <?= esc($u['apellido']) ?></td>
                                <td><?= esc($u['email']) ?></td>
                                <td><?= esc($u['usuario']) ?></td>
                                <td>
                                    <span class="badge <?= $u['perfil_id'] == 1 ? 'bg-danger' : 'bg-secondary' ?>">
                                        <?= $u['perfil_id'] == 1 ? 'Admin' : 'Usuario' ?>
                                    </span>
                                </td>
                                <td><span class="badge bg-warning">Inactivo</span></td>
                                <td class="text-center">
                                    <a href="/usuarios/alta/<?= $u['id_usuario'] ?>" class="btn btn-sm btn-success me-1">
                                        <i class="bi bi-person-check-fill"></i> Reactivar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>