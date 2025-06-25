<div class="container mt-5">
    <div class="card shadow-lg rounded">
        <div class="card-header <?= $modo == 'activos' ? 'bg-primary text-white' : 'bg-warning text-dark' ?>">
            <h2 class="mb-0"><?= $titulo ?></h2>
        </div>
        <div class="card-body">

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            <?php endif; ?>

            <?php if ($modo == 'activos'): ?>
                <a href="<?= base_url('usuarios/inactivos') ?>" class="btn btn-outline-secondary mb-3">
                    <i class="bi bi-eye-slash me-1"></i> Ver usuarios inactivos
                </a>
            <?php else: ?>
                <a href="<?= base_url('usuarios') ?>" class="btn btn-outline-primary mb-3">
                    <i class="bi bi-arrow-left me-1"></i> Ver usuarios activos
                </a>
            <?php endif; ?>

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
                                <td>
                                    <span class="badge <?= $u['baja'] == 'NO' ? 'bg-success' : 'bg-warning' ?>">
                                        <?= $u['baja'] == 'NO' ? 'Activo' : 'Inactivo' ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <?php if ($modo == 'activos'): ?>
                                        <a href="<?= base_url('usuarios/edit/' . $u['id_usuario']) ?>"
                                            class="btn btn-sm btn-warning me-1"
                                            onclick="return confirm('¿Querés editar este usuario?')">
                                            <i class="bi bi-pencil-square"></i> Editar
                                        </a>


                                        <a href="<?= base_url('usuarios/baja/' . $u['id_usuario']) ?>"
                                            class="btn btn-sm btn-danger me-1"
                                            onclick="return confirm('¿Estás seguro que querés dar de baja a este usuario?');">
                                            <i class="bi bi-person-dash-fill"></i> Dar de baja
                                        </a>
                                    <?php else: ?>
                                        <a href="<?= base_url('usuarios/alta/' . $u['id_usuario']) ?>"
                                            class="btn btn-sm btn-success me-1"
                                            onclick="return confirm('¿Estás seguro que querés reactivar este usuario?');">
                                            <i class="bi bi-person-check-fill"></i> Reactivar
                                        </a>

                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>