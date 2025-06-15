<div class="container mt-5">
  <div class="text-center mb-5">
    <p class="fs-5 mx-auto" style="max-width: 700px;">
      <span class="codigo">Código</span><span class="roto">Roto</span> nació como un proyecto personal para compartir experiencias, desafíos y soluciones en el camino del aprendizaje en programación. Nuestro objetivo es crear una comunidad donde los nuevos desarrolladores encuentren apoyo y recursos útiles.
    </p>
  </div>

  <h2 class="text-center mb-4 fw-bold">¿Quiénes somos?</h2>

  <div class="row justify-content-center">
    <div class="col-md-4">

      <div class="card text-center shadow rounded hover-shadow">
        <img src="assets/img/autor.jpg" class="card-img-top rounded-top" alt="Autor">
        <div class="card-body">
          <h5 class="card-title fw-bold">Leandro Moraes</h5>
          <p class="card-text text-muted">Estudiante de Sistemas y apasionado por el desarrollo web. Comparte contenido útil para quienes dan sus primeros pasos en la programación.</p>

          <!-- Redes sociales dentro de la tarjeta -->
          <div class="d-flex justify-content-center gap-3 mt-3">
            <a href="https://www.linkedin.com/in/leandronmoraes/" target="_blank" class="social-icon-inline text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="LinkedIn">
              <i class="bi bi-linkedin fs-4"></i>
            </a>
            <a href="https://github.com/leandronmoraes" target="_blank" class="social-icon-inline text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="GitHub">
              <i class="bi bi-github fs-4"></i>
            </a>
            <a href="https://instagram.com/_moraesleandro" target="_blank" class="social-icon-inline text-instagram" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram">
              <i class="bi bi-instagram fs-4"></i>
            </a>
            <a href="mailto:leandromoraes.unne@gmail.com" target="_blank" class="social-icon-inline text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Email">
              <i class="bi bi-envelope-fill fs-4"></i>
            </a>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<style>
.social-icon-inline {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #f1f1f1;
  transition: background-color 0.3s ease, transform 0.3s ease, color 0.3s ease;
  text-decoration: none;
}
.social-icon-inline:hover {
  background-color: #0d6efd; /* bootstrap primary */
  color: white !important;
  transform: scale(1.2);
}

/* Color Instagram personalizado */
.text-instagram {
  color: #E4405F !important;
}
</style>

<script>
  // Inicializa tooltips de Bootstrap al cargar la página
  document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
  });
</script>
