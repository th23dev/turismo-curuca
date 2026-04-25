let verMaisLugares = document.getElementById('ver-mais-lugares');
   let lugares = document.getElementById('lugares');

   verMaisLugares.addEventListener('click', () => {
      lugares.classList.toggle('show');

      if (lugares.classList.contains('show')) {
         verMaisLugares.innerHTML = 'Ver menos <i class="fas fa-eye-slash"></i>';
      } else {
         verMaisLugares.innerHTML = 'Ver mais <i class="fas fa-eye"></i>';
      }
   })