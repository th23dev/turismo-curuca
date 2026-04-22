<?php 
include '../Core/conexao.php';
$conexao = $pdo;
require_once '../Controllers/VideoController.php'; 
$controller = new VideoController($conexao);
$search = $_POST['search'] ?? $_GET['search'] ?? '';
$videos = $controller->buscarVideos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Turismo Curuçá - Portal</title>
<link rel="stylesheet" href="../../public/css/conexao.css">
</head>

<body>

   <nav class="back-nav">
      <div class="text-box">
         <h1>Vídeos</h1>
      </div>
      <div class="btn-box">
         <a href="menu.html" class="btn-voltar">
            <i class="fas fa-chevron-left"></i> Voltar
         </a>

         <form action="" method="post">
            <input type="search" name="search" id="search-input" placeholder="Buscar vídeos..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit"><i class="fas fa-search"></i></button>
         </form>

         <a href="../index.php" class="btn-voltar">
            Início <i class="fas fa-house"></i>
         </a>
      </div>
   </nav>

   <main>
      <section class="video-carousel-section">
         <div class="carousel-container">

            <?php if (count($videos) > 3): ?>
               <button class="carousel-btn prev" id="prevBtn">
                  <i class="fas fa-chevron-left"></i>
               </button>
            <?php endif; ?>

            <div class="carousel-track-container">
               <ul class="carousel-track">

                  <?php if (count($videos) > 0): ?>
                     <?php foreach ($videos as $video): ?>
                        <li class="carousel-slide">
                           <div class="video-card">
                              <video src="<?= $video['video'] ?>" controls preload></video>
                              <div class="video-info">
                                 <h3><?= $video['titulo'] ?></h3>
                                 <p><?= $video['descricao'] ?></p>
                              </div>
                           </div>
                        </li>
                     <?php endforeach; ?>
                  <?php else: ?>
                     <p style="padding:20px;">Nenhum vídeo encontrado para "<strong><?= htmlspecialchars($search) ?></strong>".</p>
                  <?php endif; ?>

               </ul>
            </div>
            <?php if (count($videos) > 3): ?>
               <button class="carousel-btn next" id="nextBtn">
                  <i class="fas fa-chevron-right"></i>
               </button>
            <?php endif; ?>
         </div>
      </section>
   </main>

   <footer>
      <div class="footer-logos">
         <a href="https://www.sebrae.com.br/" target="_blank"><img src="../../public/imgs/logos-bg/logo-sebrae.webp" alt="sebrae"></a>
         <a href="https://www.cidadeempreendedora.com.br/" target="_blank"><img src="../../public/imgs/logos-bg/logo-cidade-empreendedora.webp" alt="cidade empreendedora"></a>
         <a href="https://www.instagram.com/mturismo/" target="_blank"><img src="../../public/imgs/logos-bg/logo-sec-turismo.webp" alt="secretaria de turismo Curuçá"></a>
         <a href="https://www.instagram.com/prefeituracuruca/" target="_blank"><img src="../../public/imgs/logos-bg/logo-prefeitura-curuca.webp" alt="prefeitura de Curuçá"></a>
      </div>
      <div class="social-links">
         <p>Siga-nos: @turismocuruca.oficial</p>
      </div>
      <hr style="border: 0.5px solid #444; margin-bottom: 20px;">
      <p>&copy; 2026 - Prefeitura Municipal de Curuçá - Todos os direitos reservados.</p>
      <p>Desenvolvedor - <a href="https://github.com/th23dev" target="_blank">Th23dev</a> - <a href="https://instagram.com/th23_dev" target="_blank">@th23_dev</a></p>
   </footer>

</body>
<script src="../../public/js/script.js"></script>
<script src="../../public/js/videos.js"></script>

</html>