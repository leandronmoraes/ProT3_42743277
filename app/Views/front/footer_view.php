</main>

<footer class="bg-dark text-light text-center py-4 mt-5">
  <div class="container">
    <p class="mb-2">&copy; <?= date('Y') ?> CódigoRoto - Todos los derechos reservados.</p>
    <p class="mb-2">Desarrollado por <strong>Leandro Moraes</strong></p>
    <div class="d-flex justify-content-center">
      <a href="https://github.com/leandronmoraes" class="text-light mx-3" target="_blank" rel="noopener" title="GitHub">
        <i class="fab fa-github fa-lg"></i>
      </a>
      <a href="https://www.linkedin.com/in/leandronmoraes/" class="text-light mx-3" target="_blank" rel="noopener" title="LinkedIn">
        <i class="fab fa-linkedin fa-lg"></i>
      </a>
    </div>
  </div>
</footer>

<!-- --- Botón para volver arriba --- -->
<button id="btnVolverArriba" title="Volver arriba" aria-label="Volver arriba">↑</button>




<!-- FontAwesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<!-- Script de modo oscuro -->
<script>
  const switchInput = document.getElementById('toggleDarkModeSwitch');
  const body = document.body;

  if (localStorage.getItem('modoOscuro') === 'true') {
    body.classList.add('dark-mode');
    switchInput.checked = true;
  }

  switchInput.addEventListener('change', () => {
    body.classList.toggle('dark-mode');
    localStorage.setItem('modoOscuro', body.classList.contains('dark-mode'));
  });
</script>



<!-- Script para botón "Volver arriba" -->
<script>
  const btnVolverArriba = document.getElementById("btnVolverArriba");

  window.addEventListener("scroll", () => {
    if (window.scrollY > 200) {
      btnVolverArriba.style.display = "block";
    } else {
      btnVolverArriba.style.display = "none";
    }
  });

  btnVolverArriba.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
</script>

<script>
  document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
    link.addEventListener('click', (e) => {
      // Si es dropdown, no hacemos nada
      if (link.classList.contains('dropdown-toggle')) return;

      const navbarCollapse = document.querySelector('.navbar-collapse');
      const isMobile = window.innerWidth < 992; // lg

      if (navbarCollapse.classList.contains('show') && isMobile) {
        new bootstrap.Collapse(navbarCollapse).hide();
      }
    });
  });
</script>

</body>
</html>
