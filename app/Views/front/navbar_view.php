<?php
$session = session();
$nombre = $session->get('nombre');
$perfil = $session->get('perfil_id');
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('/principal') ?>">
      <img src="<?= base_url('assets/img/logoprincipal2.webp') ?>" alt="Logo CódigoRoto" width="90" class="me-2">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <!-- Menú izquierdo -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">


        <?php if ($perfil != 1): ?>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('/principal') ?>"><i class="bi bi-house-door-fill me-1"></i> Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('quienes_somos') ?>"><i class="bi bi-people-fill me-1"></i> Quiénes Somos</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('acercade') ?>"><i class="bi bi-info-circle-fill me-1"></i> Acerca de</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('contacto') ?>"><i class="bi bi-envelope-fill me-1"></i> Contacto</a></li>

          <!-- Dropdown Recursos -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="bi bi-journal-bookmark-fill me-1"></i> Recursos</a>
            <ul class="dropdown-menu dropdown-menu-dark">
              <li><a class="dropdown-item" href="https://stackoverflow.com/questions" target="_blank">StackOverflow</a></li>
              <li><a class="dropdown-item" href="https://www.codeproject.com/" target="_blank">CodeProject</a></li>
              <li><a class="dropdown-item" href="https://coderanch.com/" target="_blank">CodeRanch</a></li>
              <li><a class="dropdown-item" href="https://getbootstrap.com/" target="_blank">Bootstrap Docs</a></li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>

      <!-- Menú derecho -->
      <ul class="navbar-nav mb-2 mb-lg-0">
        <?php if ($session->has('perfil_id')): ?>
          <?php if ($perfil == 1): ?>
            <!-- ADMIN -->
            <li class="nav-item">
              <span class="nav-link text-warning fw-bold">ADMIN: <?= esc($nombre) ?></span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/panel') ?>"><i class="bi bi-gear-fill me-1"></i> Panel Admin</a>
            </li>
          <?php else: ?>
            <!-- CLIENTE -->
            <li class="nav-item">
              <span class="nav-link">Bienvenido, <?= esc($nombre) ?></span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('/panel') ?>"><i class="bi bi-person-circle me-1"></i> Panel Usuario</a>
            </li>
          <?php endif; ?>
          <a class="nav-link text-danger" href="<?= base_url('logout') ?>"
            onclick="return confirm('¿Seguro que querés cerrar sesión?');">
            <i class="bi bi-box-arrow-right me-1"></i> Cerrar sesión
          </a>
        <?php else: ?>
          <!-- No logueado -->
          <li class="nav-item"><a class="nav-link" href="<?= base_url('registro') ?>"><i class="bi bi-person-plus-fill me-1"></i> Registrarse</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('login') ?>"><i class="bi bi-box-arrow-in-right me-1"></i> Login</a></li>
        <?php endif; ?>
      </ul>

      <!-- Buscador -->
      <form class="d-flex ms-lg-2 my-2 my-lg-0" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>

      <!-- Modo oscuro -->
      <div class="form-check form-switch text-light ms-lg-3 mt-2 mt-lg-0">
        <input class="form-check-input" type="checkbox" id="toggleDarkModeSwitch">
        <label class="form-check-label" for="toggleDarkModeSwitch">Modo oscuro</label>
      </div>
    </div>
  </div>
</nav>

<main class="flex-grow-1">