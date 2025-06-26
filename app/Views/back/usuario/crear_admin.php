<div class="container mt-5">
    <div class="card shadow rounded">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Crear nuevo usuario</h4>
        </div>
        <div class="card-body">

            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors(); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('/usuarios/store') ?>" novalidate>
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>

                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="apellido" required>
                </div>

                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="pass" required>
                </div>

                <div class="mb-3">
                    <label for="confirmar" class="form-label">Confirmar contraseña</label>
                    <input type="password" class="form-control" name="confirmar" required>
                </div>

                <div class="mb-3">
                    <label for="perfil_id" class="form-label">Perfil</label>
                    <select name="perfil_id" class="form-select" required>
                        <option value="">Seleccionar perfil</option>
                        <option value="1">Administrador</option>
                        <option value="2">Usuario</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-person-plus"></i> Crear usuario
                </button>
                <a href="<?= base_url('usuarios') ?>" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
