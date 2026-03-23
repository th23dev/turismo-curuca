const trackContainer = document.querySelector('.carousel-track-container');
const nextBtn = document.getElementById('nextBtn');
const prevBtn = document.getElementById('prevBtn');

// Função para rolar o carrossel baseado na largura de um slide
const getSlideWidth = () => document.querySelector('.carousel-slide').offsetWidth;

nextBtn.addEventListener('click', () => {
   trackContainer.scrollBy({
      left: getSlideWidth(),
      behavior: 'smooth'
   });
});

prevBtn.addEventListener('click', () => {
   trackContainer.scrollBy({
      left: -getSlideWidth(),
      behavior: 'smooth'
   });
});

const videos = document.querySelectorAll('.carousel-slide')

videos.forEach(video => {
   video.style.transform = 'translateY(0px)'
   video.style.opacity = 1
})

