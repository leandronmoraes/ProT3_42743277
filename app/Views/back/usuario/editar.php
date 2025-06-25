<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0"><?= esc($titulo) ?></h2>
        </div>
        <div class="card-body">

            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('usuarios/update/' . $usuario['id_usuario']) ?>" method="post">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="<?= esc($usuario['nombre']) ?>" required>
                    <?= validation_show_error('nombre') ?>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" value="<?= esc($usuario['apellido']) ?>" required>
                    <?= validation_show_error('apellido') ?>
                </div>

                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" value="<?= esc($usuario['usuario']) ?>" required>
                    <?= validation_show_error('usuario') ?>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?= esc($usuario['email']) ?>" required>
                    <?= validation_show_error('email') ?>
                </div>

                <div class="mb-3">
                    <label for="perfil_id" class="form-label">Perfil</label>
                    <select id="perfil_id" name="perfil_id" class="form-select">
                        <option value="1" <?= $usuario['perfil_id'] == 1 ? 'selected' : '' ?>>Administrador</option>
                        <option value="2" <?= $usuario['perfil_id'] == 2 ? 'selected' : '' ?>>Usuario</option>
                    </select>
                    <?= validation_show_error('perfil_id') ?>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="<?= base_url('usuarios') ?>" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-success"
        onclick="return confirm('¿Estás seguro que querés guardar los cambios?');">
    <i class="bi bi-save"></i> Guardar cambios
</button>
                </div>
            </form>
        </div>
    </div>
</div>
