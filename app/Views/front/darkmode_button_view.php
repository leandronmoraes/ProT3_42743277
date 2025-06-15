<script>
  const switchInput = document.getElementById('toggleDarkModeSwitch');

  if (localStorage.getItem('modoOscuro') === 'true') {
    document.body.classList.add('dark-mode');
    switchInput.checked = true;
  }

  switchInput.addEventListener('change', () => {
    document.body.classList.toggle('dark-mode');
    localStorage.setItem('modoOscuro', document.body.classList.contains('dark-mode'));
  });
</script>
