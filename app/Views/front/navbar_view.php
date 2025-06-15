<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="<?= base_url('/principal') ?>">
      <img src="<?= base_url('assets/img/logoprincipal2.webp') ?>" alt="Logo CódigoRoto" width="90" style="height: auto;" class="d-inline-block align-text-top me-2">
    </a>

    <!-- Botón hamburguesa -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Contenido colapsable -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/principal') ?>">
            <i class="bi bi-house-door-fill me-1"></i> Inicio
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('quienes_somos') ?>">
            <i class="bi bi-people-fill me-1"></i> Quiénes Somos
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('acercade') ?>">
            <i class="bi bi-info-circle-fill me-1"></i> Acerca de
          </a>
        </li>
        
        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="recursosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-journal-bookmark-fill me-1"></i> Recursos
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="recursosDropdown">
            <li><a class="dropdown-item" href="https://stackoverflow.com/questions" target="_blank"><i class="bi bi-question-circle me-2"></i> StackOverflow</a></li>
            <li><a class="dropdown-item" href="https://www.codeproject.com/" target="_blank"><i class="bi bi-code-slash me-2"></i> CodeProject</a></li>
            <li><a class="dropdown-item" href="https://coderanch.com/" target="_blank"><i class="bi bi-people me-2"></i> CodeRanch</a></li>
            <li><a class="dropdown-item" href="https://getbootstrap.com/docs/5.3/getting-started/introduction/" target="_blank"><i class="bi bi-bootstrap-fill me-2"></i> Bootstrap Docs</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('contacto') ?>">
            <i class="bi bi-envelope-fill me-1"></i> Contacto
          </a>
        </li>
      </ul>

      <!-- Parte derecha: Login/Registro + Buscador + Modo oscuro -->
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('registro') ?>">
            <i class="bi bi-person-plus-fill me-1"></i> Registrarse
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('login') ?>">
            <i class="bi bi-box-arrow-in-right me-1"></i> Login
          </a>
        </li>
      </ul>

      <form class="d-flex ms-lg-2 my-2 my-lg-0" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>

      <!-- Switch de modo oscuro -->
      <div class="form-check form-switch text-light ms-lg-3 mt-2 mt-lg-0">
        <input class="form-check-input" type="checkbox" role="switch" id="toggleDarkModeSwitch">
        <label class="form-check-label" for="toggleDarkModeSwitch">Modo oscuro</label>
      </div>
    </div>
  </div>
</nav>


<main class="flex-grow-1">
